<?php
// Dirección de la landing pública. En el hosting está en la raíz del sitio.
// En la PC de desarrollo, sitio.local.php (no se sube) devuelve la dirección local.
$URL_SITIO = is_file(__DIR__ . '/sitio.local.php') ? require __DIR__ . '/sitio.local.php' : '/';
