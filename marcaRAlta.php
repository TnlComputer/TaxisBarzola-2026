<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";

$nombre	=$_POST["marca_txt"];
$nombre_marca=strtoupper($nombre);

//echo 'aca estoy '.$nombre_marca.'<br>';

$st=$conexionNew->prepare("SELECT * FROM marcas WHERE marca=?");
$st->execute([(string)$nombre_marca]);
$consMarca=$st->get_result();
$cant_reg=mysqli_num_rows($consMarca);

if ($cant_reg==0) {
    $grabo="INSERT INTO marcas (marca) VALUES (?)";
    $st=$conexionNew->prepare($grabo);
    $ejecutar_consulta=$st->execute([(string)$nombre_marca]);
}

$conexionNew->close();	
header ("Location: marcasAdmin.php");
?>