<?php 
include "usuarios/autorizo.php"; 

$nombre	=utf8_encode($_POST["nombre_txt"]);

include "Connections/conexionNew.php";

$grabo="INSERT INTO nivel (nombre_nivel) VALUES (?)";
 
$st=$conexionNew->prepare($grabo);
$ejecutar_consulta=$st->execute([(string)$nombre]);
 
if ($ejecutar_consulta)  		
	$mensaje= "Alta Exitosa";
else
	$mensaje= "Alta - No ha grabado en la base de datos";

$conexionNew->close();	


header ("Location: seguridadAdmin.php");
?>