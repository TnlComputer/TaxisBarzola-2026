<?php include "usuarios/autorizo.php"; 


$consClie= "SELECT * FROM clientes";

$ejecutar_consClie=$conexionNew->query($consClie);

while ($fila=$ejecutar_consClie->fetch_assoc())
{
	echo "<option value='".$fila['id_cliente']."'";
	if ($_GET["cliente_slc"]==$fila["id_cliente"])
	{
		echo " selected";
	}
	echo ">".$fila['dni_cliente']." - ".$fila['apellido_cliente'].",".$fila['nom_cliente']."</option>";

}

//$conexionNew->close();

?>