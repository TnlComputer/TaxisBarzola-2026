<?php 
if (!$filaLoc['local'])
{
include "Connections/conexionNew.php";
}

$consLocal="SELECT * FROM locales ORDER BY local";

$ejecutar_consLocal=$conexionNew->query($consLocal);

	while($filas=$ejecutar_consLocal->fetch_assoc()){
		$nomLocal= $filas['local'];
		echo "<option value=".$filas['id_local'];
		if ($nomLocal==$filaLoc['local'])
		{
			echo " selected";	
		}
		echo ">$nomLocal</option>";
	}
?>