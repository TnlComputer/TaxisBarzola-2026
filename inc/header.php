<?php
// Variables opcionales: $titulo, $descripcion, $activo, $canonical, $precargar (imagen principal)
$titulo      = isset($titulo) ? $titulo . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_SLOGAN;
$descripcion = $descripcion ?? 'Taxis Barzola: venta de taxis 0KM y usados con o sin licencia, permuta, financiación y gestoría. Desde 1970 junto al gremio.';
$activo      = $activo ?? '';
$menu = [
    'unidades'  => ['index.php#unidades', 'Unidades'],
    '0km'       => ['nuevos.php', '0KM'],
    'usados'    => ['usados.php', 'Usados'],
    'permuta'   => ['index.php#permuta', 'Permuta'],
    'lic'       => ['index.php#licencias', 'Licencias'],
    'preguntas' => ['index.php#preguntas', 'Preguntas'],
    'historia'  => ['index.php#videos', 'Historia'],
    'contacto'  => ['index.php#contacto', 'Contacto'],
];
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= e($titulo) ?></title>
	<meta name="description" content="<?= e($descripcion) ?>">
	<meta name="theme-color" content="#1c1c1c">
	<?php if (isset($canonical)): ?><link rel="canonical" href="<?= e(SITE_URL . '/' . $canonical) ?>"><?php endif; ?>
	<meta property="og:type" content="website">
	<meta property="og:locale" content="es_AR">
	<meta property="og:title" content="<?= e($titulo) ?>">
	<meta property="og:description" content="<?= e($descripcion) ?>">
	<meta property="og:image" content="<?= e(SITE_URL) ?>/assets/img/hero.webp">
	<link rel="icon" href="<?= asset('img/favicon.ico') ?>">
	<link rel="apple-touch-icon" href="<?= asset('img/apple-touch-icon.png') ?>">
	<link rel="preload" href="<?= asset('fonts/titillium-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= asset('fonts/titillium-700.woff2') ?>" as="font" type="font/woff2" crossorigin>
	<?php if (!empty($precargar)): ?><link rel="preload" href="<?= e($precargar) ?>" as="image" fetchpriority="high"><?php endif; ?>
	<link rel="stylesheet" href="<?= asset('vendor/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('css/site.css') ?>">
	<script src="<?= asset('vendor/bootstrap.min.js') ?>" defer></script>
	<script src="<?= asset('js/site.js') ?>" defer></script>
</head>
<body>
<a class="visually-hidden-focusable" href="#contenido">Saltar al contenido</a>
<nav class="navbar navbar-expand-lg navbar-dark bg-negro fixed-top" aria-label="Menú principal">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
			<img src="<?= asset('img/logo.webp') ?>" width="60" height="37" alt="">
			<span><strong class="text-oro">TAXIS BARZOLA</strong><small class="d-none d-xl-inline text-white-50 ms-2"><?= e(SITE_SLOGAN) ?></small></span>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menú">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav ms-auto align-items-lg-center">
				<?php foreach ($menu as $clave => [$href, $texto]): ?>
				<li class="nav-item"><a class="nav-link<?= $clave === $activo ? ' active' : '' ?>"<?= $clave === $activo ? ' aria-current="page"' : '' ?> href="<?= $href ?>"><?= $texto ?></a></li>
				<?php endforeach; ?>
				<li class="nav-item ms-lg-2 d-none d-lg-block"><a class="btn btn-whatsapp btn-sm" href="<?= e(wa_link()) ?>" target="_blank" rel="noopener"><?= icono_whatsapp(18) ?> WhatsApp</a></li>
			</ul>
		</div>
	</div>
</nav>
<main id="contenido">
