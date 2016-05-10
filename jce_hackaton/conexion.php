<?php
$host='localhost';
$use="root";
$pass="20142460";
$db="jcedb";

 @ $conexion=mysql_connect($host,$use,$pass)or die("problema para conectar con el servidor".mysql_error());
$db=mysql_select_db($db,$conexion)or die("problema para selecionar el servidor".mysql_error());
?>