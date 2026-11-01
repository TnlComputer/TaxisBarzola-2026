<?php 
include "usuarios/autorizo.php"; 

		$nombre		=$_POST['nivel_txt'];
		$id_nivel	=$_POST['id_nivel2'];

		
include "Connections/conexionNew.php";

$st =$conexionNew->prepare("SELECT * FROM nivel WHERE id_nivel=?");
$st->execute([(string)$id_nivel]);
$consNivel =$st->get_result();
$num_regs = mysqli_num_rows($consNivel);

if($num_regs==1)
{

	$consNivel="UPDATE nivel SET nombre_nivel=? WHERE id_nivel=?";
//echo $consUser;
	$st=$conexionNew->prepare($consNivel);
	$ejecutar_consNivel=$st->execute([mb_convert_encoding((string)$nombre, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_nivel, 'UTF-8', 'ISO-8859-1')]);
 
	if ($ejecutar_consNivel) 
	{ 	
		$mensaje="Cambio exitoso"; 	
	}else{
		$mensaje= "Cambio - No ha grabado en la base de datos";
	}

}else{
	$mensaje= "No se ha guardado, el usuario no existe o esta duplicado";
}

$conexionNew->close();	
header ("Location: nivelCambio.php");
?>