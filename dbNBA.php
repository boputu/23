<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbNBA
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";
  //Conector
  private $conexion;
  //Propiedades para controlar errores
  private $error=false;
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }
  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }
  //function insercion contra la tabla usuarios
  public function devolverUltimoEquipo($equipo){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM equipos WHERE Nombre=' ".$equipo." ' ");
      return $resultado;
    }else{
      return null;
    }
  }


  function devolverEquipos(){
    $tabla=[];
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM equipos");
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }

  //function insercion contra la tabla equipos
  public function insertarEquipo($nombre,$ciudad,$conferencia,$division){
    if($this->error==false)
    {
      $insert_sql="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES (' ".$nombre." ', '".$ciudad."',' ".$conferencia."', ' ".$division." ')";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la insercion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //function actualizar contra la tabla equipos
  public function actualizarEquipo($nombre,$ciudad,$conferencia,$division){
    if($this->error==false)
    {
      $insert_sql="UPDATE equipos SET Nombre='".$nombre."', Ciudad='".$ciudad."', Conferencia='".$conferencia."', Division='".$division."'  WHERE Nombre=' ".$nombre." ' ";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la actualizacion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //function borrar contra la tabla equipos
  public function borrarEquipo($equipo){
      $insert_sql="DELETE FROM equipos WHERE Nombre=' ".$equipo." ' ";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
    }
}
 ?>
