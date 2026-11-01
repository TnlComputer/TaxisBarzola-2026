<?php
// Tarjeta de un vehículo. Requiere $tipo y $a (fila de listar_vehiculos)
$url = 'detalle.php?tipo=' . $tipo . '&id=' . (int) $a['id'];
?>
<div class="col revelar">
	<article class="card tarjeta-auto h-100">
		<a href="<?= e($url) ?>">
			<?php if (foto_disponible($tipo, $a['foto'])): ?>
			<img src="<?= e(foto_url($tipo, $a['foto'])) ?>" class="card-img-top" width="500" height="375" alt="<?= e(trim($a['marca'] . ' ' . $a['modelo'])) ?>" loading="lazy" decoding="async">
			<?php else: ?>
			<div class="card-img-top sin-foto">Sin foto</div>
			<?php endif; ?>
		</a>
		<div class="card-body">
			<span class="badge bg-dark mb-2"><?= e(CATALOGO[$tipo]['titulo']) ?></span>
			<h3 class="h5 fw-bold mb-1"><?= e(trim($a['marca'] . ' ' . $a['modelo'])) ?></h3>
			<p class="text-muted small mb-0"><?= e(implode(' · ', array_filter([$a['combustible'], $a['anio']]))) ?></p>
		</div>
		<div class="card-footer bg-transparent border-0 pb-3 d-flex gap-2">
			<a class="btn btn-whatsapp flex-fill" href="<?= e(wa_consulta($tipo, $a)) ?>" target="_blank" rel="noopener"><?= icono_whatsapp(18) ?> Consultar</a>
			<a class="btn btn-outline-dark flex-fill" href="<?= e($url) ?>">Ver detalles</a>
		</div>
	</article>
</div>
