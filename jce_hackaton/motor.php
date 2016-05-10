<?php

$user = "root";
$db = "jcedb";
$server ="localhost";
$password ="20142460";

if(isset($_POST)){

	$conexion = mysqli_connect($server,$user,$password,$db) or die("Ha ocurrido un error en el server".mysql_error());

     $consulta = mysqli_query($conexion,"SELECT ID, Descripcion FROM provincia");
     $provincia = array();
      while($datos = mysqli_fetch_array($consulta)){
        array_push($provincia, $datos['Descripcion']);
      }
      $provincia = json_encode($provincia);
      echo $provincia;
}
?>