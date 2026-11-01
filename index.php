<?php
require __DIR__ . '/inc/config.php';
session_start();

$unidades = [
    '0km'   => listar_vehiculos($conexionNew, '0km', 6),
    'usado' => listar_vehiculos($conexionNew, 'usado', 6),
];

// En la portada, primero los autos con foto
foreach ($unidades as $tipo => &$lista) {
    usort($lista, function ($x, $y) use ($tipo) {
        return foto_disponible($tipo, $y['foto']) <=> foto_disponible($tipo, $x['foto']) ?: $y['id'] <=> $x['id'];
    });
}
unset($lista);

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
$estado = $_GET['contacto'] ?? '';

$activo      = 'inicio';
$precargar   = asset('img/portada-2.webp');
$canonical   = '';
$titulo      = 'Venta de taxis 0KM y usados con licencia';
$descripcion = 'Taxis Barzola: venta de taxis 0KM y usados, con o sin licencia. Tomamos tu auto como parte de pago, financiación y gestoría incluida. Desde 1970 junto al gremio.';
include __DIR__ . '/inc/header.php';

$fotos = [
    ['1-TAPA_REVISTA_VIVA_1995', 'Portada Revista Viva (1995)', 'En su interior, nota a Taxis Barzola'],
    ['7-0913_taxi_rolando_g', 'Rolando Rivas', 'Telenovela de Canal 9'],
    ['5-fotos_los_3', 'Familia Barzola', ''],
    ['viva2', 'Nota Revista Viva (1995)', '"Subí que te llevo" - sección Curiosidades'],
    ['4-alvarez_thomas', 'Local Av. Álvarez Thomas', '1989 a 1996'],
    ['9-la_boca', 'Caminito', 'La Boca'],
    ['3-SAN_MARTIN', 'Local Av. San Martín', '1979 a 1988'],
    ['6-reloj_antiguo', 'Reloj antiguo', ''],
    ['8-IMG_5710', 'Obelisco', 'Ciudad Autónoma de Buenos Aires'],
    ['ford-a', 'Ford A modelo 29', 'El taxi clásico de Taxis Barzola'],
];

// Leyendas del slider original del sitio
$diapositivas = [
    [
        'texto' => '<p class="leyenda-titulo">Usados seleccionados</p>',
        'boton' => ['usados.php', 'Usados'],
        'img' => 'portada-2.webp', 'w' => 597, 'h' => 356, 'alt' => 'Taxi frente al local de Taxis Barzola',
    ],
    [
        'texto' => '<p class="leyenda-titulo">La gama más amplia de 0KM<br>en nuestros salones de venta</p>',
        'boton' => ['nuevos.php', '0KM'],
        'img' => 'portada-1.webp', 'w' => 692, 'h' => 389, 'alt' => 'Taxi 0KM en el salón de venta de Taxis Barzola',
    ],
    [
        'texto' => '<p class="leyenda-titulo">Desde 1970 el Sr. Barzola supo comprender las necesidades que esta actividad requiere.</p>'
            . '<p class="leyenda-texto">Desde entonces, y habiendo transitado diferentes ciclos de nuestra querida Argentina, '
            . '<strong class="text-oro">"TAXIS BARZOLA"</strong> es hoy la empresa líder en el negocio de '
            . '<strong class="text-white">COMPRA VENTA DE TAXIS CON LICENCIA</strong></p>',
        'boton' => null,
        'img' => 'hero.webp', 'w' => 291, 'h' => 428, 'alt' => 'El Sr. Barzola junto al Ford A de Taxis Barzola',
    ],
];

$preguntas = [
    ['¿Venden taxis con licencia?', 'Sí. Tenemos un amplio y variado stock de unidades 0KM y usadas, con o sin licencia, con disponibilidad inmediata.'],
    ['¿Puedo entregar mi auto como parte de pago?', 'Sí. Tomamos tu vehículo, taxi o particular, como parte de pago de la unidad que elijas.'],
    ['¿Tienen financiación?', 'Sí, ofrecemos financiación adecuada a cada caso. Escribinos por WhatsApp y te pasamos un presupuesto "listo para trabajar".'],
    ['¿Qué trámites están incluidos?', 'Gestoría integral para trámites ante SACTA y AFIP, escribanía y registro del automotor. Además habilitamos y armamos tu vehículo (pintura y reloj).'],
    ['¿Dónde están y cómo los visito?', 'Estamos en ' . ZONA . '. Atendemos con entrevista previa: coordiná día y horario por WhatsApp.'],
];
?>
<section class="hero text-white">
	<div class="container">
		<h1 class="visually-hidden">Taxis Barzola: venta de taxis 0KM y usados con licencia, desde 1970 junto al gremio</h1>
		<div id="hero-fotos" class="carousel slide carousel-fade hero-carrusel" data-bs-ride="carousel" data-bs-interval="9000" data-bs-pause="hover" aria-label="Presentación de Taxis Barzola">
			<div class="carousel-inner">
				<?php foreach ($diapositivas as $i => $d): ?>
				<div class="carousel-item<?= $i === 0 ? ' active' : '' ?>">
					<div class="row align-items-center g-4">
						<div class="col-lg-6 leyenda">
							<p class="leyenda-marca">Taxis Barzola</p>
							<?= $d['texto'] ?>
							<?php if ($d['boton']): ?>
							<a class="btn btn-oro btn-lg" href="<?= $d['boton'][0] ?>"><?= $d['boton'][1] ?></a>
							<?php endif; ?>
						</div>
						<div class="col-lg-6 text-center leyenda-media">
							<img src="<?= asset('img/' . $d['img']) ?>" width="<?= $d['w'] ?>" height="<?= $d['h'] ?>" class="leyenda-foto rounded-4 shadow-lg" alt="<?= e($d['alt']) ?>"<?= $i === 0 ? ' fetchpriority="high"' : ' loading="lazy"' ?>>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#hero-fotos" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Anterior</span></button>
			<button class="carousel-control-next" type="button" data-bs-target="#hero-fotos" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span></button>
			<div class="carousel-indicators">
				<?php foreach ($diapositivas as $i => $d): ?>
				<button type="button" data-bs-target="#hero-fotos" data-bs-slide-to="<?= $i ?>"<?= $i === 0 ? ' class="active" aria-current="true"' : '' ?> aria-label="Diapositiva <?= $i + 1 ?>"></button>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="hero-cta d-flex flex-wrap align-items-center gap-3 mt-4">
			<a class="btn btn-whatsapp btn-lg" href="<?= e(wa_link()) ?>" target="_blank" rel="noopener">
				<?= icono_whatsapp(24) ?> Consultar por WhatsApp
			</a>
			<span class="small text-white-50">Nueva dirección en Villa Luro · Atención con entrevista previa</span>
		</div>
	</div>
</section>

<section class="confianza py-3">
	<div class="container">
		<ul class="row row-cols-2 row-cols-lg-4 g-2 list-unstyled mb-0 text-center fw-bold">
			<li class="col">Más de 50 años en el gremio</li>
			<li class="col">0KM y usados, con o sin licencia</li>
			<li class="col">Tu auto como parte de pago</li>
			<li class="col">Gestoría y trámites incluidos</li>
		</ul>
	</div>
</section>

<section id="unidades" class="py-5">
	<div class="container">
		<div class="d-md-flex justify-content-between align-items-end mb-4">
			<h2 class="titulo-seccion mb-3 mb-md-0">Unidades disponibles</h2>
			<ul class="nav nav-pills" role="tablist">
				<li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-0km" type="button" role="tab" aria-controls="tab-0km" aria-selected="true">0KM</button></li>
				<li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-usado" type="button" role="tab" aria-controls="tab-usado" aria-selected="false">Usados</button></li>
			</ul>
		</div>
		<div class="tab-content">
			<?php foreach ($unidades as $tipo => $autos): $c = CATALOGO[$tipo]; ?>
			<div class="tab-pane fade<?= $tipo === '0km' ? ' show active' : '' ?>" id="tab-<?= $tipo ?>" role="tabpanel">
				<?php if ($autos): ?>
				<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
					<?php foreach ($autos as $a) { include __DIR__ . '/inc/tarjeta.php'; } ?>
				</div>
				<div class="text-center mt-4"><a class="btn btn-dark btn-lg" href="<?= $c['listado'] ?>">Ver todos los <?= e($c['titulo']) ?></a></div>
				<?php else: ?>
				<div class="text-center py-4">
					<p class="text-muted">Consultanos por las unidades <?= e($c['titulo']) ?> disponibles.</p>
					<a class="btn btn-whatsapp" href="<?= e(wa_link(0, 'Hola, quiero consultar por unidades ' . $c['titulo'] . ' disponibles.')) ?>" target="_blank" rel="noopener"><?= icono_whatsapp(20) ?> Consultar por WhatsApp</a>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="como-funciona" class="py-5 bg-white">
	<div class="container">
		<h2 class="titulo-seccion revelar">Cómo funciona</h2>
		<ol class="pasos row row-cols-1 row-cols-md-3 g-4 list-unstyled">
			<li class="col revelar"><div class="paso h-100"><span class="paso-num">1</span><h3 class="h5 fw-bold">Escribinos por WhatsApp</h3><p class="mb-0 text-muted">Contanos qué unidad buscás y si querés entregar tu auto como parte de pago.</p></div></li>
			<li class="col revelar"><div class="paso h-100"><span class="paso-num">2</span><h3 class="h5 fw-bold">Coordinamos la entrevista</h3><p class="mb-0 text-muted">Te esperamos en Villa Luro con el presupuesto "listo para trabajar".</p></div></li>
			<li class="col revelar"><div class="paso h-100"><span class="paso-num">3</span><h3 class="h5 fw-bold">Salís a trabajar</h3><p class="mb-0 text-muted">Nos ocupamos de la gestoría, la habilitación y el armado de tu taxi.</p></div></li>
		</ol>
	</div>
</section>

<section class="py-5">
	<div class="container">
		<h2 class="titulo-seccion revelar">En nuestra empresa usted encontrará</h2>
		<ul class="lista-check row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 list-unstyled">
			<li class="col">Asesoramiento integral de la actividad</li>
			<li class="col">Disponibilidad inmediata de unidades 0KM</li>
			<li class="col">Excelentes unidades usadas</li>
			<li class="col">Cumplimiento y seguridad en el proceso de armado</li>
			<li class="col">Inmediata salida laboral</li>
			<li class="col">Permuta de vehículos usados</li>
		</ul>
	</div>
</section>

<section id="permuta" class="seccion-oscura py-5">
	<div class="container">
		<div class="row g-4">
			<div class="col-md-6">
				<h2 class="titulo-seccion text-white revelar">Comprá tu taxi</h2>
				<ul class="lista-check lista-clara list-unstyled">
					<li>Amplio y variado stock con o sin licencia</li>
					<li>Financiación adecuada</li>
					<li>Gestoría y trámites incluidos</li>
					<li>Presupuestos "listos para trabajar"</li>
				</ul>
			</div>
			<div class="col-md-6">
				<h2 class="titulo-seccion text-white revelar">Entregá tu auto</h2>
				<ul class="lista-check lista-clara list-unstyled">
					<li>Tomamos su vehículo, taxi o particular, como parte de pago</li>
					<li>Cualquier modelo y estado</li>
					<li>Resolución inmediata con o sin licencia</li>
				</ul>
				<a class="btn btn-oro mt-2" href="<?= e(wa_link(0, 'Hola, quiero cotizar mi auto como parte de pago de un taxi.')) ?>" target="_blank" rel="noopener">Cotizar mi auto como parte de pago</a>
			</div>
		</div>
	</div>
</section>

<section id="licencias" class="py-5 bg-white">
	<div class="container">
		<div class="row g-4 align-items-center">
			<div class="col-lg-7">
				<h2 class="titulo-seccion revelar">Licencias</h2>
				<ul class="lista-check list-unstyled">
					<li><strong>Resolución inmediata</strong> en la compra y venta</li>
					<li><strong>Habilitamos y armamos</strong> (pintura y reloj) <strong>su vehículo</strong></li>
					<li><strong>Gestoría integral</strong> para trámites ante <strong>SACTA y AFIP</strong></li>
					<li><strong>Gestoría y trámites incluidos</strong></li>
					<li><strong>Escribanía y registro del automotor</strong></li>
				</ul>
			</div>
			<div class="col-lg-5 d-flex gap-3 justify-content-center revelar">
				<img src="<?= asset('img/libre.webp') ?>" width="187" height="139" class="img-fluid rounded-3 shadow-sm w-50" alt="Taxi habilitado" loading="lazy">
				<img src="<?= asset('img/puerta.webp') ?>" width="138" height="136" class="img-fluid rounded-3 shadow-sm w-50" alt="Puerta de taxi" loading="lazy">
			</div>
		</div>
	</div>
</section>

<section id="preguntas" class="py-5">
	<div class="container contenedor-angosto">
		<h2 class="titulo-seccion revelar">Preguntas frecuentes</h2>
		<div class="accordion revelar" id="faq">
			<?php foreach ($preguntas as $i => [$p, $r]): ?>
			<div class="accordion-item">
				<h3 class="accordion-header">
					<button class="accordion-button<?= $i ? ' collapsed' : '' ?> fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?= $i ?>" aria-expanded="<?= $i ? 'false' : 'true' ?>" aria-controls="faq-<?= $i ?>"><?= e($p) ?></button>
				</h3>
				<div id="faq-<?= $i ?>" class="accordion-collapse collapse<?= $i ? '' : ' show' ?>" data-bs-parent="#faq">
					<div class="accordion-body"><?= e($r) ?></div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="contacto" class="seccion-oscura py-5">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-5 text-white">
				<h2 class="titulo-seccion text-white revelar">Coordiná tu entrevista</h2>
				<p class="text-white-50">Nueva dirección en <?= e(ZONA) ?>. Atendemos con entrevista previa: escribinos por WhatsApp y coordinamos.</p>
				<?php foreach (WHATSAPP as $i => $w): ?>
				<a class="btn btn-whatsapp mb-2 me-2" href="<?= e(wa_link($i)) ?>" target="_blank" rel="noopener">
					<?= icono_whatsapp(20) ?> <?= e($w['texto']) ?>
				</a>
				<?php endforeach; ?>
				<p class="text-white-50 small mt-3 mb-0">¿Preferís que te contactemos? Dejanos tus datos en el formulario.</p>
			</div>
			<div class="col-lg-7">
				<?php if ($estado === 'ok'): ?>
				<div class="alert alert-success" role="status">¡Gracias! Recibimos tu mensaje y te responderemos a la brevedad.</div>
				<?php elseif ($estado === 'error'): ?>
				<div class="alert alert-danger" role="alert">No pudimos enviar el mensaje. Revisá los datos o escribinos por WhatsApp.</div>
				<?php endif; ?>
				<form class="card card-body revelar" action="contacto.php" method="post">
					<input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
					<div class="d-none" aria-hidden="true"><label>No completar <input type="text" name="sitio" tabindex="-1" autocomplete="off"></label></div>
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label" for="nombre">Nombre</label>
							<input class="form-control" id="nombre" name="nombre" required maxlength="100" autocomplete="name">
						</div>
						<div class="col-md-6">
							<label class="form-label" for="telefono">Teléfono</label>
							<input class="form-control" id="telefono" name="telefono" type="tel" maxlength="40" autocomplete="tel">
						</div>
						<div class="col-md-6">
							<label class="form-label" for="email">Email</label>
							<input class="form-control" id="email" name="email" type="email" required maxlength="150" autocomplete="email">
						</div>
						<div class="col-md-6">
							<label class="form-label" for="asunto">¿Qué estás buscando?</label>
							<select class="form-select" id="asunto" name="asunto">
								<option>Taxi 0KM</option>
								<option>Taxi usado</option>
								<option>Entregar mi auto como parte de pago</option>
								<option>Licencia / trámites</option>
								<option>Otro</option>
							</select>
						</div>
						<div class="col-12">
							<label class="form-label" for="mensaje">Mensaje</label>
							<textarea class="form-control" id="mensaje" name="mensaje" rows="4" required maxlength="3000"></textarea>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-dark w-100">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section id="videos" class="py-5 seccion-oscura">
	<div class="container">
		<h2 class="titulo-seccion text-white revelar">Junto al gremio, junto a la comunidad</h2>
		<p class="text-white-50 mb-4 revelar">Caravana solidaria de taxis al Hospital de Niños.</p>
		<div class="row g-4">
			<?php foreach ([['caravana-solidaria', 'Caravana solidaria'], ['hospital-de-ninos', 'Llegada al Hospital de Niños']] as [$video, $tit]): ?>
			<figure class="col-md-6 mb-0 revelar">
				<video class="w-100 rounded-4 shadow" controls preload="none" playsinline width="640" height="480" poster="<?= asset('video/' . $video . '.webp') ?>">
					<source src="<?= asset('video/' . $video . '.mp4') ?>" type="video/mp4">
				</video>
				<figcaption class="text-white mt-2 fw-bold"><?= e($tit) ?></figcaption>
			</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="fotos" class="py-5">
	<div class="container">
		<div class="row g-4 align-items-center mb-5 revelar">
			<div class="col-md-4 text-center">
				<img src="<?= asset('img/hero.webp') ?>" class="hero-foto rounded-4 shadow" width="291" height="428" alt="El Sr. Barzola junto al Ford A de Taxis Barzola" loading="lazy">
			</div>
			<div class="col-md-8">
				<h2 class="titulo-seccion">Nuestra historia</h2>
				<p class="lead">Desde 1970 el Sr. Barzola supo comprender las necesidades que esta actividad requiere.</p>
				<p>Desde entonces, y habiendo transitado diferentes ciclos de nuestra querida Argentina, <strong>Taxis Barzola</strong> es hoy la empresa líder en el negocio de <strong>compra y venta de taxis con licencia</strong>.</p>
			</div>
		</div>
		<div class="row row-cols-2 row-cols-md-3 g-3">
			<?php foreach ($fotos as [$archivo, $tit, $sub]): ?>
			<figure class="col mb-0 revelar">
				<a class="foto" href="<?= asset('img/historia/' . $archivo . '.webp') ?>" data-lightbox data-caption="<?= e($tit) ?>">
					<img src="<?= asset('img/historia/' . $archivo . '-thumb.webp') ?>" class="img-fluid" alt="<?= e($tit) ?>" loading="lazy" decoding="async">
				</a>
				<figcaption class="mt-2"><strong><?= e($tit) ?></strong><?php if ($sub): ?><br><small class="text-muted"><?= e($sub) ?></small><?php endif; ?></figcaption>
			</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<dialog id="visor" class="visor" aria-label="Foto ampliada">
	<button type="button" class="btn-close btn-close-white visor-cerrar" aria-label="Cerrar"></button>
	<img alt="">
	<p class="text-white text-center mt-2 mb-0"></p>
</dialog>

<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(function ($q) {
        return ['@type' => 'Question', 'name' => $q[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $q[1]]];
    }, $preguntas),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>

</script>
<?php include __DIR__ . '/inc/footer.php'; ?>
