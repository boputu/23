<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista Equipos</title>
  </head>
  <body>
    <?php
    //Incluimos librerias
    include "dbNBA.php";
    $equipos=new dbNBA();
    //DEvolverá el usuario 1
    $tabla=$equipos->devolverEquipos();
    var_dump($tabla);
    echo "</br><hr></br>";
    foreach ($tabla as $fila) {
      echo "<br>";
      echo "Nombre: ".$fila["Nombre"]."</br>";
      echo "<a href='borrar.php?Nombre=".$fila["Nombre"]."'>Borrar Registro</a>";
      echo "<br>";
    }
    ?>
  </body>
</html>
