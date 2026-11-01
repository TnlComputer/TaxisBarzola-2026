<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$id_user=$_POST['id_user2'];

//mysql_select_db("barzola") or die ("no se conecto");
$sql="DELETE FROM usuarios WHERE id_user=?";
$st=$conexionNew->prepare($sql);
$ejecutar_consulta=$st->execute([(string)$id_user]);

$conexionNew->close();	
header ("Location: userBaja.php");

?>