<?php
// Recibe el alta de un usado (formulario usadoAlta.php). Faltaba en el proyecto: se arma
// igual que el alta de 0KM (0kmRAlta.php), con las columnas de la tabla usados.
include "usuarios/autorizo.php";
require_once 'usuarios/subir_imagen.php';
require_once 'ModifiedImage.php';
include "Connections/conexionNew.php";

// Fotos 1 a 20: versión grande (big) y miniatura en images/usados. En la base se guarda "Usado..."
$fotos = [];
for ($n = 1; $n <= 20; $n++) {
	$campo = 'foto' . $n;
	$fotos[$n] = '';
	if (!empty($_FILES[$campo]['tmp_name']) && es_imagen_subida($_FILES[$campo])) {
		$nom = 'Usado' . nombre_archivo_seguro($_FILES[$campo]['name']);
		$image = new ModifiedImage($_FILES[$campo]['tmp_name']);
		$image->resizeToFit(500, 375, true, 'ffffff');
		$image->save('images/usados/big' . $nom);
		$image = new ModifiedImage($_FILES[$campo]['tmp_name']);
		$image->resizeToFit(150, 113, true, 'ffffff');
		$image->save('images/usados/' . $nom);
		$fotos[$n] = $nom;
	}
}

// El modelo llega como "model" si se eligió la marca (selectModelo.php) o como "modelo"
$datos = [
	'marca_usado'                  => $_POST['marca'] ?? '',
	'mod_usado'                    => $_POST['model'] ?? ($_POST['modelo'] ?? ''),
	'anio_usado'                   => $_POST['anio_txt'] ?? '',
	'motor_usado'                  => $_POST['motor_txt'] ?? '',
	'chasis_usado'                 => $_POST['chasis_txt'] ?? '',
	'dominio_usado'                => $_POST['dominio_txt'] ?? '',
	'combustible_usado'            => $_POST['Combustible_txt'] ?? '',
	'kilometraje_usado'            => $_POST['kilometraje_txt'] ?? '',
	'Valor_Compra_usado'           => $_POST['ValorCompra_txt'] ?? '',
	'nro_operacion_usado'          => $_POST['nroOperacion_txt'] ?? '',
	'vendedor_concecionario_usado' => $_POST['vendedorConcesionario_txt'] ?? '',
	'titular_usado'                => $_POST['titular_slc'] ?? '',
	'obs_usado'                    => $_POST['observaciones_txa'] ?? '',
	'estado_usado'                 => '',
	'ubicacion_usado'              => '',
];
// Las fechas solo se guardan si se completaron (una fecha vacía no es válida en la base)
foreach (['fecha_pedido_usado' => 'fechaPedido_txt', 'fecha_pago_usado' => 'fechaPago_txt'] as $col => $campo) {
	if (!empty($_POST[$campo])) {
		$datos[$col] = $_POST[$campo];
	}
}
// Mismo tratamiento de texto que el resto de la intranet
$datos = array_map(function ($v) { return mb_convert_encoding(trim((string) $v), 'UTF-8', 'ISO-8859-1'); }, $datos);
foreach ($fotos as $n => $nombre) {
	$datos['foto' . $n . '_usado'] = $nombre;
}

$columnas = implode(', ', array_keys($datos));
$marcas = implode(', ', array_fill(0, count($datos), '?'));
$st = $conexionNew->prepare("INSERT INTO usados ($columnas) VALUES ($marcas)");
$ejecutar_consulta = $st && $st->execute(array_values($datos));

$mensaje = $ejecutar_consulta ? "Alta Exitosa" : "Alta - No ha grabado en la base de datos";
$conexionNew->close();
header("Location: usadosAdmin.php?op=alta&mensaje=" . urlencode($mensaje));
exit;
