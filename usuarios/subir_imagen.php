<?php
// Nombre de archivo seguro para fotos subidas: solo letras, números, punto, guion y guion bajo,
// con extensión de imagen. Evita nombres como "x.php" o con caracteres raros.
function nombre_archivo_seguro($nombre)
{
	$nombre = basename((string) $nombre);
	$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
	if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
		$ext = 'jpg';
	}
	$base = preg_replace('/[^A-Za-z0-9_-]+/', '_', pathinfo($nombre, PATHINFO_FILENAME));
	$base = trim(substr($base, 0, 60), '_') ?: 'foto';
	return $base . '_' . substr(bin2hex(random_bytes(4)), 0, 6) . '.' . $ext;
}

// Comprueba que un archivo subido sea realmente una imagen (por su contenido)
function es_imagen_subida($archivo)
{
	return !empty($archivo['tmp_name']) && is_uploaded_file($archivo['tmp_name'])
		&& ($info = @getimagesize($archivo['tmp_name']))
		&& in_array($info[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF, IMAGETYPE_WEBP], true);
}

// Guarda la foto de un usuario solo si es una imagen real, con un nombre generado por el sistema.
// Devuelve el nombre del archivo guardado, o null si no se subió nada válido.
function subir_imagen_usuario($archivo)
{
	if (empty($archivo['tmp_name']) || !is_uploaded_file($archivo['tmp_name'])) {
		return null;
	}
	if ($archivo['size'] > 5 * 1024 * 1024) {
		return null;
	}
	// El tipo se detecta por el contenido, no por el nombre ni la extensión que manda el navegador
	$info = @getimagesize($archivo['tmp_name']);
	$tipos = [IMAGETYPE_JPEG => 'jpg', IMAGETYPE_PNG => 'png', IMAGETYPE_GIF => 'gif', IMAGETYPE_WEBP => 'webp'];
	if (!$info || !isset($tipos[$info[2]])) {
		return null;
	}
	$nombre = 'u_' . bin2hex(random_bytes(8)) . '.' . $tipos[$info[2]];
	$destino = __DIR__ . '/imgUser/' . $nombre;
	return move_uploaded_file($archivo['tmp_name'], $destino) ? $nombre : null;
}
