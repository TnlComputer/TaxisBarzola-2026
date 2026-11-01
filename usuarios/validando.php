<?php 
include "../Connections/conexionNew.php";
require_once __DIR__ . "/claves.php";
error_reporting(E_ALL ^ E_NOTICE);

$usuarioIng=(string) ($_POST['usuario_txt'] ?? '');
$contrasIng=(string) ($_POST['pass_txt'] ?? '');
$usuario=null;
$clave=null;
//echo 'aca estoy validando';

// Consulta preparada: el usuario ingresado nunca se mezcla con el SQL
$stUser = $conexionNew->connect_errno ? false : $conexionNew->prepare("SELECT * FROM usuarios WHERE usuario_user=?");
if (!$stUser) {
	error_log('Login: sin conexión a la base');
	header("Location: ../login.php?error=si");
	exit;
}
$stUser->bind_param('s', $usuarioIng);
$stUser->execute();
$consUser = $stUser->get_result();

			while( $filaUser=mysqli_fetch_array($consUser)  ){
			
				$id				=$filaUser['id_user'];
				$nombre			=$filaUser['nombre_user'];
				$apellido		=$filaUser['apellido_user'];
				$usuario		=$filaUser['usuario_user'];
				$clave			=$filaUser['password_user'];
				$nivelUser		=$filaUser['nivel_user'];
				$imagenUser		=$filaUser['imagen_user'];
				$ult_ent_user	=$filaUser['ult_entrada_user'];				
			}

			if ($usuario !== null && $usuarioIng !== '' && hash_equals((string) $usuario, $usuarioIng) && clave_verificar($contrasIng, $clave)) {
				// Clave vieja sin cifrar (o cifrado desactualizado): se cifra ahora
				if (!clave_es_cifrada($clave) || password_needs_rehash($clave, PASSWORD_DEFAULT)) {
					$nuevaClave = clave_cifrar($contrasIng);
					$stClave = $conexionNew->prepare("UPDATE usuarios SET password_user=? WHERE id_user=?");
					$stClave->bind_param('ss', $nuevaClave, $id);
					$stClave->execute();
				}

				session_start();
				session_regenerate_id(true); // sesión nueva al ingresar
				$_SESSION['autentificado'] 	= true;
				$_SESSION['MM_usuario'] 	= $usuario;
				$_SESSION['MM_nombre'] 		= $nombre;
				$_SESSION['MM_apellido'] 	= $apellido;
				$_SESSION['MM_nivel'] 		= $nivelUser;
				$_SESSION['MM_imagen'] 		= $imagenUser;
				$_SESSION['MM_ultEnt'] 		= $ult_ent_user;
				$_SESSION['MM_idUser'] 		= $id;


				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$todayis=date("d-m-Y");
				$tohorais=date("H:i:s");
				$fechayhora="El ".$todayis." a las ".$tohorais;
				$id_user=$_SESSION['MM_idUser'];
				
				//echo 'users '.$_SESSION['MM_imagen'].'<br>';
				$usr_act=$conexionNew->prepare("UPDATE usuarios SET ult_entrada_user=? WHERE id_user=?");
				$usr_act->bind_param('ss', $fechayhora, $id_user);
				$usr_act->execute();
				$conexionNew->close();
				header("Location:  ../administracion.php");
				exit;
			}else{
				sleep(1); // frena intentos masivos de adivinar claves
				header("Location: ../login.php?error=si");
				exit;
				}
?>