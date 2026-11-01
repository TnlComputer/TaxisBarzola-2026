<?php 
include "usuarios/autorizo.php"; 

    $id_detalle	=$_POST["id_detalle2"];
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
		
include "Connections/conexionNew.php";

$grabo="UPDATE detalles0km SET luzStop3=?, AireAcondicionado=?, alarma=?, anio=?, cierraCentralizado=?,  controlEstabilidad=?, controlTraccion=?, direccionAsistida=?, espejosElectricos=?, frenosABS=?, id_marca=?, id_modelo=?, inmovilizadorMotor=?, levantaVidriosElectricos=?, puertas=? WHERE id_detalle=?";

 
$st=$conexionNew->prepare($grabo);
$ejecutar_consulta=$st->execute([mb_convert_encoding((string)$stop3, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$aAcon, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$alarma, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$anio, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$cierreP, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$conEst, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$conTrac, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$direccion, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$espejo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$frenos, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_modelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$inmo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$vidrios, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$puertas, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_detalle, 'UTF-8', 'ISO-8859-1')]);
 
if ($ejecutar_consulta)  		
	$mensaje= "Cambio Exitosa";
else
	$mensaje= "Cambio - No ha grabado en la base de datos";

$conexionNew->close();	
header ("Location: 0kmADet.php");
?>