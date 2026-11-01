<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_POST["id_0km2"]<>NULL)
{
	$id_0km=$_POST['id_0km2'];
	$_session['id_marca']=$_POST['id_marca2'];	
			
	  		$cons0km = "SELECT * FROM 0km WHERE id_0km=?";
			$st_ejecutar_cons0km = $conexionNew->prepare($cons0km); $st_ejecutar_cons0km->execute([(string)$id_0km]); $ejecutar_cons0km = $st_ejecutar_cons0km->get_result();
			$fila0km=$ejecutar_cons0km->fetch_assoc();
			$marca1=$fila0km['marca_0km'];
			$modelo1=$fila0km['mod_0km'];
			$local1=$fila0km['ubicacion_0km'];
			$titular1=$fila0km['titular_0km'];
	  		$consMarca = "SELECT * FROM marcas WHERE id_marca=?";
			$st_ejecutar_consMarca = $conexionNew->prepare($consMarca); $st_ejecutar_consMarca->execute([(string)$marca1]); $ejecutar_consMarca = $st_ejecutar_consMarca->get_result();
			$filaMarca=$ejecutar_consMarca->fetch_assoc();
	  		$consMod = "SELECT * FROM modelos WHERE id_modelo=?";
			$st_ejecutar_consMod = $conexionNew->prepare($consMod); $st_ejecutar_consMod->execute([(string)$modelo1]); $ejecutar_consMod = $st_ejecutar_consMod->get_result();
			$filaMod=$ejecutar_consMod->fetch_assoc();  
	  		$consLoc = "SELECT * FROM locales WHERE id_local=?";
			$st_ejecutar_consLoc = $conexionNew->prepare($consLoc); $st_ejecutar_consLoc->execute([(string)$local1]); $ejecutar_consLoc = $st_ejecutar_consLoc->get_result();
			$filaLoc=$ejecutar_consLoc->fetch_assoc(); 
			$consCli = "SELECT * FROM clientes WHERE id_cliente=?";
			$st_ejecutar_consCli = $conexionNew->prepare($consCli); $st_ejecutar_consCli->execute([(string)$titular1]); $ejecutar_consCli = $st_ejecutar_consCli->get_result();
			$filaCli=$ejecutar_consCli->fetch_assoc();  
 

}
else
	{
		$mensajes = "No hay 0km para modificar";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Keywords"
        content="taxi, taxis, coches, autos, venta, compra, Barzola, taxis barzola, barzola, licencias, consignacion" />
    <title>TAXIS BARZOLA desde 1970 junto al gremio</title>

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css" />	-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" />

    <script src="js/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script type="text/javascript" language="javascript" src="js/slc-ajax.js"></script>
</head>

<body>
    <nav class=" fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="administracion.php" style="color: gold; font-size: 30px; font-weight: bold;">
                <!--                <img class="img-fluid" src="img/cuadrado-banner-new7.png" />-->
                TAXIS BARZOLA
            </a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class=" navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="pantallaAdmin.php">Organizaci&oacute;n</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="0kmAdmin.php">0KM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="usadosAdmin.php">Usados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="marcasAdmin.php">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="modelosAdmin.php">Modelos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="usuariosAdmin.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="seguridadAdmin.php">Seguridad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="usuarios/salir.php">Salir</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mt-5" align="center" ;>
                <br />
                <h4 style="font-weight: bold;" class="display-5">CAMBIO 0KM</h4>
                <div class="col-md-12 mt-4 bg-faded" ;>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmAlta.php">Alta 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmBaja.php">Baja de 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCambio.php">Cambio de 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm"> </a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmADet.php">Alta Detalle de 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCDet.php">Cambio Detalle del 0KM</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row">
            <div class="col-md-12 mt-2" align="center" ;>
                <form name="form1" action="0kmActualizo.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="Marca">Marca:</label></span>
                            <span class="form-0km"><select name="marca_slc" id="marca" required="required">
                                    <option value=""><?php echo $filaMarca['marca'] ?></option>
                                    <?php include("select-marca.php")?>
                                </select></span>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="Modelo">Modelo:</label></span>
                            <span class="form-0km"><select name="modelo_slc" id="modelo" required="required">
                                    <option value=""><?php echo $filaMod['nombre_modelo'] ?></option>
                                    <?php include("select-modelo.php")?>
                                </select></span>
                        </div>
                        <?php echo htmlspecialchars($_POST['marca_slc'], ENT_QUOTES, 'UTF-8'); ?>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="anio">A&ntilde;o:</label></span>
                            <span class="form-0km"><input type="text" id="anio" class="cambio" name="anio_txt"
                                    placeholder="Escribe el a&ntilde;o" title="A&ntilde;o"
                                    value="<?php echo $fila0km['anio_0km']; ?>" required /></span>
                            <input type="hidden" name="id_0km2" value="<?php echo $fila0km['id_0km']; ?>" />
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="nromotor">Motor:</label></span>
                            <span class="form-0km"><input type="text" id="motor" class="cambio" name="motor_txt"
                                    placeholder="Escribe el nro motor" title="nro. motor"
                                    value="<?php echo $fila0km['motor_0km']; ?>" required /></span>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="anio">Chasis:</label></span>
                            <span class="form-0km"><input type="text" id="chasis" class="cambio" name="chasis_txt"
                                    placeholder="Escribe el nro chasis" title="nro. chasis"
                                    value="<?php echo $fila0km['chasis_0km']; ?>" required /></span>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="Combustible">Combustible: </label></span>
                            <span class="form-0km"><input type="text" id="Combustible" class="cambio"
                                    name="Combustible_txt" placeholder="Escribe el Combustible" title="Combustible"
                                    value="<?php echo $fila0km['combustible_0km']; ?>" required /></span>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="Valor_Compra_0k">Valor de Compra: </label></span>
                            <span class="form-0km"><input type="text" id="Valor_Compra_0k" class="cambio"
                                    name="Valor_Compra_0k_txt" placeholder="Escribe el Valor de Compra"
                                    title="Valor de Compra" value="<?php echo $fila0km['Valor_Compra_0k']; ?>" /></span>
                        </div>
                        <!-- <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="vendedor_concesionario_0km">Vendedor:
                                </label></span>
                            <span class="form-0km"><input type="text" id="vendedor_concesionario_0km" class="cambio"
                                    name="vendedor_concesionario_0km"
                                    placeholder="Escribe el vendedor del concesionario" title="Vendedor Concesionario"
                                    value="<?php echo $fila0km['vendedor_concecionario_0km']; ?>" /></span>
                        </div> -->
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto1_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto1_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto1">Imagen 1:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" name="foto1" id="imagen" />
                                    <input type="hidden" name="imagen1_hdn"
                                        value="<?php echo $fila0km['foto1_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar1" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto2_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto2_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto2">Imagen 2:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto2" title="Tu Foto" />
                                    <input type="hidden" name="imagen2_hdn"
                                        value="<?php echo $fila0km['foto2_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar2" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto3_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto3_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto3">Imagen 3:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto3" title="Tu Foto" />
                                    <input type="hidden" name="imagen3_hdn"
                                        value="<?php echo $fila0km['foto3_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar3" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto4_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto4_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto4">Imagen 4:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto4" title="Tu Foto" />
                                    <input type="hidden" name="imagen4_hdn"
                                        value="<?php echo $fila0km['foto4_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar4" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto5_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto5_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto5">Imagen 5:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto5" title="Tu Foto" />
                                    <input type="hidden" name="imagen5_hdn"
                                        value="<?php echo $fila0km['foto5_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar5" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto6_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto6_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto6">Imagen 6:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto6" title="Tu Foto" />
                                    <input type="hidden" name="imagen6_hdn"
                                        value="<?php echo $fila0km['foto6_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar6" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto7_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto7_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto7">Imagen 7:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto7" title="Tu Foto" />
                                    <input type="hidden" name="imagen7_hdn"
                                        value="<?php echo $fila0km['foto7_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar7" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto8_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto8_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto8">Imagen 8:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto8" title="Tu Foto" />
                                    <input type="hidden" name="imagen8_hdn"
                                        value="<?php echo $fila0km['foto8_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar8" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto9_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto9_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto9">Imagen 9:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto9" title="Tu Foto" />
                                    <input type="hidden" name="imagen9_hdn"
                                        value="<?php echo $fila0km['foto9_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar9" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto10_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto10_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto10">Imagen 10:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto10" title="Tu Foto" />
                                    <input type="hidden" name="imagen10_hdn"
                                        value="<?php echo $fila0km['foto10_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar10" type="checkbox" value="SI"></span>
                        </div>

                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto11_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto11_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto11">Imagen 11:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto11" title="Tu Foto" />
                                    <input type="hidden" name="imagen11_hdn"
                                        value="<?php echo $fila0km['foto11_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar11" type="checkbox" value="SI"></span>
                        </div>

                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto12_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto12_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto12">Imagen 12:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto12" title="Tu Foto" />
                                    <input type="hidden" name="imagen12_hdn"
                                        value="<?php echo $fila0km['foto12_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar12" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto13_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto13_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto13">Imagen 13:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto13" title="Tu Foto" />
                                    <input type="hidden" name="imagen13_hdn"
                                        value="<?php echo $fila0km['foto13_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar13" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto14_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto14_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto14">Imagen 14:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto14" title="Tu Foto" />
                                    <input type="hidden" name="imagen14_hdn"
                                        value="<?php echo $fila0km['foto14_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar14" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto15_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto15_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto15">Imagen 15:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto15" title="Tu Foto" />
                                    <input type="hidden" name="imagen15_hdn"
                                        value="<?php echo $fila0km['foto15_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar15" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto16_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto16_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto16">Imagen 16:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto16" title="Tu Foto" />
                                    <input type="hidden" name="imagen16_hdn"
                                        value="<?php echo $fila0km['foto16_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar16" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto17_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto17_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto17">Imagen 17:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto17" title="Tu Foto" />
                                    <input type="hidden" name="imagen17_hdn"
                                        value="<?php echo $fila0km['foto17_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar17" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto18_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto18_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto18">Imagen 18:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto18" title="Tu Foto" />
                                    <input type="hidden" name="imagen18_hdn"
                                        value="<?php echo $fila0km['foto18_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar18" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto19_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto19_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto19">Imagen 19:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto19" title="Tu Foto" />
                                    <input type="hidden" name="imagen19_hdn"
                                        value="<?php echo $fila0km['foto19_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar19" type="checkbox" value="SI"></span>
                        </div>
                        <div class="mt-2" align="left">
                            <?php  if ($fila0km['foto20_0km']=='NULL') { ?>
                            <img src="images/sinfoto.jpg" width="118" height="88">
                            <?php }else{ ?>
                            <img src=<?php echo"images/0km/".$fila0km['foto20_0km']; ?> width="118" height="88">
                            <?php } ?>
                        </div>
                        <div class="fila0km" align="left">
                            <span class="etiq0km"><label for="foto20">Imagen 20:</label></span>
                            <span class="form-0km">
                                <div class="adjuntar-archivo cambio">
                                    <input type="file" id="imagen" name="foto20" title="Tu Foto" />
                                    <input type="hidden" name="imagen20_hdn"
                                        value="<?php echo $fila0km['foto20_0km']; ?>" />
                                </div>
                            </span>
                            <span><input name="Borrar20" type="checkbox" value="SI"></span>
                        </div>
                        <div class="fila-obs" align="left">
                            <span class="etiqobs"><label for="observaciones">Observaciones</label></span>
                            <span class="form-obs"><textarea id="observaciones" class="cambio textarea"
                                    name="observaciones_txa" cols="61"
                                    rows="6"><?php echo $fila0km['obs_0km']; ?></textarea>
                            </span>
                        </div>
                        <div class="fila0km my-5" align="center" ;>
                            <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                    type="submit" id="enviar-cambio" class="cambio" name="enviar_btn" value="Cambiar" />
                            </span>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="separador"></div>
    <div class="clear"></div>
    <?php include "pie.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--
    <script src="js/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
-->
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
</body>

</html>