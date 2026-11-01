<?php 
include "usuarios/autorizo.php"; 
include "Connections/conexionNew.php";

    $id_0km2	=$_POST["id_0km2"];
    $id_marca	=$_POST["id_marca2"];
    $id_modelo	=$_POST["id_modelo2"];
    $anio		=$_POST["anio2"];
	$puertas	=$_POST["puertas"];
	$direccion	=$_POST["direccion"];
	$stop3		=$_POST["stop3"];		
	$frenos		=$_POST["frenos"];
    $alarma		=$_POST["alarma"];
    $conTrac	=$_POST["conTrac"];
	$conEst		=$_POST["conEst"];
	$inmo		=$_POST["inmo"];
	$aAcon		=$_POST["aAcon"];
	$vidrios	=$_POST["vidrios"];
	$cierreP	=$_POST["cierreP"];
	$espejo		=$_POST["espejo"];		
		
$consDet = "SELECT * FROM detalles0km WHERE id_marca=? AND id_modelo=? AND anio=?";
$st = $conexionNew->prepare($consDet);
$st->execute([(string)$id_marca, (string)$id_modelo, (string)$anio]);
$ejecutar_consDet = $st->get_result();
$num_regs = $ejecutar_consDet->num_rows;

if($num_regs==0)
{

$grabo="INSERT INTO detalles0km (luzStop3, AireAcondicionado, alarma, anio, cierraCentralizado, controlEstabilidad, controlTraccion, direccionAsistida, espejosElectricos, frenosABS, id_marca, id_modelo, inmovilizadorMotor, levantaVidriosElectricos, puertas) VALUES (?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
$st=$conexionNew->prepare($grabo);
$ejecutar_consulta=$st->execute([mb_convert_encoding((string)$stop3, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$aAcon, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$alarma, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$anio, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$cierreP, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$conEst, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$conTrac, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$direccion, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$espejo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$frenos, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_modelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$inmo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$vidrios, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$puertas, 'UTF-8', 'ISO-8859-1')]);
 
if ($ejecutar_consulta) {
	$mensaje= "Alta Exitosa";
}else{
	$mensaje= "Alta - No ha grabado en la base de datos";}

}else{
	$mensaje= "Detalles para la Marca, Modelo y Añ0 ya existe!";
}

$conexionNew->close();	
header ("Location: 0kmAdmin.php?op=Volver&mensaje=" . urlencode($mensaje));
exit;
?>