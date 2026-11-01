<?php include "usuarios/autorizo.php"; 

//include "Connections/conexionNew.php";

$consCam0km = "SELECT * FROM 0km";
$ejecutar_consCam0km = $conexionNew->query($consCam0km);
//$filaconsCam0km=$ejecutar_consCam0km->fetch_assoc();
//
//$marcaN=$filaconsCam0km['marca_0km'];
//$modeloN=$filaconsCam0km['mod_0km'];
//	  	
//$consCMarca = "SELECT * FROM marcas WHERE id_marca='$marcaN'";
//$ejecutar_consCMarca = $conexionNew->query($consCMarca);
//$filaCMarca=$ejecutar_consCMarca->fetch_assoc();
//	
//$consCMod = "SELECT * FROM modelos WHERE id_modelo='$modeloN'";
//$ejecutar_consCMod = $conexionNew->query($consCMod);
//$filaCMod=$ejecutar_consCMod->fetch_assoc();  

while ($filaCam0km=$ejecutar_consCam0km->fetch_assoc())
{
	$marcaN=$filaCam0km['marca_0km'];
	$modeloN=$filaCam0km['mod_0km'];
	  	
	$consCMarca = "SELECT * FROM marcas WHERE id_marca=?";
	$marcaNBind=(string)$marcaN;
	$stConsCMarca = $conexionNew->prepare($consCMarca);
	$stConsCMarca->bind_param('s', $marcaNBind);
	$stConsCMarca->execute();
	$ejecutar_consCMarca = $stConsCMarca->get_result();
	$filaCMarca=$ejecutar_consCMarca->fetch_assoc();
	
	$consCMod = "SELECT * FROM modelos WHERE id_modelo=?";
	$modeloNBind=(string)$modeloN;
	$stConsCMod = $conexionNew->prepare($consCMod);
	$stConsCMod->bind_param('s', $modeloNBind);
	$stConsCMod->execute();
	$ejecutar_consCMod = $stConsCMod->get_result();
	$filaCMod=$ejecutar_consCMod->fetch_assoc();  

	echo "<option value='".$filaCam0km['id_0km']."'";
	if (($_GET["0km_slc"] ?? '')==$filaCam0km["id_0km"])
	{
		echo " selected";
	} 
    echo ">".$filaCMarca['marca']." - ".$filaCMod['nombre_modelo']."</option>";    
}

//$conexionNew->close();

?>

