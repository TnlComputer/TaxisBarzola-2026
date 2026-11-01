<?php

//include "Connections/conexionNew.php";

$consNivel = $conexionNew->query("SELECT * FROM nivel where id_nivel>1 ORDER BY nombre_nivel");

	while($filas=mysqli_fetch_array($consNivel)){
		$nomNivel= utf8_encode($filas['nombre_nivel']);
		echo "<option value=".$filas['id_nivel'];
		if ($nomNivel==$fila["nombre_nivel"])
		{
 			echo " selected";
		}
		echo ">$nomNivel</option>";
	}
?>