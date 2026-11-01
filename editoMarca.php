<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$idMarca=$_POST['id_marca2'];

// echo $idMarca."<br>";

$st = $conexionNew->prepare("SELECT * FROM marcas WHERE id_marca=?");
$st->execute([(string)$idMarca]);
$conMar = $st->get_result();
$cant_regModelo=mysqli_num_rows($conMar);
$filasMar=mysqli_fetch_array($conMar);
$nombreMarca  =$filasMar['marca'];

//echo $cant_regModelo."<br>";


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
                <h4 style="font-weight: bold;" class="display-5">Cambio Marca</h4>
                <div class="col-md-12 mt-4" ;>
                    <a class="bnt btn-outline-secondary btn-sm" href="modeloAlta.php">Alta Modelo</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="modeloBaja.php">Baja Modelo</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="modeloCambio.php">Cambio Modelo</a>
                </div>
            </div>
        </div>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 mt-2 scroll-Pant" align="center">
                    <form action="marcaAct.php" id="cambio-marca" class="cambio" enctype="multipart/form-data"
                        method="post">
                        <fieldset>
                            <br />
                            <div>
                                <label for="marca">Marca :</label>
                                <input type="text" id="marca" class="cambio" name="marca_txt" placeholder="Marca"
                                    title="Marca" value="<?php echo $nombreMarca ?>" />
                            </div>
                            <div>
                                <span class="etiq0km">
                                    <input name="id_marca2" type="hidden" value="<?php echo htmlspecialchars((string)$idMarca, ENT_QUOTES, 'UTF-8') ?>" />
                                    <input class="btn btn-outline-secondary header-btn btn-lg mt-2" type="submit"
                                        id="enviar-cambio" class="cambio" name="enviar_btn" value="Cambiar" />
                                </span>
                            </div>
                        </fieldset>
                    </form>
                    <div class="fila0km my-2" align="center" ;>
                        <form action="marcaCambio.php" id="alta-modelo" class="cambio" enctype="multipart/form-data"
                            <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                type="submit" id="enviar-cambio" class="cambio" name="enviar_btn" value="Volver" />
                            </span>
                        </form>
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