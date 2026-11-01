<?php 

$consMarca = $conexionNew->query("SELECT * FROM marcas order by marca");

	// while($filas=$ejecutar_consMarca->fetch_assoc()){
	while($filas=mysqli_fetch_array($consMarca)){
		$nomMarca= utf8_encode($filas['marca']);
		echo "<option value=".$filas['id_marca'];
		if ($nomMarca==$filaMarca['marca'])
		{
			echo " selected";	
		}
		echo ">$nomMarca</option>";
	}
?>