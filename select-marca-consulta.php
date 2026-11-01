<?php 
// include "Connections/conexionNew.php";

$consMarca="SELECT * FROM marcas ORDER BY marca";

$ejecutar_consMarca=$conexionNew->query($consMarca);

	while($filas=$ejecutar_consMarca->fetch_assoc()){
		$nomMarca= utf8_encode($filas['marca']);
		echo "<option value=".$filas['id_marca'];
		if ($nomMarca==$filaMarca['marca'])
		{
			echo " selected";	
		}
		echo ">$nomMarca</option>";
	}				
?>
