<?php

function conectarse()
{
	// En la PC de desarrollo, conexion.local.php (no se sube al hosting) apunta a la base local
	if (is_file(__DIR__ . '/conexion.local.php')) {
		return require __DIR__ . '/conexion.local.php';
	}

	// Datos de la base del hosting: credenciales.php (no se sube a git; ver credenciales.example.php)
	$c = require __DIR__ . '/credenciales.php';
	return new mysqli($c['servidor'], $c['usuario'], $c['clave'], $c['base']);
}

$conexionNew = conectarse();
?>
