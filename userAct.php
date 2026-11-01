<?php 
include "usuarios/autorizo.php"; 

        $clave		=$_POST["clave_txt"];
        $nombre		=$_POST["nombre_txt"];
        $apellido	=$_POST["apellido_txt"];
		$idNivel	=$_POST["nivel_slc"];
		$usuario	=$_POST['usuario_hdn'];
		$id_user	=$_POST['id_user_hdn'];
		
include "Connections/conexionNew.php";

require_once "usuarios/subir_imagen.php";
require_once "usuarios/claves.php";

$consUser = $conexionNew->prepare("SELECT * FROM usuarios WHERE usuario_user=?");
$consUser->bind_param('s', $usuario);
$consUser->execute();
$num_regs = $consUser->get_result()->num_rows;

if($num_regs==1)
{
	// Solo se acepta una imagen real; si no se sube una, queda la foto actual
	$Foto1 = subir_imagen_usuario($_FILES["foto_txt"] ?? []) ?: basename((string) ($_POST["imagen_hdn"] ?? ''));

	$consNiv = $conexionNew->prepare("SELECT * FROM nivel WHERE id_nivel=?");
	$consNiv->bind_param('s', $idNivel);
	$consNiv->execute();
	$fila=mysqli_fetch_array($consNiv->get_result());
	$nivel=$fila['nombre_nivel'];

	// Consulta preparada (antes los datos se pegaban en el SQL). Se mantiene la conversión a UTF-8 original.
	$datosU=array_map(function ($t) { return mb_convert_encoding($t, 'UTF-8', 'ISO-8859-1'); }, [(string) $apellido, (string) $Foto1, (string) $nivel, (string) $nombre]);
	if ((string) $clave !== '') {
		// Nueva clave escrita en el formulario: se guarda cifrada
		$consUser=$conexionNew->prepare("UPDATE usuarios SET apellido_user=?, imagen_user=?, nivel_user=?, nombre_user=?, password_user=? WHERE id_user=?");
		$datosU[]=clave_cifrar($clave);
	} else {
		// Campo vacío: se mantiene la clave actual
		$consUser=$conexionNew->prepare("UPDATE usuarios SET apellido_user=?, imagen_user=?, nivel_user=?, nombre_user=? WHERE id_user=?");
	}
	$datosU[]=(string) $id_user;
	$consUser->bind_param(str_repeat('s', count($datosU)), ...$datosU);
	$ejecutar_consUser=$consUser->execute();
 

}else{
	$mensaje= "No se ha guardado, el usuario no existe o esta duplicado";
}

$conexionNew->close();	
header ("Location: userCambio.php");
?>