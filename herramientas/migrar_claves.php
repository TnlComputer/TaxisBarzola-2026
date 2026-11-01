<?php
// Cifra todas las contraseñas que todavía están en texto plano. Se puede ejecutar más de una vez:
// las que ya están cifradas no se tocan.
// Uso (solo línea de comandos):  php herramientas/migrar_claves.php
if (PHP_SAPI !== 'cli') {
	http_response_code(404);
	exit;
}

mysqli_report(MYSQLI_REPORT_OFF);
require __DIR__ . '/../Connections/conexionNew.php';
require __DIR__ . '/../usuarios/claves.php';

if ($conexionNew->connect_errno) {
	fwrite(STDERR, "No hay conexión a la base: {$conexionNew->connect_error}\n");
	exit(1);
}

// Espacio suficiente para el formato cifrado actual y futuros
if (!$conexionNew->query("ALTER TABLE usuarios MODIFY password_user VARCHAR(255) NOT NULL DEFAULT ''")) {
	fwrite(STDERR, "No se pudo ampliar la columna: {$conexionNew->error}\n");
	exit(1);
}

$res = $conexionNew->query("SELECT id_user, password_user FROM usuarios");
$actualizar = $conexionNew->prepare("UPDATE usuarios SET password_user=? WHERE id_user=?");
$cifradas = 0;
$yaCifradas = 0;
$vacias = 0;

while ($fila = $res->fetch_assoc()) {
	$clave = (string) $fila['password_user'];
	if ($clave === '') {
		$vacias++;
		continue;
	}
	if (clave_es_cifrada($clave)) {
		$yaCifradas++;
		continue;
	}
	$hash = clave_cifrar($clave);
	$id = (string) $fila['id_user'];
	$actualizar->bind_param('ss', $hash, $id);
	$actualizar->execute();
	$cifradas++;
}

echo "Claves cifradas ahora: $cifradas\n";
echo "Ya estaban cifradas:   $yaCifradas\n";
if ($vacias) {
	echo "Usuarios sin clave:    $vacias (no podrán entrar hasta que se les asigne una)\n";
}
