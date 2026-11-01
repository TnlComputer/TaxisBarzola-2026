<?php 
include "usuarios/autorizo.php"; 
require_once 'usuarios/subir_imagen.php';

include "Connections/conexionNew.php";

$id_0km=$_POST["id_0km2"];

$cons0km = "SELECT * FROM 0km WHERE id_0km=?";
$st = $conexionNew->prepare($cons0km);
$st->execute([(string)$id_0km]);
$ejecutar_cons0km = $st->get_result();
$num_regs = $ejecutar_cons0km->num_rows;

	$rutaEnServidor='images/0km';
	if(empty($_FILES["foto1"]["tmp_name"]) || !es_imagen_subida($_FILES["foto1"]))
	{
		$foto1 = $_POST["imagen1_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto1']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto1']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto1']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen1=$img;
		$img=NULL;
   		$foto1=$NombreImagen1;
	}

	if(empty($_FILES["foto2"]["tmp_name"]) || !es_imagen_subida($_FILES["foto2"]))
	{
		$foto2 = $_POST["imagen2_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto2']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto2']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto2']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen2=$img;
		$img=NULL;
   		$foto2=$NombreImagen2;
	}

	if(empty($_FILES["foto3"]["tmp_name"]) || !es_imagen_subida($_FILES["foto3"]))
	{
		$foto3 = $_POST["imagen3_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto3']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto3']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto3']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen3=$img;
		$img=NULL;
   		$foto3=$NombreImagen3;
	}

	if(empty($_FILES["foto4"]["tmp_name"]) || !es_imagen_subida($_FILES["foto4"]))
	{
		$foto4 = $_POST["imagen4_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto4']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto4']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto4']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen4=$img;
		$img=NULL;
   		$foto4=$NombreImagen4;
	}

	if(empty($_FILES["foto5"]["tmp_name"]) || !es_imagen_subida($_FILES["foto5"]))
	{
		$foto5 = $_POST["imagen5_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto5']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto5']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto5']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen5=$img;
		$img=NULL;
   		$foto5=$NombreImagen5;
	}

	if(empty($_FILES["foto6"]["tmp_name"]) || !es_imagen_subida($_FILES["foto6"]))
	{
		$foto6 = $_POST["imagen6_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto6']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto6']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto6']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen6=$img;
		$img=NULL;
   		$foto6=$NombreImagen6;
	}

	if(empty($_FILES["foto7"]["tmp_name"]) || !es_imagen_subida($_FILES["foto7"]))
	{
		$foto7 = $_POST["imagen7_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto7']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto7']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto7']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen7=$img;
		$img=NULL;
   		$foto7=$NombreImagen7;
	}
	
	if(empty($_FILES["foto8"]["tmp_name"]) || !es_imagen_subida($_FILES["foto8"]))
	{
		$foto8 = $_POST["imagen8_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto8']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto8']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto8']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen8=$img;
		$img=NULL;
   		$foto8=$NombreImagen8;
	}

	if(empty($_FILES["foto9"]["tmp_name"]) || !es_imagen_subida($_FILES["foto9"]))
	{
		$foto9 = $_POST["imagen9_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto9']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto9']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto9']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen9=$img;
		$img=NULL;
   		$foto9=$NombreImagen9;
	}

	if(empty($_FILES["foto10"]["tmp_name"]) || !es_imagen_subida($_FILES["foto10"]))
	{
		$foto10 = $_POST["imagen10_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto10']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto10']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto10']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen10=$img;
		$img=NULL;
   		$foto10=$NombreImagen10;
	}

	if(empty($_FILES["foto11"]["tmp_name"]) || !es_imagen_subida($_FILES["foto11"]))
	{
		$foto11 = $_POST["imagen11_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto11']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto11']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto11']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen11=$img;
		$img=NULL;
   		$foto11=$NombreImagen11;
	}

	if(empty($_FILES["foto12"]["tmp_name"]) || !es_imagen_subida($_FILES["foto12"]))
	{
		$foto12 = $_POST["imagen12_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto12']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto12']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto12']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen12=$img;
		$img=NULL;
   		$foto12=$NombreImagen12;
	}

	if(empty($_FILES["foto13"]["tmp_name"]) || !es_imagen_subida($_FILES["foto13"]))
	{
		$foto13 = $_POST["imagen13_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto13']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto13']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto13']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen13=$img;
		$img=NULL;
   		$foto13=$NombreImagen13;
	}

	if(empty($_FILES["foto14"]["tmp_name"]) || !es_imagen_subida($_FILES["foto14"]))
	{
		$foto14 = $_POST["imagen14_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto14']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto14']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto14']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen14=$img;
		$img=NULL;
   		$foto14=$NombreImagen14;
	}

	if(empty($_FILES["foto15"]["tmp_name"]) || !es_imagen_subida($_FILES["foto15"]))
	{
		$foto15 = $_POST["imagen15_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto15']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto15']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto15']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen15=$img;
		$img=NULL;
   		$foto15=$NombreImagen15;
	}

	if(empty($_FILES["foto16"]["tmp_name"]) || !es_imagen_subida($_FILES["foto16"]))
	{
		$foto16 = $_POST["imagen16_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto16']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto16']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto16']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen16=$img;
		$img=NULL;
   		$foto16=$NombreImagen16;
	}

	if(empty($_FILES["foto17"]["tmp_name"]) || !es_imagen_subida($_FILES["foto17"]))
	{
		$foto17 = $_POST["imagen17_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto17']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto17']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto17']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen17=$img;
		$img=NULL;
   		$foto17=$NombreImagen17;
	}

	if(empty($_FILES["foto18"]["tmp_name"]) || !es_imagen_subida($_FILES["foto18"]))
	{
		$foto18 = $_POST["imagen18_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto18']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto18']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto18']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen18=$img;
		$img=NULL;
   		$foto18=$NombreImagen18;
	}

	if(empty($_FILES["foto19"]["tmp_name"]) || !es_imagen_subida($_FILES["foto19"]))
	{
		$foto19 = $_POST["imagen19_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto19']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto19']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto19']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen19=$img;
		$img=NULL;
   		$foto19=$NombreImagen19;
	}

	if(empty($_FILES["foto20"]["tmp_name"]) || !es_imagen_subida($_FILES["foto20"]))
	{
		$foto20 = $_POST["imagen20_hdn"];
	}else{
		require_once 'ModifiedImage.php';
 
		$image = new ModifiedImage($_FILES['foto20']['tmp_name']);
		$nom = nombre_archivo_seguro($_FILES['foto20']['name']);
		$img = 'big0km' . $nom;
		$image->resizeToFit(700, 500, true, 'ffffff');
		$image->save("images/0km/".$img);

		$image = new ModifiedImage($_FILES['foto20']['tmp_name']);
		$img = '0km' . $nom;
		$image->resizeToFit(190, 144, true, 'ffffff');
		$image->save("images/0km/".$img);

		$NombreImagen20=$img;
		$img=NULL;
   		$foto20=$NombreImagen20;
	}


        $fbor1			=$_POST["Borrar1"];
        $fbor2			=$_POST["Borrar2"];
        $fbor3			=$_POST["Borrar3"];
        $fbor4			=$_POST["Borrar4"];
        $fbor5			=$_POST["Borrar5"];
        $fbor6			=$_POST["Borrar6"];
        $fbor7			=$_POST["Borrar7"];
        $fbor8			=$_POST["Borrar8"];
        $fbor9			=$_POST["Borrar9"];
        $fbor10			=$_POST["Borrar10"];
        $fbor11			=$_POST["Borrar11"];
        $fbor12			=$_POST["Borrar12"];
        $fbor13			=$_POST["Borrar13"];
        $fbor14			=$_POST["Borrar14"];
        $fbor15			=$_POST["Borrar15"];
        $fbor16			=$_POST["Borrar16"];
        $fbor17			=$_POST["Borrar17"];
        $fbor18			=$_POST["Borrar18"];
        $fbor19			=$_POST["Borrar19"];
        $fbor20			=$_POST["Borrar20"];

		if ($fbor1=='SI'){
			$foto1=NULL;
		}
		if ($fbor2=='SI'){
			$foto2=NULL;
		}
		if ($fbor3=='SI'){
			$foto3=NULL;
		}
		if ($fbor4=='SI'){
			$foto4=NULL;
		}
		if ($fbor5=='SI'){
			$foto5=NULL;
		}
		if ($fbor6=='SI'){
			$foto6=NULL;
		}
		if ($fbor7=='SI'){
			$foto7=NULL;
		}
		if ($fbor8=='SI'){
			$foto8=NULL;
		}
		if ($fbor9=='SI'){
			$foto9=NULL;
		}
		if ($fbor10=='SI'){
			$foto10=NULL;
		}
		if ($fbor11=='SI'){
			$foto11=NULL;
		}
		if ($fbor12=='SI'){
			$foto12=NULL;
		}
		if ($fbor13=='SI'){
			$foto13=NULL;
		}
		if ($fbor14=='SI'){
			$foto14=NULL;
		}
		if ($fbor15=='SI'){
			$foto15=NULL;
		}
		if ($fbor16=='SI'){
			$foto16=NULL;
		}
		if ($fbor17=='SI'){
			$foto17=NULL;
		}
		if ($fbor18=='SI'){
			$foto18=NULL;
		}
		if ($fbor19=='SI'){
			$foto19=NULL;
		}
		if ($fbor20=='SI'){
			$foto20=NULL;
		}

        $anio			=$_POST["anio_txt"];
        $chasis			=$_POST["chasis_txt"];
		$combustible	=$_POST["Combustible_txt"];
		$concesionario	=$_POST["concesionario_0km"];
		// $dominio		=$_POST["dominio_0km_txt"];
		// $fechaPago		=$_POST["fecha_pago_0km_txt"];		
		// $fechaPedido	=$_POST["fecha_pedido_0km_txt"];
        $marca			=$_POST["marca_slc"];
        $modelo			=$_POST["modelo_slc"];
		// $mostrar		=$_POST["mostrar_slc"];
		$motor			=$_POST["motor_txt"];
		// $nroOperacion	=$_POST["nro_operacion_0km"];
		$observaciones	=$_POST["observaciones_txa"];
		// $titular		=$_POST["titular_slc"];
		// $local			=$_POST["local_slc"];		
		$valorCompra	=$_POST["Valor_Compra_0k_txt"];
		// $vendedor		=$_POST["vendedor_concesionario_0km"];


	$cons0km="UPDATE 0km SET anio_0km=?, chasis_0km=?, combustible_0km=?, foto1_0km=?, foto2_0km=?, foto3_0km=?, foto4_0km=?, foto5_0km=?, foto6_0km=?, foto7_0km=?, foto8_0km=?, foto9_0km=?, foto10_0km=?, foto11_0km=?, foto12_0km=?, foto13_0km=?, foto14_0km=?, foto15_0km=?, foto16_0km=?, foto17_0km=?, foto18_0km=?, foto19_0km=?,  foto20_0km=?, marca_0km=?, mod_0km=?, motor_0km=?, obs_0km=?, Valor_Compra_0k=?  WHERE id_0km=?";

	$st=$conexionNew->prepare($cons0km);
	$ejecutar_cons0km=$st->execute([mb_convert_encoding((string)$anio, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$chasis, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$combustible, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto1, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto2, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto3, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto4, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto5, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto6, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto7, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto8, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto9, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto10, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto11, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto12, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto13, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto14, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto15, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto16, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto17, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto18, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto19, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto20, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$modelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$motor, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$observaciones, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$valorCompra, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$id_0km, 'UTF-8', 'ISO-8859-1')]);
 
	if ($ejecutar_cons0km) 
	{ 	
		$mensaje="Cambio exitoso"; 	
	}else{
		$mensaje= "Cambio - No ha grabado en la base de datos";
	}

$conexionNew->close();	
header ("Location: 0kmCambio.php");
?>