<?php 
include "usuarios/autorizo.php"; 
include "Connections/conexionNew.php";

$idMarca        =$_POST["id_marca2"];
$nomMarca  	    =$_POST["marca_txt"];

$nombreMarca	=strtoupper($nomMarca);

// echo $idMarca."<br>";
// echo $nombreMarca."<br>";

$consMarUp="UPDATE marcas SET marca=? WHERE id_marca=?";
$st=$conexionNew->prepare($consMarUp);
$ejecutar_consMar=$st->execute([mb_convert_encoding((string)$nombreMarca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$idMarca, 'UTF-8', 'ISO-8859-1')]);
// echo $consMarUp."<br>";
 
$conexionNew->close();	
header ("Location: marcaCambio.php");
?>