<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar Usuario</title>
  </head>
  <body>
  <?php
  //Incluir la clase de conexion
  include "dbNBA.php";
  $user=new dbNBA();
  //insertar un usuario
  $resultadoBorrar=$user->borrarEquipo($_GET["Nombre"]);
  //Devolver el usuario insertado
  if($resultadoBorrar==true){
    echo "Registro ".$_GET["Nombre"]." borrado";
  }else{
    echo "Error en el borrado";
  }
  ?>
  </body>
</html>
