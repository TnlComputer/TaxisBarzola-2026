<?php
// Agrega las columnas de fotos que falten (foto1..foto20) en las tablas 0km y usados,
// con el mismo tipo que foto1. No modifica datos. Se puede ejecutar más de una vez.
// Uso (solo línea de comandos):  php herramientas/columnas_fotos.php
if (PHP_SAPI !== 'cli') {
	http_response_code(404);
	exit;
}

mysqli_report(MYSQLI_REPORT_OFF);
require __DIR__ . '/../Connections/conexionNew.php';

if ($conexionNew->connect_errno) {
	fwrite(STDERR, "No hay conexión a la base: {$conexionNew->connect_error}\n");
	exit(1);
}

// Algunas filas tienen fechas vacías (0000-00-00): se permite solo durante este cambio de estructura
$conexionNew->query("SET SESSION sql_mode = ''");

foreach (['0km' => '_0km', 'usados' => '_usado'] as $tabla => $sufijo) {
	$existentes = [];
	$res = $conexionNew->query("SHOW COLUMNS FROM `$tabla`");
	while ($c = $res->fetch_assoc()) {
		$existentes[$c['Field']] = $c;
	}
	$base = $existentes["foto1$sufijo"] ?? null;
	if (!$base) {
		fwrite(STDERR, "La tabla $tabla no tiene foto1$sufijo; no se modifica.\n");
		continue;
	}
	$tipo = $base['Type'] . ($base['Null'] === 'YES' ? ' NULL' : ' NOT NULL');
	$anterior = "foto1$sufijo";
	$agregadas = 0;
	for ($i = 2; $i <= 20; $i++) {
		$col = "foto$i$sufijo";
		if (!isset($existentes[$col])) {
			if (!$conexionNew->query("ALTER TABLE `$tabla` ADD COLUMN `$col` $tipo AFTER `$anterior`")) {
				fwrite(STDERR, "Error agregando $tabla.$col: {$conexionNew->error}\n");
				exit(1);
			}
			$agregadas++;
		}
		$anterior = $col;
	}
	echo "$tabla: $agregadas columnas agregadas\n";
}
