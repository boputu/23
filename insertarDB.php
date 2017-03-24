<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar Usuario</title>
  </head>
  <body>
  <?php
  //Incluir la clase de conexion
  include "dbNBA.php";
  $user=new dbNBA();
  //insertar un usuario
  $resultadoInsert=$user->insertarEquipo($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);
  //Devolver el usuario insertado
  if($resultadoInsert==true){
    $resultado=$user->devolverUltimoEquipo($_POST["Nombre"]);
    $fila=$resultado->fetch_assoc();
    echo "Nombre: ".$fila["Nombre"]."</br>";
    echo "Ciudad: ".$fila["Ciudad"]."</br>";
    echo "Conferencia: ".$fila["Conferencia"]."</br>";
    echo "Division: ".$fila["Division"]."</br>";
    echo "<a href='actualizar.php?Nombre=".$fila["Nombre"]."&Ciudad=".$fila["Ciudad"]."&Conferencia=".$fila["Conferencia"]."&Division=".$fila["Division"]."'>Actualizar Registro</a></br>";
    echo "<a href='borrar.php?Nombre=".$fila["Nombre"]."'>Borrar Registro</a>";
  }else{
    echo "Error en la insercion";
  }
  ?>
  </body>
</html>
