<?php 
include "usuarios/autorizo.php"; 
include "Connections/conexionNew.php";

require_once "usuarios/subir_imagen.php";
require_once "usuarios/claves.php";

// Solo se acepta una imagen real; si no hay foto válida queda la genérica
$NombreImagen1 = subir_imagen_usuario($_FILES["foto_txt"] ?? []) ?: 'sinfoto.jpg';


        $usuario	=$_POST["user_txt"];
        $clave		=$_POST["clave_txt"];
        $nombre		=$_POST["nombre_txt"];
        $apellido	=$_POST["apellido_txt"];
		$idNivel	=$_POST["nivel_slc"];
       	$Foto1		=$NombreImagen1;

/*		echo "<br/>";
       	echo $usuario;
		echo "<br/>";
        echo $clave;
		echo "<br/>";
		echo $nombre;
		echo "<br/>";
   	    echo $apellido;
		echo "<br/>";
        echo $nivel;
		echo "<br/>";
		echo $Foto1;
		echo "<br/>";
*/
		$consNiv = $conexionNew->prepare("SELECT * FROM nivel WHERE id_nivel=?");
		$consNiv->bind_param('s', $idNivel);
		$consNiv->execute();
        $fila=mysqli_fetch_array($consNiv->get_result());
        $nivel=$fila['nombre_nivel'];

// Consulta preparada (antes los datos se pegaban en el SQL). Se mantiene la conversión a UTF-8 original.
$graboU=$conexionNew->prepare("INSERT INTO usuarios (apellido_user, imagen_user , nivel_user, nombre_user, password_user, usuario_user) VALUES (?,?,?,?,?,?)");
$datosU=array_map(function ($t) { return mb_convert_encoding($t, 'UTF-8', 'ISO-8859-1'); }, [(string) $apellido, (string) $Foto1, (string) $nivel, (string) $nombre, '', (string) $usuario]);
$datosU[4]=clave_cifrar($clave); // la clave se guarda cifrada
$graboU->bind_param('ssssss', ...$datosU);
$ejecutar_consultaU=$graboU->execute();
 
if ($ejecutar_consultaU)  		
	$mensaje= "Alta Exitosa";
else
	$mensaje= "Alta - No ha grabado en la base de datos";

$conexionNew->close();	


header ("Location: usuariosAdmin.php");
?>