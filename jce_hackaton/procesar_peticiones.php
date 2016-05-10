<?php header("Access-Control-Allow-Origin: *");

/*
*/
if(isset($_POST['txt_codigo'])){
include("conexion.php");

$datos =array();

$dato_modelos="SELECT * FROM colegio WHERE CodigoColegio =".$_POST['txt_codigo'];
$query=mysql_query($dato_modelos)or die("problema al selecionar los datos".mysql_error());
while($filas=mysql_fetch_array($query)){
$datos[] = array(
	"IDColegio"=>$filas["IDColegio"],
	"codigo"=>$filas["CodigoColegio"],
	"IDMunicipio"=>$filas["IDMunicipio"],
	"Descripcion"=>utf8_encode($filas["Descripcion"]),
	"IDRecinto"=>$filas["IDRecinto"],
	"TieneCupo"=>$filas["TieneCupo"],
	"CantidadInscritos"=>$filas["CantidadInscritos"],
	"RegID"=>$filas["RegID"],
	);	
}
echo json_encode($datos);

}

?>


<?php

if(isset($_POST['btn_voto_paraje'])){
	include("conexion.php");
$dato_modelos="UPDATE `colegio` SET CAintidadVotado= CAintidadVotado + 1 WHERE Descripcion='".$_POST['btn_voto_paraje']."'";
$query=mysql_query($dato_modelos)or die("problema al selecionar los datos".mysql_error());
echo "Datos Insertado";

}?>

<?php 

if(isset($_POST['btn_voto'])){
	include("conexion.php");
$dato_modelos="UPDATE `colegio` SET CAintidadVotado= CAintidadVotado + 1 WHERE IDColegio=".$_POST['btn_voto'];
$query=mysql_query($dato_modelos)or die("problema al selecionar los datos".mysql_error());
echo "Datos insertado";

}?>


<?php

if(isset($_POST['txt_codigo_busqueda'])){
include("conexion.php");

$datos =array();

$dato_modelos="SELECT * FROM colegio WHERE IDColegio=".$_POST['txt_codigo_busqueda'];
$query=mysql_query($dato_modelos)or die("problema al selecionar los datos".mysql_error());
while($filas=mysql_fetch_array($query)){
$datos[] = array(
	"IDColegio"=>$filas["IDColegio"],
	"codigo"=>$filas["CodigoColegio"],
	"IDMunicipio"=>$filas["IDMunicipio"],
	"Descripcion"=>utf8_encode($filas["Descripcion"]),
	"IDRecinto"=>$filas["IDRecinto"],
	"TieneCupo"=>$filas["TieneCupo"],
	"CantidadInscritos"=>$filas["CantidadInscritos"],
	"CAintidadVotado"=>$filas["CAintidadVotado"],
	"RegID"=>$filas["RegID"],
	);	
}
echo json_encode($datos);

}


?>
