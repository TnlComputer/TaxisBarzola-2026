<?php 
include "usuarios/autorizo.php";
$id_modelo=$_POST['id_modelo2'];
include "Connections/conexionNew.php";

session_start();

/* borro Marca */
$sql="DELETE FROM modelos WHERE id_modelo=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_modelo]);


// if ($ejecutar_consulta){
// 	$mensaje='Marca eliminado con exito!';
// }else{
// 	$mensaje="Marca no puse eliminarse"; 
// }
$conexionNew->close();	
header ("Location: modeloBaja.php");
exit;

?>