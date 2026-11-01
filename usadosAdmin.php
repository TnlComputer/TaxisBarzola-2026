<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$consUsad = $conexionNew->query("SELECT * FROM usados order by marca_usado, anio_usado");
$cant_regUsad=mysqli_num_rows($consUsad);

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
                <h4 style="font-weight: bold;" class="display-5">Administraci&oacute;n Usados</h4>
                <div class="col-md-12 mt-4 bg-faded" align="center">
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
                    <table class="tabla" border="0">
                        <tr>
                            <td colspan="2" bgcolor=" #444" style="color: aliceblue" align="center"></td>
                            <td bgcolor=" #444" style="color: aliceblue" align="left">Marca</td>
                            <td bgcolor=" #444" style="color: aliceblue" align="left">Modelo</td>
                            <td bgcolor=" #444" style="color: aliceblue" align="center">A&ntilde;o</td>
                            <td bgcolor=" #444" style="color: aliceblue" align="center">Combustible</td>
                        </tr>

                        <?php
                	for($ii=0;$ii<$cant_regUsad;$ii++){ 
                    $filaUsad=mysqli_fetch_array($consUsad);                                      
                    $foto1      =$filaUsad['foto1_usado'];
			        $idMarca	=$filaUsad['marca_usado'];
        			$idModelo	=$filaUsad['mod_usado'];	
		        	$combustible=$filaUsad['combustible_usado'];
        			$anio       =$filaUsad['anio_usado'];
                    
			        $st_conMar = $conexionNew->prepare("SELECT * FROM marcas WHERE id_marca=?"); $st_conMar->execute([(string)$idMarca]); $conMar = $st_conMar->get_result();
                    $filasMar=mysqli_fetch_array($conMar);
                    $cant_regMar=mysqli_num_rows($conMar);
                    $nombreMarca=$filasMar['marca'];

                    $st_conMod = $conexionNew->prepare("SELECT * FROM modelos WHERE id_marca=? and id_modelo=?"); $st_conMod->execute([(string)$idMarca, (string)$idModelo]); $conMod = $st_conMod->get_result();
                    $filasMod=mysqli_fetch_array($conMod);
                    $cant_regMod=mysqli_num_rows($conMod);
                    $nombreModelo=$filasMod['nombre_modelo'];

                    ?>
                        <tr>
                            <td colspan="2"></td>
                            <td align="left"><?php echo $nombreMarca  ?></td>
                            <td align="left"><?php echo $nombreModelo ?></td>
                            <td align="center"><?php echo $anio       ?></td>
                            <td align="center"><?php echo $combustible?></td>
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