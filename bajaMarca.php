<?php 
include "usuarios/autorizo.php";
$id_marca=$_POST['id_marca2'];
include "Connections/conexionNew.php";

/* borro Marca */
$sql="DELETE FROM marcas WHERE id_marca=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_marca]);

/* borro Modelos de la Marca a borrar */
$consMod= "SELECT * FROM modelos";
$ejecutar_consMod=$conexionNew->query($consMod);
$num_regs = $ejecutar_consMod->num_rows;
if($num_regs!=0){

	while ($fila=$ejecutar_consMod->fetch_assoc()){
		if ($id_marca==$fila["id_marca"]){
			$id_modelo=$fila["id_modelo"];
			$sqlMod="DELETE FROM modelos WHERE id_modelo=?";
			$stMod=$conexionNew->prepare($sqlMod);
			$ejecutar_consultaMod=$stMod->execute([(string)$id_modelo]);
		}
	}	
}

if ($ejecutar_consulta){
	$mensaje='Marca eliminado con exito!';
}else{
	$mensaje="Marca no puse eliminarse"; 
}
$conexionNew->close();	
header ("Location: marcasAdmin.php");

?>