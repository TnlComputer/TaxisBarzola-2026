<?php
// Pie de página común (mismo diseño que la landing). Queda pegado abajo aunque la página sea corta.
$pieWhatsapp = [
    ['5491124737989', '11 2473-7989'],
    ['5491126203338', '11 2620-3338'],
];
?>
<style>
	html { height: 100%; }
	body { min-height: 100vh; display: flex; flex-direction: column; }
	body > * { flex-shrink: 0; width: 100%; }
	.pie-sitio { margin-top: auto; background: #1c1c1c; color: rgba(255, 255, 255, .55); font-size: .95rem; }
	.pie-sitio .pie-cuerpo { padding: 1.5rem 0; }
	.pie-sitio .pie-marca { color: #f2c230; font-weight: 700; margin-bottom: .25rem; }
	.pie-sitio a { color: #f8f9fa; }
	.pie-sitio a:hover { color: #f2c230; }
	.pie-sitio .pie-copy { background: #000; padding: .5rem 0; font-size: .8rem; text-align: center; }
	.pie-sitio .pie-copy a { color: #8a8a8a; }
</style>
<footer class="pie-sitio">
	<div class="container pie-cuerpo">
		<div class="row align-items-center">
			<div class="col-md-5 mb-3 mb-md-0">
				<p class="pie-marca">TAXIS BARZOLA</p>
				<p class="mb-0">Villa Luro - Ciudad de Buenos Aires<br>Coordinar entrevista previa por WhatsApp</p>
			</div>
			<div class="col-md-5 mb-3 mb-md-0">
				<?php foreach ($pieWhatsapp as [$numero, $texto]): ?>
				<a class="d-block" href="https://wa.me/<?= $numero ?>" target="_blank" rel="noopener">WhatsApp <?= $texto ?></a>
				<?php endforeach; ?>
			</div>
			<div class="col-md-2 text-md-right">
				<a href="https://qr.afip.gob.ar/?qr=XKpso0ZUbAEMmiKmvXp99g,," target="_blank" rel="noopener"><img src="img/DATAWEB-48x72-min.jpg" width="48" height="72" alt="Data Fiscal AFIP"></a>
			</div>
		</div>
	</div>
	<div class="pie-copy">
		&copy; <?= date('Y') ?> Taxis Barzola &middot; <a href="https://www.tnlcomputer.com.ar" rel="noopener">Tnl Computer Design</a>
	</div>
</footer>
