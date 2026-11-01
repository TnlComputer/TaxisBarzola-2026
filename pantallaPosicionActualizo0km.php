<?php 
include "usuarios/autorizo.php"; 

include "Connections/conexionNew.php";

$posicion=$_POST["posicion"];
// Solo posiciones 1 a 20; cualquier otro valor vuelve sin cambios
if (!in_array((int) $posicion, range(1, 20), true)) { header("Location: pantallaAdmin.php"); exit; }
$id_0km=$_POST["id_0km"];

if ($posicion==1){
	$cons0km="UPDATE Muestro0km SET posicion1=? WHERE idM0km=1";
}
if ($posicion==2){
	$cons0km="UPDATE Muestro0km SET posicion2=? WHERE idM0km=1";
}
if ($posicion==3){
	$cons0km="UPDATE Muestro0km SET posicion3=? WHERE idM0km=1";
}
if ($posicion==4){
	$cons0km="UPDATE Muestro0km SET posicion4=? WHERE idM0km=1";
}
if ($posicion==5){
	$cons0km="UPDATE Muestro0km SET posicion5=? WHERE idM0km=1";
}
if ($posicion==6){
	$cons0km="UPDATE Muestro0km SET posicion6=? WHERE idM0km=1";
}
if ($posicion==7){
	$cons0km="UPDATE Muestro0km SET posicion7=? WHERE idM0km=1";
}
if ($posicion==8){
	$cons0km="UPDATE Muestro0km SET posicion8=? WHERE idM0km=1";
}
if ($posicion==9){
	$cons0km="UPDATE Muestro0km SET posicion9=? WHERE idM0km=1";
}
if ($posicion==10){
	$cons0km="UPDATE Muestro0km SET posicion10=? WHERE idM0km=1";
}
if ($posicion==11){
	$cons0km="UPDATE Muestro0km SET posicion11=? WHERE idM0km=1";
}
if ($posicion==12){
	$cons0km="UPDATE Muestro0km SET posicion12=? WHERE idM0km=1";
}
if ($posicion==13){
	$cons0km="UPDATE Muestro0km SET posicion13=? WHERE idM0km=1";
}
if ($posicion==14){
	$cons0km="UPDATE Muestro0km SET posicion14=? WHERE idM0km=1";
}
if ($posicion==15){
	$cons0km="UPDATE Muestro0km SET posicion15=? WHERE idM0km=1";
}
if ($posicion==16){
	$cons0km="UPDATE Muestro0km SET posicion16=? WHERE idM0km=1";
}
if ($posicion==17){
	$cons0km="UPDATE Muestro0km SET posicion17=? WHERE idM0km=1";
}
if ($posicion==18){
	$cons0km="UPDATE Muestro0km SET posicion18=? WHERE idM0km=1";
}
if ($posicion==19){
	$cons0km="UPDATE Muestro0km SET posicion19=? WHERE idM0km=1";
}
if ($posicion==20){
	$cons0km="UPDATE Muestro0km SET posicion20=? WHERE idM0km=1";
}

	$id_0kmBind=(string)$id_0km;
	$st0km=$conexionNew->prepare($cons0km);
	$st0km->bind_param('s', $id_0kmBind);
	$ejecutar_cons0km=$st0km->execute();
 
	if ($ejecutar_cons0km) 
	{ 	
		$mensaje="Cambio exitoso"; 	
	}else{
		$mensaje= "Cambio - No ha grabado en la base de datos";
	}

$_SESSION['ubico']  =NULL;
$_SESSION['taxi0km']=NULL;

$conexionNew->close();	
header ("Location: pantallaAdmin.php?op=0km&mensaje=$mensaje");
?>
