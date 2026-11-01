<?php
// Manejo de contraseñas: se guardan cifradas con password_hash (bcrypt), nunca en texto plano.

function clave_cifrar($clave)
{
	return password_hash((string) $clave, PASSWORD_DEFAULT);
}

function clave_es_cifrada($guardada)
{
	return !empty(password_get_info((string) $guardada)['algo']);
}

// Compara la clave ingresada con la guardada. Acepta claves viejas en texto plano
// para que nadie quede afuera; el login las cifra apenas se usan (ver validando.php).
function clave_verificar($ingresada, $guardada)
{
	$ingresada = (string) $ingresada;
	$guardada = (string) $guardada;
	if ($ingresada === '' || $guardada === '') {
		return false;
	}
	if (clave_es_cifrada($guardada)) {
		return password_verify($ingresada, $guardada);
	}
	return hash_equals($guardada, $ingresada);
}
