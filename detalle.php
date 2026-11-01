<?php
require __DIR__ . '/inc/config.php';

$tipo = $_GET['tipo'] ?? '';
$tipo = is_string($tipo) && array_key_exists($tipo, CATALOGO) ? $tipo : '0km';
$id   = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
$c    = CATALOGO[$tipo];

$auto = null;
$st = $conexionNew ? $conexionNew->prepare(
    "SELECT v.*, ma.marca, mo.nombre_modelo
     FROM `{$c['tabla']}` v
     LEFT JOIN marcas ma ON ma.id_marca = v.{$c['marca']}
     LEFT JOIN modelos mo ON mo.id_marca = v.{$c['marca']} AND mo.id_modelo = v.{$c['modelo']}
     WHERE v.{$c['id']} = ?"
) : false;
if ($st) {
    $st->bind_param('i', $id);
    $st->execute();
    $auto = $st->get_result()->fetch_assoc();
}

if (!$auto) {
    http_response_code(404);
    $titulo = 'Unidad no encontrada';
    include __DIR__ . '/inc/header.php';
    echo '<section class="py-5 mt-5"><div class="container text-center"><h1 class="h3">La unidad ya no está disponible</h1>'
       . '<a class="btn btn-dark mt-3" href="' . $c['listado'] . '">Ver ' . e($c['titulo']) . '</a></div></section>';
    include __DIR__ . '/inc/footer.php';
    exit;
}

$s = $c['sufijo'];
$fotos = [];
for ($i = 1; $i <= 20; $i++) {
    if (foto_disponible($tipo, $auto["foto{$i}{$s}"] ?? null)) {
        $fotos[] = foto_url($tipo, $auto["foto{$i}{$s}"]);
    }
}

// Equipamiento: misma ficha por marca/modelo (y año para usados)
$det = [];
if ($tipo === '0km') {
    $st = $conexionNew->prepare('SELECT * FROM detalles0km WHERE id_marca = ? AND id_modelo = ? LIMIT 1');
    $st && $st->bind_param('ss', $auto['marca_0km'], $auto['mod_0km']);
} else {
    $st = $conexionNew->prepare('SELECT * FROM detallesUsado WHERE id_marca = ? AND id_modelo = ? AND anio = ? LIMIT 1');
    $st && $st->bind_param('sss', $auto['marca_usado'], $auto['mod_usado'], $auto['anio_usado']);
}
if ($st && $st->execute()) {
    $det = $st->get_result()->fetch_assoc() ?: [];
}

$km = $tipo === 'usado' ? ($auto['kilometraje_usado'] ?: ($det['kilometros'] ?? null)) : null;
$specs = [
    'Año'                            => $auto["anio{$s}"] ?? null,
    'Combustible'                    => $auto["combustible{$s}"] ?? null,
    'Kilometraje'                    => $km,
    'Cant. de puertas'               => $det['puertas'] ?? null,
    'Dirección asistida'             => $det['direccionAsistida'] ?? null,
    'Tercer stop'                    => $det['luzStop3'] ?? null,
    'Frenos ABS'                     => $det['frenosABS'] ?? null,
    'Alarma'                         => $det['alarma'] ?? null,
    'Control de tracción'            => $det['controlTraccion'] ?? null,
    'Control de estabilidad'         => $det['controlEstabilidad'] ?? null,
    'Inmovilizador de motor'         => $det['inmovilizadorMotor'] ?? null,
    'Aire acondicionado'             => $det['AireAcondicionado'] ?? null,
    'Levanta vidrios eléctricos'     => $det['levantaVidriosElectricos'] ?? null,
    'Cierre centralizado de puertas' => $det['cierreCentralizado'] ?? $det['cierraCentralizado'] ?? null,
    'Espejos eléctricos'             => $det['espejosElectricos'] ?? null,
];
$specs = array_filter($specs, function ($v) {
    return $v !== null && $v !== '' && strtoupper((string) $v) !== 'NULL';
});

$nombre      = trim(($auto['marca'] ?? '') . ' ' . ($auto['nombre_modelo'] ?? ''));
$titulo      = $nombre . ' ' . $c['titulo'];
$descripcion = $nombre . ' en Taxis Barzola. Consultá disponibilidad por WhatsApp.';
$activo      = $tipo === '0km' ? '0km' : 'usados';
$canonical   = 'detalle.php?tipo=' . $tipo . '&id=' . $id;
$consulta    = 'Hola, me interesa el ' . $nombre . ' (' . $c['titulo'] . ') publicado en la web: ' . SITE_URL . '/' . $canonical;
$precargar   = $fotos[0] ?? null;
include __DIR__ . '/inc/header.php';
?>
<section class="py-5 mt-5">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
				<li class="breadcrumb-item"><a href="<?= $c['listado'] ?>"><?= e($c['titulo']) ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?= e($nombre) ?></li>
			</ol>
		</nav>
		<div class="row g-4">
			<div class="col-lg-7">
				<?php if ($fotos): ?>
				<div id="galeria" class="carousel slide rounded-4 overflow-hidden shadow-sm bg-dark">
					<div class="carousel-inner">
						<?php foreach ($fotos as $i => $f): ?>
						<div class="carousel-item<?= $i === 0 ? ' active' : '' ?>">
							<img src="<?= e($f) ?>" class="d-block w-100" width="500" height="375" alt="<?= e($nombre) ?> - foto <?= $i + 1 ?>"<?= $i === 0 ? ' fetchpriority="high"' : ' loading="lazy"' ?> decoding="async">
						</div>
						<?php endforeach; ?>
					</div>
					<?php if (count($fotos) > 1): ?>
					<button class="carousel-control-prev" type="button" data-bs-target="#galeria" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Anterior</span></button>
					<button class="carousel-control-next" type="button" data-bs-target="#galeria" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span></button>
					<?php endif; ?>
				</div>
				<?php if (count($fotos) > 1): ?>
				<div class="miniaturas d-flex gap-2 mt-2 overflow-auto">
					<?php foreach ($fotos as $i => $f): ?>
					<button type="button" data-bs-target="#galeria" data-bs-slide-to="<?= $i ?>" aria-label="Foto <?= $i + 1 ?>"<?= $i === 0 ? ' class="active" aria-current="true"' : '' ?>>
						<img src="<?= e($f) ?>" width="80" height="60" alt="" loading="lazy" decoding="async">
					</button>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-5">
				<p class="text-uppercase text-muted fw-bold mb-1"><?= e($c['titulo']) ?></p>
				<h1 class="fw-bold mb-4"><?= e($nombre) ?></h1>
				<?php if ($specs): ?>
				<table class="table table-striped">
					<caption class="caption-top">Especificaciones</caption>
					<tbody>
						<?php foreach ($specs as $k => $v): ?>
						<tr><th scope="row" class="fw-normal"><?= e($k) ?></th><td class="text-end fw-bold"><?= e((string) $v) ?></td></tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php endif; ?>
				<a class="btn btn-whatsapp btn-lg w-100 mb-2" href="<?= e(wa_link(0, $consulta)) ?>" target="_blank" rel="noopener">
					<?= icono_whatsapp(22) ?> Consultar por WhatsApp
				</a>
				<a class="btn btn-outline-dark w-100" href="<?= $c['listado'] ?>">Volver a <?= e($c['titulo']) ?></a>
			</div>
		</div>
	</div>
</section>
<?php include __DIR__ . '/inc/footer.php'; ?>
