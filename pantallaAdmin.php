<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$consM0km = $conexionNew->query("SELECT * FROM Muestro0km WHERE idM0km=1");
$filasM0km=mysqli_fetch_array($consM0km); 
$posicion1      =$filasM0km['posicion1'];

$posicion1Bind=(string)$posicion1;
$st0kP1 = $conexionNew->prepare("SELECT * FROM 0km WHERE id_0km=?");
$st0kP1->bind_param('s', $posicion1Bind);
$st0kP1->execute();
$cons0kP1 = $st0kP1->get_result();
$filasP1=mysqli_fetch_array($cons0kP1); 
$foto1P1      =$filasP1['foto1_0km'];


$consMusa = $conexionNew->query("SELECT * FROM MuestroUsados WHERE idMUsado=1");
$filasMUsa=mysqli_fetch_array($consMusa); 
$posicion2      =$filasMUsa['posicion1'];

$posicion2Bind=(string)$posicion2;
$stUsP1 = $conexionNew->prepare("SELECT * FROM usados WHERE id_usado=?");
$stUsP1->bind_param('s', $posicion2Bind);
$stUsP1->execute();
$consUsP1 = $stUsP1->get_result();
$filaP1=mysqli_fetch_array($consUsP1); 
$foto1P2      =$filaP1['foto1_usado'];

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
    <div id="wspButton"></div>

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
                <h4 style="font-weight: bold;" class="display-5">Organizaci&oacute;n Pantalla Principal</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row col-md-12">
            <div id="sec-0km" class="col-md-6" align="left">
                <img src="images/0km/big<?php echo $foto1P1; ?>" class="d-block img-fluid"
                    style="width:100%; height:auto; background: #f1f1f1;">
                <h1 style="font-weight: bold;" class="display-4">0KM</h1>
                <p> </p>
                <a class="btn btn-outline-secondary header-btn btn-lg mt-2" href="pcp0km.php">Cambiar 0KM</a>
            </div>
            <div id="sec-usa" class="col-md-6" align="right">
                <img src="images/usados/big<?php echo $foto1P2; ?>" class="d-block img-fluid"
                    style="width:100%; height:auto; background: #444444;">
                <h1 style="color: #ffffff; font-weight: bold;" class="display-4"> Usados</h1>
                <p> </p>
                <a class="btn btn-outline-secondary header-btn btn-lg mt-2" href="pcpUsado.php"
                    style="color: #fff">Cambiar Usados</a>
            </div>
        </div>
    </div>
    <!-- <div class="row"></div> -->
    <div class="col-md-12 mt-5"></div>

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