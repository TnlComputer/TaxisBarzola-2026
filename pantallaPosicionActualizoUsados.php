<?php 
include "usuarios/autorizo.php"; 

include "Connections/conexionNew.php";

$posicion=$_POST["posicion"];
// Solo posiciones 1 a 20; cualquier otro valor vuelve sin cambios
if (!in_array((int) $posicion, range(1, 20), true)) { header("Location: pantallaAdmin.php"); exit; }
$id_usado=$_POST["id_Usado"];

if ($posicion==1){
	$consUsado="UPDATE MuestroUsados SET posicion1=? WHERE idMUsado=1";
}
if ($posicion==2){
	$consUsado="UPDATE MuestroUsados SET posicion2=? WHERE idMUsado=1";
}
if ($posicion==3){
	$consUsado="UPDATE MuestroUsados SET posicion3=? WHERE idMUsado=1";
}
if ($posicion==4){
	$consUsado="UPDATE MuestroUsados SET posicion4=? WHERE idMUsado=1";
}
if ($posicion==5){
	$consUsado="UPDATE MuestroUsados SET posicion5=? WHERE idMUsado=1";
}
if ($posicion==6){
	$consUsado="UPDATE MuestroUsados SET posicion6=? WHERE idMUsado=1";
}
if ($posicion==7){
	$consUsado="UPDATE MuestroUsados SET posicion7=? WHERE idMUsado=1";
}
if ($posicion==8){
	$consUsado="UPDATE MuestroUsados SET posicion8=? WHERE idMUsado=1";
}
if ($posicion==9){
	$consUsado="UPDATE MuestroUsados SET posicion9=? WHERE idMUsado=1";
}
if ($posicion==10){
	$consUsado="UPDATE MuestroUsados SET posicion10=? WHERE idMUsado=1";
}
if ($posicion==11){
	$consUsado="UPDATE MuestroUsados SET posicion11=? WHERE idMUsado=1";
}
if ($posicion==12){
	$consUsado="UPDATE MuestroUsados SET posicion12=? WHERE idMUsado=1";
}
if ($posicion==13){
	$consUsado="UPDATE MuestroUsados SET posicion13=? WHERE idMUsado=1";
}
if ($posicion==14){
	$consUsado="UPDATE MuestroUsados SET posicion14=? WHERE idMUsado=1";
}
if ($posicion==15){
	$consUsado="UPDATE MuestroUsados SET posicion15=? WHERE idMUsado=1";
}
if ($posicion==16){
	$consUsado="UPDATE MuestroUsados SET posicion16=? WHERE idMUsado=1";
}
if ($posicion==17){
	$consUsado="UPDATE MuestroUsados SET posicion17=? WHERE idMUsado=1";
}
if ($posicion==18){
	$consUsado="UPDATE MuestroUsados SET posicion18=? WHERE idMUsado=1";
}
if ($posicion==19){
	$consUsado="UPDATE MuestroUsados SET posicion19=? WHERE idMUsado=1";
}
if ($posicion==20){
	$consUsado="UPDATE MuestroUsados SET posicion20=? WHERE idMUsado=1";
}


	$id_usadoBind=(string)$id_usado;
	$stUsado=$conexionNew->prepare($consUsado);
	$stUsado->bind_param('s', $id_usadoBind);
	$ejecutar_consUsado=$stUsado->execute();
 
	if ($ejecutar_consUsado) 
	{ 	
		$mensaje="Cambio exitoso"; 	
	}else{
		$mensaje= "Cambio - No ha grabado en la base de datos";
	}

$_SESSION['ubico']  =NULL;
$_SESSION['taxiUsado']=NULL;

$conexionNew->close();	
header ("Location: pantallaAdmin.php?op=usados");
?>