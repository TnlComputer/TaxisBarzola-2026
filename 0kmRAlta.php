<?php 
include "usuarios/autorizo.php"; 
require_once 'usuarios/subir_imagen.php';

/* imagen 1*/
if(!empty($_FILES['foto1']) && $_FILES['foto1']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto1'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto1']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto1']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto1']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen1=$img;
$img=NULL;
}

/* imagen 2*/
if(!empty($_FILES['foto2']) && $_FILES['foto2']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto2'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto2']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto2']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto2']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen2=$img;
$img=NULL;
}

/* imagen 3*/
if(!empty($_FILES['foto3']) && $_FILES['foto3']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto3'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto3']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto3']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto3']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen3=$img;
$img=NULL;
}

/* imagen 4*/
if(!empty($_FILES['foto4']) && $_FILES['foto4']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto4'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto4']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto4']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto4']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen4=$img;
$img=NULL;
}

/* imagen 5*/
if(!empty($_FILES['foto5']) && $_FILES['foto5']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto5'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto5']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto5']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto5']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen5=$img;
$img=NULL;
}

/* imagen 6*/
if(!empty($_FILES['foto6']) && $_FILES['foto6']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto6'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto6']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto6']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto6']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen6=$img;
$img=NULL;
}

/* imagen 7*/
if(!empty($_FILES['foto7']) && $_FILES['foto7']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto7'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto7']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto7']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto7']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen7=$img;
$img=NULL;
}

/* imagen 8*/
if(!empty($_FILES['foto8']) && $_FILES['foto8']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto8'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto8']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto8']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto8']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen8=$img;
$img=NULL;
}

/* imagen 9*/
if(!empty($_FILES['foto9']) && $_FILES['foto9']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto9'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto9']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto9']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto9']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen9=$img;
$img=NULL;
}
/* imagen 10*/
if(!empty($_FILES['foto10']) && $_FILES['foto10']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto10'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto10']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto10']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto10']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen10=$img;
$img=NULL;
}
/* imagen 11*/
if(!empty($_FILES['foto11']) && $_FILES['foto11']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto11'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto11']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto11']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto11']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen11=$img;
$img=NULL;
}
/* imagen 12*/
if(!empty($_FILES['foto12']) && $_FILES['foto12']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto12'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto12']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto12']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto12']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen12=$img;
$img=NULL;
}
/* imagen 13*/
if(!empty($_FILES['foto13']) && $_FILES['foto13']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto13'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto13']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto13']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto13']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen13=$img;
$img=NULL;
}
/* imagen 14*/
if(!empty($_FILES['foto14']) && $_FILES['foto14']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto14'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto14']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto14']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto14']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen14=$img;
$img=NULL;
}
/* imagen 15*/
if(!empty($_FILES['foto15']) && $_FILES['foto15']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto15'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto15']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto15']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto15']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen15=$img;
$img=NULL;
}
/* imagen 16*/
if(!empty($_FILES['foto16']) && $_FILES['foto16']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto16'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto16']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto16']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto16']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen16=$img;
$img=NULL;
}
/* imagen 17*/
if(!empty($_FILES['foto17']) && $_FILES['foto17']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto17'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto17']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto17']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto17']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen17=$img;
$img=NULL;
}
/* imagen 18*/
if(!empty($_FILES['foto18']) && $_FILES['foto18']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto18'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto18']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto18']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto18']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen18=$img;
$img=NULL;
}
/* imagen 19*/
if(!empty($_FILES['foto19']) && $_FILES['foto19']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto19'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto19']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto19']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto19']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen19=$img;
$img=NULL;
}
/* imagen 20*/
if(!empty($_FILES['foto20']) && $_FILES['foto20']['error'] == UPLOAD_ERR_OK && es_imagen_subida($_FILES['foto20'])) {
	require_once 'ModifiedImage.php';
 
$image = new ModifiedImage($_FILES['foto20']['tmp_name']);
$nom = nombre_archivo_seguro($_FILES['foto20']['name']);
$img = 'big0km' . $nom;
$image->resizeToFit(500, 375, true, 'ffffff');
$image->save("images/0km/".$img);

$image = new ModifiedImage($_FILES['foto20']['tmp_name']);
$img = '0km' . $nom;
$image->resizeToFit(150, 113, true, 'ffffff');
$image->save("images/0km/".$img);

$NombreImagen20=$img;
$img=NULL;
}


       	$foto1			=$NombreImagen1;
        $foto2			=$NombreImagen2;
		$foto3			=$NombreImagen3;
   	    $foto4			=$NombreImagen4;
        $foto5			=$NombreImagen5;
		$foto6			=$NombreImagen6;
		$foto7			=$NombreImagen7;
		$foto8			=$NombreImagen8;
		$foto9			=$NombreImagen9;
		$foto10			=$NombreImagen10;
		$foto11			=$NombreImagen11;
		$foto12			=$NombreImagen12;
		$foto13			=$NombreImagen13;
		$foto14			=$NombreImagen14;
		$foto15			=$NombreImagen15;
		$foto16			=$NombreImagen16;
		$foto17			=$NombreImagen17;
		$foto18			=$NombreImagen18;
		$foto19			=$NombreImagen19;
		$foto20			=$NombreImagen20;

		$marca			=$_POST["marca"];
        $modelo			=$_POST["model"];
		$anio			=$_POST["anio_txt"];
		$motor			=$_POST["motor_txt"];
		$chasis			=$_POST["chasis_txt"];
		$combustible	=$_POST["Combustible_txt"];
		$valorCompra	=$_POST["Valor_Compra_0k_txt"];
		$observaciones	=$_POST["observaciones_txa"];
		
include "Connections/conexionNew.php";

$grabo="INSERT INTO 0km (anio_0km, chasis_0km, combustible_0km, foto1_0km, foto2_0km, foto3_0km, foto4_0km, foto5_0km, foto6_0km, foto7_0km, foto8_0km, foto9_0km, foto10_0km, foto11_0km, foto12_0km, foto13_0km, foto14_0km, foto15_0km, foto16_0km, foto17_0km, foto18_0km, foto19_0km, foto20_0km, marca_0km, mod_0km, motor_0km, obs_0km, Valor_Compra_0k, mostar) 

VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '')";
 
$st=$conexionNew->prepare($grabo);
$ejecutar_consulta=$st->execute([mb_convert_encoding((string)$anio, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$chasis, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$combustible, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto1, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto2, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto3, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto4, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto5, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto6, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto7, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto8, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto9, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto10, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto11, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto12, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto13, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto14, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto15, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto16, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto17, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto18, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto19, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$foto20, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$marca, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$modelo, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$motor, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$observaciones, 'UTF-8', 'ISO-8859-1'), mb_convert_encoding((string)$valorCompra, 'UTF-8', 'ISO-8859-1')]);
 
if ($ejecutar_consulta)  {		
	$mensaje= "Alta Exitosa";
}else{
	$mensaje= "Alta - No ha grabado en la base de datos";
}
$conexionNew->close();	
header ("Location: 0kmAdmin.php");
?>