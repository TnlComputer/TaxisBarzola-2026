<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$consNivel = $conexionNew->query("SELECT * FROM nivel WHERE id_nivel>1");
$cant_regNivel=mysqli_num_rows($consNivel);

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
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 mt-5" align="center" ;>
                    <br />
                    <h4 style="font-weight: bold;" class="display-5">Baja Nivel Seguridad</h4>
                    <div class="col-md-12 mt-4" ;>
                        <a class="bnt btn-outline-secondary btn-sm" href="nivelAlta.php">Alta Seguridad</a>
                        <a class="bnt btn-outline-secondary btn-sm" href="nivelBaja.php">Baja Seguridad</a>
                        <a class="bnt btn-outline-secondary btn-sm" href="nivelCambio.php">Cambio Seguridad</a>
                    </div>
                </div>
            </div>
            <div class="container my-2">
                <div class="row">
                    <div class="container my-2">
                        <div class="row">
                            <div class="col-md-12 mt-2 scroll-Pant" align="center">
                                <table width="60%" border="0">
                                    <tr>
                                        <td id="color-tit-tabla"></td>
                                        <!-- <td id="color-tit-tabla">ID</td> -->
                                        <td id="color-tit-tabla">Seguridad</td>

                                    </tr>
                                    <?php
										for($i=0;$i<$cant_regNivel;$i++){
											$filas=mysqli_fetch_array($consNivel); 
											$ind_color++;
											$ind_color %=2;
											$id_nivel=$filas['id_nivel'];
									?>

                                    <tr>
                                        <td align="center" style="font-size: 9px">
                                            <form action="bajaNivel.php" method="POST"
                                                enctype="application/x-www-form-urlencoded">
                                                <input name="id_nivel2" type="hidden"
                                                    value="<?php echo $filas['id_nivel'] ?>" />
                                                <input name="" type="image" src="img/action_delete.png"
                                                    alt="Borrar usado" align="absmiddle" />
                                            </form>
                                        </td>
                                        <!-- <td><?php echo $filas['id_nivel']?></td> -->
                                        <td><?php echo $filas['nombre_nivel']?></td>

                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
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