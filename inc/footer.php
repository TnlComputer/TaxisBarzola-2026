</main>
<footer class="pie text-white-50">
	<div class="container py-4">
		<div class="row g-4 align-items-center">
			<div class="col-md-5">
				<p class="mb-1 text-oro fw-bold">TAXIS BARZOLA</p>
				<p class="mb-0"><?= e(ZONA) ?><br>Coordinar entrevista previa por WhatsApp</p>
			</div>
			<div class="col-md-5">
				<?php foreach (WHATSAPP as $i => $w): ?>
				<a class="d-block link-light" href="<?= e(wa_link($i)) ?>" target="_blank" rel="noopener">WhatsApp <?= e($w['texto']) ?></a>
				<?php endforeach; ?>
			</div>
			<div class="col-md-2 text-md-end">
				<a href="<?= e(AFIP_QR) ?>" target="_blank" rel="noopener"><img src="<?= asset('img/afip.jpg') ?>" width="48" height="72" alt="Data Fiscal AFIP" loading="lazy"></a>
			</div>
		</div>
	</div>
	<div class="pie-copy py-2 small text-center">
		&copy; <?= date('Y') ?> Taxis Barzola &middot; <a href="https://www.tnlcomputer.com.ar" class="link-secondary" rel="noopener">Tnl Computer Design</a>
		<a href="<?= MEDIA ?>login.php" class="login-oculto" aria-label="Administración" rel="nofollow">&middot;</a>
	</div>
</footer>
<a class="wa-flotante d-none d-lg-flex" href="<?= e(wa_link()) ?>" target="_blank" rel="noopener" aria-label="Escribinos por WhatsApp">
	<span class="wa-etiqueta">¿Consultas? <strong>Escribinos</strong></span>
	<span class="wa-circulo"><?= icono_whatsapp(32) ?></span>
</a>
<div class="barra-wa d-lg-none">
	<a class="btn btn-whatsapp w-100 btn-lg" href="<?= e(wa_link()) ?>" target="_blank" rel="noopener">
		<?= icono_whatsapp(24) ?> Consultar por WhatsApp
	</a>
</div>
<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AutoDealer',
    'name' => SITE_NAME,
    'url' => SITE_URL,
    'image' => SITE_URL . '/assets/img/hero.webp',
    'foundingDate' => '1970',
    'telephone' => '+' . WHATSAPP[0]['numero'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Villa Luro, Ciudad de Buenos Aires', 'addressCountry' => 'AR'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>

</script>
</body>
</html>
