<?php 
include "usuarios/autorizo.php"; 

$marca			=$_POST["marca"];
$modelo			=$_POST["modelo_txt"];
		
include "Connections/conexionNew.php";

$consModelo = "SELECT * FROM modelos WHERE id_marca=? AND nombre_modelo=?";
$st = $conexionNew->prepare($consModelo);
$st->execute([(string)$marca, (string)$modelo]);
$ejecutar_consModelo = $st->get_result();
$num_regs = $ejecutar_consModelo->num_rows;

if($num_regs==0)
{		


$grabo="INSERT INTO modelos (id_marca, nombre_modelo) VALUES (?, ?)";
 
$st=$conexionNew->prepare($grabo);
$ejecutar_consulta=$st->execute([mb_convert_encoding((string)$marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$modelo, 'UTF-8', 'ISO-8859-1')]);
 
	if ($ejecutar_consulta) {
		$mensaje= "Alta Exitosa";
	}else{
		$mensaje= "Alta - No ha grabado en la base de datos";
	}	
}else{
	$mensaje= "El Modelo ".$modelo." de la Marca ".$marca." ya existe";
}
// echo '<br> registros '.$num_regs.'<br>';
// echo '<br> grabo '.$grabo.'<br>';
$conexionNew->close();	
header ("Location: modelosAdmin.php");
?>