<?php 
include "usuarios/autorizo.php";

$id_marca=$_POST['marca'];
$model=$_POST['model'];
$anio=$_POST['anio_txt'];
$id_usado=$_POST['id_usado2'];

include "Connections/conexionNew.php";
//mysql_select_db("barzola") or die ("no se conecto");
$sql="DELETE FROM usados WHERE id_usado=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_usado]);

if ($ejecutar_consulta)
	$mensaje='Usado eliminado con exito!'.$id_usado;
else
	$mensaje="Usado no puse eliminarse"; 
$conexionNew->close();	
header ("Location: usadosBaja.php");

?>