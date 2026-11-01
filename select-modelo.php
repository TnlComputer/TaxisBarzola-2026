<?php 
if (!$filaMod['nombre_modelo'])
{
	include "Connections/conexionNew.php";
}

if ($_POST['marca_slc']){ 
	$id_marca=$_POST['marca_slc'];
	}else{
	$id_marca=$_session['id_marca']	;
	} 
//$consModelo="SELECT * FROM modelos";
$consModelo="SELECT * FROM modelos WHERE id_marca=?";


$id_marcaBind=(string)$id_marca;
$stConsModelo=$conexionNew->prepare($consModelo);
$stConsModelo->bind_param('s', $id_marcaBind);
$stConsModelo->execute();
$ejecutar_consModelo=$stConsModelo->get_result();

	while($filas=$ejecutar_consModelo->fetch_assoc()){
		$nomModel= utf8_encode($filas['nombre_modelo']);
		echo "<option value=".$filas['id_modelo'];
		if ($nomModel==$filaMod['nombre_modelo'])
		{
			echo " selected";	
		}
		echo ">$nomModel</option>";
	}
?>
