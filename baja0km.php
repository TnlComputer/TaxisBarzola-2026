<?php 
include "usuarios/autorizo.php";

$id_marca=$_POST['marca'];
$model=$_POST['model'];
$anio=$_POST['anio_txt'];
$id_0km=$_POST['id_0km2'];

include "Connections/conexionNew.php";

$sql="DELETE FROM 0km WHERE id_0km=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_0km]);

if ($ejecutar_consulta)
	$mensaje='Usado eliminado con exito!'.$id_0km;
else
	$mensaje="Usado no puse eliminarse"; 
$conexionNew->close();	
header ("Location: 0kmBaja.php");

?>