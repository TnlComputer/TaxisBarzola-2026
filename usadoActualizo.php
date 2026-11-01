<?php 
include "usuarios/autorizo.php"; 
require_once 'usuarios/subir_imagen.php';

include "Connections/conexionNew.php";

$id_usado=$_POST["id_usado2"];
$idFoto=$id_usado;
$consUsados = "SELECT * FROM usados WHERE id_usado=?";
$st = $conexionNew->prepare($consUsados);
$st->execute([(string)$id_usado]);
$ejecutar_consUsados = $st->get_result();
$num_regs = $ejecutar_consUsados->num_rows;


        $anio			=$_POST["anio_txt"];
        $chasis			=$_POST["chasis_txt"];
		$combustible	=$_POST["Combustible_txt"];
		$concesionario	=$_POST["concesionario_txt"];
		$dominio		=$_POST["dominio_txt"];
		$fechaPago		=$_POST["fechaPago_txt"];		
		$fechaPedido	=$_POST["fechaPedido_txt"];
        $marca			=$_POST["marca_slc"];
        $modelo			=$_POST["modelo_slc"];
		$mostrar		=$_POST["mostrar_slc"];
		$motor			=$_POST["motor_txt"];
		$nroOperacion	=$_POST["nroOperacion_txt"];
		$observaciones	=$_POST["observaciones_txa"];
		$titular		=$_POST["titular_txt"];
		$local			=$_POST["local_slc"];		
		$valorCompra	=$_POST["ValorCompra_txt"];
		$vendedor		=$_POST["vendedorConcesionario_txt"];


if($num_regs==1)
{
	require_once 'ModifiedImage.php';
	// Fotos 1 a 20: si se sube una imagen válida se guardan la versión grande (big) y la miniatura
	// en images/usados; si no, queda la foto actual. En la base se guarda el nombre "Usado...".
	for ($n = 1; $n <= 20; $n++) {
		$campo = 'foto' . $n;
		if (!empty($_FILES[$campo]['tmp_name']) && es_imagen_subida($_FILES[$campo])) {
			$nom = 'Usado' . nombre_archivo_seguro($_FILES[$campo]['name']);
			$image = new ModifiedImage($_FILES[$campo]['tmp_name']);
			$image->resizeToFit(500, 375, true, 'ffffff');
			$image->save('images/usados/big' . $nom);
			$image = new ModifiedImage($_FILES[$campo]['tmp_name']);
			$image->resizeToFit(150, 113, true, 'ffffff');
			$image->save('images/usados/' . $nom);
			${$campo} = $nom;
		} else {
			${$campo} = $_POST['imagen' . $n . '_hdn'] ?? '';
		}
	}
	

//
//        echo '<br>anio '.$anio			;
//        echo '<br>chasis'.$chasis		;
//		echo '<br>combustible '.$combustible	;
//		echo '<br>concesionario '.$concesionario	;
//		echo '<br>dominio '.$dominio		;
//		echo '<br>fechaPago '.$fechaPago		;		
//		echo '<br>fechaPedido '.$fechaPedido	;
//     	echo '<br>foto1 '.$foto1			;
//    	echo '<br>foto2 '.$foto2			;
//		echo '<br>foto3 '.$foto3			;
//   	  	echo '<br>foto4 '.$foto4			;
//      	echo '<br>foto5 '.$foto5			;
//		echo '<br>foto6 '.$foto6			;
//        echo '<br>marca '.$marca			;
//        echo '<br>modelo '.$modelo			;
//		echo '<br>mostrar '.$mostrar		;
//		echo '<br>motor '.$motor			;
//		echo '<br>nroOperacion '.$nroOperacion	;
//		echo '<br>observaciones '.$observaciones	;
//		echo '<br>titular '.$titular		;
//		echo '<br>local '.$local			;		
//		echo '<br>valorCompra '.$valorCompra	;
//		echo '<br>vendedor '.$vendedor		;
//

	$consUsados="UPDATE usados SET anio_usado=?, 
	chasis_usado=?, 
	combustible_usado=?, 
	concecionario_usado=?, 
	dominio_usado=?, 
	fecha_pago_usado=?,  
	fecha_pedido_usado=?, 
	foto1_usado=?, 
	foto2_usado=?, 
	foto3_usado=?, 
	foto4_usado=?, 
	foto5_usado=?, 
	foto6_usado=?, 
	foto7_usado=?, 
	foto8_usado=?, 
	foto9_usado=?, 
	foto10_usado=?, 
	foto11_usado=?, 
	foto12_usado=?, 
	foto13_usado=?, 
	foto14_usado=?, 
	foto15_usado=?, 
	foto16_usado=?, 
	foto17_usado=?, 
	foto18_usado=?, 
	foto19_usado=?, 
	foto20_usado=?, 
	marca_usado=?, 
	mod_usado=?, 
	mostrar=?, 
	motor_usado=?, 
	nro_operacion_usado=?, 
	obs_usado=?, 
	titular_usado=?, 
	ubicacion_usado=?, 
	Valor_Compra_usado=?, 
	vendedor_concecionario_usado=?  
	
	WHERE id_usado=?";

	$st=$conexionNew->prepare($consUsados);
	$ejecutar_consUsados=$st->execute([mb_convert_encoding((string)$anio, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$chasis, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$combustible, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$concesionario, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$dominio, 'UTF-8', 'ISO-8859-1'), (trim((string)$fechaPago) === '' ? null : (string)$fechaPago), (trim((string)$fechaPedido) === '' ? null : (string)$fechaPedido), mb_convert_encoding((string)$foto1, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto2, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto3, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto4, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto5, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto6, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto7, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto8, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto9, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto10, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto11, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto12, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto13, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto14, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto15, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto16, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto17, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto18, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto19, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto20, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$modelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$mostrar, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$motor, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$nroOperacion, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$observaciones, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$titular, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$local, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$valorCompra, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$vendedor, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_usado, 'UTF-8', 'ISO-8859-1')]);
 
	if ($ejecutar_consUsados) 
	{ 	
		$mensaje="Cambio exitoso"; 	
	}else{
		$mensaje= "Cambio - No ha grabado en la base de datos";
	}

}else{
	$mensaje= "No se ha guardado, el usuario no existe o esta duplicado";
}
$conexionNew->close();	
header ("Location: usadosAdmin.php?op=cambio&mensaje=" . urlencode($mensaje));
exit;
?>