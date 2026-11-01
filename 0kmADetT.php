<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_POST['id_0km2']){
			$id_0km=$_POST['id_0km2'] ;
	  		$cons0km = "SELECT * FROM 0km WHERE id_0km=?";
			$st_ejecutar_cons0km = $conexionNew->prepare($cons0km); $st_ejecutar_cons0km->execute([(string)$id_0km]); $ejecutar_cons0km = $st_ejecutar_cons0km->get_result();
			$fila0km	=$ejecutar_cons0km->fetch_assoc();
			$id_marca	=$fila0km['marca_0km'];
			$id_modelo	=$fila0km['mod_0km'];	
			$combustible=$fila0km['combustible_0km'];
			$anio		=$fila0km['anio_0km'];
			$foto1		=$fila0km['foto1_0km'];
			$foto2		=$fila0km['foto2_0km'];
			$foto3		=$fila0km['foto3_0km'];
			$foto4		=$fila0km['foto4_0km'];
			$foto5		=$fila0km['foto5_0km'];
			$foto6		=$fila0km['foto6_0km'];
			$foto7		=$fila0km['foto7_0km'];
			$foto8		=$fila0km['foto8_0km'];
			$foto9		=$fila0km['foto9_0km'];
			$foto10		=$fila0km['foto10_0km'];
			$foto11		=$fila0km['foto11_0km'];
			$foto12		=$fila0km['foto12_0km'];
			$foto13		=$fila0km['foto13_0km'];
			$foto14		=$fila0km['foto14_0km'];
			$foto15		=$fila0km['foto15_0km'];
			$foto16		=$fila0km['foto16_0km'];
			$foto17		=$fila0km['foto17_0km'];
			$foto18		=$fila0km['foto18_0km'];
			$foto19		=$fila0km['foto19_0km'];
			$foto20		=$fila0km['foto20_0km'];
			
	  		$consMarca = "SELECT * FROM marcas WHERE id_marca=?";
			$st_ejecutar_consMarca = $conexionNew->prepare($consMarca); $st_ejecutar_consMarca->execute([(string)$id_marca]); $ejecutar_consMarca = $st_ejecutar_consMarca->get_result();
			$filaMarca=$ejecutar_consMarca->fetch_assoc();
			$nombre_marca=$filaMarca['marca'];  

	  		$consMod = "SELECT * FROM modelos WHERE id_modelo=?";
			$st_ejecutar_consMod = $conexionNew->prepare($consMod); $st_ejecutar_consMod->execute([(string)$id_modelo]); $ejecutar_consMod = $st_ejecutar_consMod->get_result();
			$filaMod=$ejecutar_consMod->fetch_assoc();  
			$nombre_modelo=$filaMod['nombre_modelo'];
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
                <h4 style="font-weight: bold;" class="display-5">ALTA DETALLES 0KM</h4>
                <div class="col-md-12 mt-4 bg-faded" ;>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmAlta.php">Alta 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmBaja.php">Baja 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCambio.php">Cambio 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm"> </a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmADet.php">Alta Detalle 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCDet.php">Cambio Detalle 0KM</a>
                </div>
            </div>
            <div class="col-md-12 mt-4" align="center">
                <div class="row" align="center">
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto1 ?>" width="60" height="45">
                    </div>
                    <?php if ($foto2<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto2 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto3<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto3 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto4<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto4 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto5<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto5 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto6<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto6 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto7<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto7 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto8<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto8 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto9<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto9 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto10<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto10 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto11<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto11 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto12<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto12 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto13<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto13 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto14<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto14 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto15<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto15 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto16<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto16 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto17<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto17 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto18<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto18 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto19<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto19 ?>" width="60" height="45">
                    </div>
                    <?php } ?>
                    <?php if ($foto20<>'NULL'){ ?>
                    <div class="col-md-1">
                        <img src="<?php echo 'images/0km/'.$foto20 ?>" width="60" height="45">
                    </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12 0km1det">
                <form action="0kmReciboAltaDetalle.php" method="POST">
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="3" bgcolor="#f1f1f1">Especificaciones</td>
                        </tr>
                        <tr>
                            <td width="43%">Marca</td>
                            <td width="57%">
                                <input name="id_marca2" id="id_marca2" type="hidden" value="<?php echo $id_marca ?>" />
                                <?php echo $nombre_marca ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="43%">Modelo</td>
                            <td width="57%">
                                <input name="id_0km2" id="id_0km2" type="hidden" value="<?php echo $id_0km ?>" />
                                <input name="id_modelo2" id="id_modelo2" type="hidden"
                                    value="<?php echo $id_modelo ?>" />
                                <?php echo $nombre_modelo ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Año</td>
                            <td>
                                <input name="anio2" id="anio2" type="hidden" value="<?php echo $anio ?>" />
                                <?php echo $anio ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="43%">Combustible</td>
                            <td width="57%">
                                <input name="combustible2" id="combustible2" type="hidden"
                                    value="<?php echo $combustible ?>" />
                                <?php echo $combustible ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Cant. de puertas</td>
                            <td><select name="puertas" id="puertas" required="required">
                                    <option value="">- - -</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><select name="direccion" id="direccion" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Tercer stop </td>
                            <td><select name="stop3" id="stop3" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Frenos ABS</td>
                            <td><select name="frenos" id="frenos" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Alarma</td>
                            <td><select name="alarma" id="alarma" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Control de tracción</td>
                            <td><select name="conTrac" id="conTrac" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Control de estabilidad</td>
                            <td><select name="conEst" id="conEst" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Inmovilizador de motor</td>
                            <td><select name="inmo" id="inmo" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Aire acondicionado</td>
                            <td><select name="aAcon" id="aAcon" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Levanta Vidrios El&eacute;ctricos</td>
                            <td><select name="vidrios" id="vidrios" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Cierre centralizado de puertas</td>
                            <td><select name="cierreP" id="cierreP" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Espejos eléctricos</td>
                            <td><select name="espejo" id="espejo" required="required">
                                    <option value="">- - -</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select></td>
                        </tr>
                    </table>
                    <br />
                    <div class="col-md-12" align="center">
                        <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                type="submit" id="enviar-altaDetalle" class="cambio" name="enviar_btn"
                                value="Agregar" /></span>
                    </div>
                </form>
                <br />
                <div class="col-md-12" align="center">
                    <form action="0kmAdmin.php" method="GET" enctype="multipart/form-data" name="Volver" id="Volver">
                        <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                type="submit" name="op" id="button" value="Volver"></span>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12"></div>
        <div class="clear"></div>
    <?php include "pie.php"; ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--
    <script src="js/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
-->
        <script src="js/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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