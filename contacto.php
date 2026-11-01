<?php
require __DIR__ . '/inc/config.php';
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

function volver(string $estado)
{
    header('Location: index.php?contacto=' . $estado . '#contacto', true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    volver('');
}

// Honeypot: si un bot completa el campo oculto, se descarta sin avisarle
if (($_POST['sitio'] ?? '') !== '') {
    volver('ok');
}
if (!is_string($_POST['csrf'] ?? null) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) {
    volver('error');
}
// Un envío por minuto por visitante, para frenar abusos
if (time() - ($_SESSION['ultimo_envio'] ?? 0) < 60) {
    volver('error');
}
foreach (['nombre', 'telefono', 'email', 'asunto', 'mensaje'] as $campo) {
    if (isset($_POST[$campo]) && !is_string($_POST[$campo])) {
        volver('error');
    }
}

// Sin saltos de línea en campos que van a cabeceras o al asunto (evita inyección de cabeceras)
$limpiar = function (string $k, int $max) {
    return mb_substr(trim(str_replace(["\r", "\n"], ' ', $_POST[$k] ?? '')), 0, $max);
};

$nombre   = $limpiar('nombre', 100);
$telefono = $limpiar('telefono', 40);
$email    = filter_var($limpiar('email', 150), FILTER_VALIDATE_EMAIL);
$asunto   = $limpiar('asunto', 150);
$mensaje  = mb_substr(trim($_POST['mensaje'] ?? ''), 0, 3000);

if ($nombre === '' || !$email || $mensaje === '') {
    volver('error');
}

$cuerpo = date('d-m-Y H:i') . "\n\n"
    . "Nombre: $nombre\n"
    . "Teléfono: $telefono\n"
    . "Email: $email\n"
    . "Asunto: $asunto\n\n"
    . "Mensaje:\n$mensaje\n";

$cabeceras = [
    'From' => 'Taxis Barzola <' . MAIL_FROM . '>',
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8',
];
if (MAIL_BCC !== '') {
    $cabeceras['Bcc'] = MAIL_BCC;
}
if (MAIL_DESTINO === '') {
    error_log('Taxis Barzola: falta MAIL_DESTINO en inc/entorno.php');
    volver('error');
}
$titulo = '=?UTF-8?B?' . base64_encode('Contacto web Taxis Barzola' . ($asunto !== '' ? ": $asunto" : '')) . '?=';

$enviado = mail(MAIL_DESTINO, $titulo, $cuerpo, $cabeceras);
unset($_SESSION['csrf']);
$_SESSION['ultimo_envio'] = time();
volver($enviado ? 'ok' : 'error');
