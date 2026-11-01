<?php 
include "usuarios/autorizo.php";

$id_nivel=$_POST['id_nivel2'];

include "Connections/conexionNew.php";
//mysql_select_db("barzola") or die ("no se conecto");
$sql="DELETE FROM nivel WHERE id_nivel=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_nivel]);

if ($ejecutar_consulta)
	$mensaje='Seguridad eliminado con exito! Reg. '.$id_nivel;
else
	$mensaje="Seguridad no puse eliminarse"; 
$conexionNew->close();	
header ("Location: nivelBaja.php");

?>