<?php
// Configuración central del sitio. Reutiliza la conexión existente del proyecto.

// Errores al log, nunca en pantalla (no exponer rutas ni datos de la base)
ini_set('display_errors', '0');
ini_set('log_errors', '1');

// Cookie de sesión: solo HTTP, solo HTTPS cuando corresponde, sin envío entre sitios
$https = ($_SERVER['HTTPS'] ?? '') === 'on' || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_secure', $https ? '1' : '0');
ini_set('session.cookie_samesite', 'Lax');
header_remove('X-Powered-By');

mysqli_report(MYSQLI_REPORT_OFF);

// Datos de la base y rutas de cada lugar (PC o hosting). No se sube a git: ver entorno.example.php
if (is_file(__DIR__ . '/entorno.php')) {
    require __DIR__ . '/entorno.php';
} else {
    error_log('Taxis Barzola: falta inc/entorno.php');
}

// La landing está en la raíz del sitio, junto a la intranet y a las fotos de autos (images/):
// MEDIA      = URL de esa carpeta, vista desde la landing
// MEDIA_DIR  = la misma carpeta en el disco, para comprobar que cada foto exista
defined('MEDIA') || define('MEDIA', '');
defined('MEDIA_DIR') || define('MEDIA_DIR', __DIR__ . '/../');

// Conexión propia de la landing. Si la base no responde, el sitio sigue mostrándose (sin vehículos)
$conexionNew = null;
if (defined('DB_HOST')) {
    $conexionNew = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, defined('DB_PORT') ? DB_PORT : 3306);
    if ($conexionNew->connect_errno) {
        error_log('Taxis Barzola: sin conexión a la base - ' . $conexionNew->connect_error);
        $conexionNew = null;
    }
}

const SITE_NAME   = 'Taxis Barzola';
const SITE_URL    = 'https://www.taxisbarzola.com.ar';
const SITE_SLOGAN = 'Desde 1970 junto al gremio';

// Datos de contacto: editar acá y se actualiza en todo el sitio
const WHATSAPP = [
    ['numero' => '5491124737989', 'texto' => '11 2473-7989'],
    ['numero' => '5491126203338', 'texto' => '11 2620-3338'],
];
const WA_MENSAJE  = 'Hola, quiero consultar por un taxi.';
const ZONA        = 'Villa Luro - Ciudad de Buenos Aires';
// Los mails del formulario se definen en inc/entorno.php (no se publican)
defined('MAIL_DESTINO') || define('MAIL_DESTINO', '');
defined('MAIL_BCC') || define('MAIL_BCC', '');
defined('MAIL_FROM') || define('MAIL_FROM', 'web@taxisbarzola.com.ar');
const AFIP_QR      = 'https://qr.afip.gob.ar/?qr=XKpso0ZUbAEMmiKmvXp99g,,';

function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

/** Ruta a un archivo de assets/ con versión según fecha de modificación (caché largo y seguro). */
function asset(string $ruta): string
{
    $archivo = __DIR__ . '/../assets/' . $ruta;
    return 'assets/' . $ruta . (is_file($archivo) ? '?v=' . filemtime($archivo) : '');
}

/** Logo de WhatsApp en línea (toma el color del texto del botón). */
function icono_whatsapp(int $px = 22): string
{
    return '<svg class="icono-wa" width="' . $px . '" height="' . $px . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.08-.3-.15-1.26-.46-2.39-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.53.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35m-5.42 7.4h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.83 9.83 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.89 9.88m8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.89a11.82 11.82 0 0 0-3.48-8.41Z"/></svg>';
}

function wa_link(int $i = 0, string $msg = WA_MENSAJE): string
{
    return 'https://wa.me/' . WHATSAPP[$i]['numero'] . '?text=' . rawurlencode($msg);
}

function foto_valida(?string $f): bool
{
    return $f !== null && $f !== '' && strtoupper($f) !== 'NULL';
}

/** La foto está cargada en la base y el archivo existe (evita imágenes rotas). */
function foto_disponible(string $tipo, ?string $f): bool
{
    return foto_valida($f)
        && is_file(MEDIA_DIR . 'images/' . ($tipo === '0km' ? '0km' : 'usados') . '/big' . $f);
}

function foto_url(string $tipo, string $f): string
{
    return MEDIA . 'images/' . ($tipo === '0km' ? '0km' : 'usados') . '/big' . rawurlencode($f);
}

// Definición de los dos catálogos: misma lógica, distintos nombres de columnas
const CATALOGO = [
    '0km' => [
        'tabla' => '0km', 'id' => 'id_0km', 'sufijo' => '_0km',
        'marca' => 'marca_0km', 'modelo' => 'mod_0km',
        'titulo' => '0KM', 'listado' => 'nuevos.php',
    ],
    'usado' => [
        'tabla' => 'usados', 'id' => 'id_usado', 'sufijo' => '_usado',
        'marca' => 'marca_usado', 'modelo' => 'mod_usado',
        'titulo' => 'Usados', 'listado' => 'usados.php',
    ],
];

/** Consulta por WhatsApp sobre una unidad puntual. */
function wa_consulta(string $tipo, array $a): string
{
    $nombre = trim(($a['marca'] ?? '') . ' ' . ($a['modelo'] ?? $a['nombre_modelo'] ?? ''));
    return wa_link(0, 'Hola, me interesa el ' . $nombre . ' (' . CATALOGO[$tipo]['titulo'] . '): '
        . SITE_URL . '/detalle.php?tipo=' . $tipo . '&id=' . (int) $a['id']);
}

/** Listado completo con marca y modelo en una sola consulta (antes: 2 consultas por auto). */
function listar_vehiculos(?mysqli $db, string $tipo, int $limite = 0): array
{
    if (!$db) {
        return [];
    }
    $c = CATALOGO[$tipo];
    $sql = "SELECT v.{$c['id']} AS id, v.foto1{$c['sufijo']} AS foto,
                   v.combustible{$c['sufijo']} AS combustible, v.anio{$c['sufijo']} AS anio,
                   ma.marca, mo.nombre_modelo AS modelo
            FROM `{$c['tabla']}` v
            LEFT JOIN marcas ma ON ma.id_marca = v.{$c['marca']}
            LEFT JOIN modelos mo ON mo.id_marca = v.{$c['marca']} AND mo.id_modelo = v.{$c['modelo']}
            ORDER BY v.{$c['id']} DESC" . ($limite > 0 ? ' LIMIT ' . $limite : '');
    $res = $db->query($sql);
    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}
