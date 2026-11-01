<?php 
include "usuarios/autorizo.php"; 

include "Connections/conexionNew.php";

$idModelo       =$_POST["id_modelo2"];
$nomModelo  	=$_POST["modelo_txt"];
$nombreModelo	=strtoupper($nomModelo);

$consModUp="UPDATE modelos SET nombre_modelo=? WHERE id_modelo=?";
$st=$conexionNew->prepare($consModUp);
$ejecutar_cons0km=$st->execute([mb_convert_encoding((string)$nombreModelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$idModelo, 'UTF-8', 'ISO-8859-1')]);
 
$conexionNew->close();	
header ("Location: modeloCambio.php");
?>