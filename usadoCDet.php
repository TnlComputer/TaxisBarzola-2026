<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();

// $color_row=array('#ffe4c4','#a9a9a9');deb887, eff303
$color_row=array('#f1f1f1','#deb887');
$ind_color=1;
$cont_linea=1;

$consulta=$conexionNew->query("SELECT * FROM usados");
$cant_reg=mysqli_num_rows($consulta);

if ($cant_reg==0) {	header("location:usadosAdmin.php"); }

$ind_color=1;
 
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
                <h4 style="font-weight: bold;" class="display-5">CAMBIO DETALLE USADO</h4>
                <div class="col-md-12 mt-4 bg-faded" ;>
                    <a class="bnt btn-outline-secondary btn-sm" href="usadoAlta.php">Alta Usado</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="usadoBaja.php">Baja Usado</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="usadoCambio.php">Cambio Usado</a>
                    <a class="bnt btn-outline-secondary btn-sm"> </a>
                    <a class="bnt btn-outline-secondary btn-sm" href="usadoADet.php">Alta Detalle Usado</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="usadoCDet.php">Cambio Detalle Usado</a>
                </div>
            </div>
        </div>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 mt-2 scroll-Pant" align="center">

                    <table class="cambio" width="60%" border="0">
                        <tr>
                            <td id="color-tit-tabla"></td>
                            <td id="color-tit-tabla">ID</td>
                            <td id="color-tit-tabla">A&ntilde;o</td>
                            <td id="color-tit-tabla">Marca</td>
                            <td id="color-tit-tabla">Modelo</td>
                            <!-- <td id="color-tit-tabla">Lugar</td> -->
                        </tr>
                        <?php
                            $ind_color=1;
		                    for($i=0;$i<$cant_reg;$i++){
		                    $filas=mysqli_fetch_array($consulta); 
		                    $ind_color++;
		                    $ind_color %=2;
								$id_usado=$filas['id_usado'];		
								$marca	 =$filas['marca_usado'];
								$modelo	 =$filas['mod_usado'];
								$anio	 =$filas['anio_usado'];
								// $local=$filas['ubicacion_usado'];

								$st_consMar=$conexionNew->prepare("select * from marcas where id_marca=?"); $st_consMar->execute([(string)$marca]); $consMar=$st_consMar->get_result();
								$filaMar=mysqli_fetch_array($consMar) ;
											
								$st_consMod=$conexionNew->prepare("select * from modelos where id_modelo=?"); $st_consMod->execute([(string)$modelo]); $consMod=$st_consMod->get_result();
								$filaMod=mysqli_fetch_array($consMod) ;

								// $consLoc=mysql_query("select * from locales where id_local='".$local."'");
								// $filaLoc=mysql_fetch_array($consLoc) ;
						?>

                        <?php echo "<tr bgcolor={$color_row[$ind_color]}>";?>
                        <td>
                            <?php
                                $st_consulAD=$conexionNew->prepare("SELECT * FROM detallesUsado WHERE id_marca=? AND id_modelo=? AND anio=?"); $st_consulAD->execute([(string)$marca, (string)$modelo, (string)$anio]); $consulAD=$st_consulAD->get_result();
                                $cantRegDet=mysqli_num_rows($consulAD);

                             if ($cantRegDet==1) {
                            ?>

                            <form action="usadoCamDet.php" method="POST" enctype="multipart/form-data">
                                <input name="id_usado2" id="id_usado2" type="hidden" value="<?php echo $id_usado ?>" />
                                <input type="image" src="img/reply.gif" alt="Agrego Detalle" align="absmiddle" />
                            </form>
                            <?php } ?>
                        </td>
                        <td><?php echo $filas['id_usado']?></td>
                        <td><?php echo $filas['anio_usado']?></td>
                        <td><?php echo $filaMar['marca'] ?></td>
                        <td><?php echo $filaMod['nombre_modelo'] ?></td>
                        <!-- <td><?php echo $filaLoc['local'] ?></td> -->
                        </tr>

                        <?php } ?>
                    </table>
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