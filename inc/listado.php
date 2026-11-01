<?php
// Requiere $tipo ('0km' | 'usado') definido por la página que incluye este archivo
require_once __DIR__ . '/config.php';

$c         = CATALOGO[$tipo];
$autos     = listar_vehiculos($conexionNew, $tipo);
$titulo    = $c['titulo'];
$activo    = $tipo === '0km' ? '0km' : 'usados';
$canonical = $c['listado'];
$descripcion = $tipo === '0km'
    ? 'Taxis 0KM disponibles en Taxis Barzola: unidades listas para trabajar, con gestoría incluida.'
    : 'Taxis usados seleccionados en Taxis Barzola, con o sin licencia.';
include __DIR__ . '/header.php';
?>
<section class="py-5 mt-5">
	<div class="container">
		<h1 class="display-5 fw-bold text-center mb-4"><?= e($c['titulo']) ?></h1>
		<?php if (!$autos): ?>
		<p class="text-center text-muted">En este momento no hay unidades publicadas. Consultanos por WhatsApp.</p>
		<?php endif; ?>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
			<?php foreach ($autos as $a) { include __DIR__ . '/tarjeta.php'; } ?>
		</div>
	</div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
