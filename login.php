<?php include "sitio.php"; ?>
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
    <link rel="stylesheet" href="css/floating-wpp.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" />

    <script src="js/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="js/floating-wpp.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/formulario.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> -->
    <!-- <script src="js/scrollreveal.min.js"></script> -->
    <!-- <script>
    smoothScroll.init({
        selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
        selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
        speed: 2000, // Integer. How fast to complete the scroll in milliseconds
        easing: 'easeInOutCubic', // Easing pattern to use
        offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
        callback: function(anchor, toggle) {}, // Function to run after scrolling
    });
    </script> -->

</head>

<body>
    <div id="wspButton"></div>

    <nav class=" fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= $URL_SITIO ?>" style="color: gold; font-size: 30px; font-weight: bold;">
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
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>#permuta">Permuta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>nuevos.php">0KM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>usados.php">Usados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>#licencias">Licencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>#contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="<?= $URL_SITIO ?>#fotos">Fotos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="clear"></div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <form class="card-body" id="form1" name="form1" method="post" action="usuarios/validando.php">
                        <div id="loginVerifi">
                            <?php
		                        error_reporting(E_ALL ^ E_NOTICE);
                                if (($_GET['error'] ?? '') == "si"){
            	                echo "<span>VERIFICA TUS DATOS</span>";
                                }else{
            	                    echo "Introduce tus Datos";
                                }
			                ?>
                        </div>
                        <br />
                        <div align="center">
                            <label for="clave_txt">Usuario </label> <input name="usuario_txt" type="txt" id="usuario"
                                required size="30" />
                            <label for="clave_txt">Contrase&ntilde;a </label> <input name="pass_txt" type="password"
                                id="password" required size="30" />
                            <input class="btn btn-outline-dark boton" type="submit" name="button" id="button"
                                value="Identificarse" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br /><br />
                <p id="advertencia">Usted esta entrando a un area restringida, toda actividad esta siendo monitoreada.
                </p>
                <p id="advertencia">Le recomendamos que si usted no pertenece a la empresa, no intente ingresar.</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="separador"></div>
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
    window.sr = ScrollReveal();
    sr.reveal('.navbar', {
        duration: 2000,
        origin: 'bottom',
        reset: true
    });
    sr.reveal('#inicio', {
        duration: 2000,
        origin: 'rigth',
        distance: '300px',
        viewFactor: 0.2,
        reset: true
    });
    sr.reveal('#sec-cv', {
        duration: 2000,
        origin: 'left',
        distance: '300px',
        viewFactor: 0.2,
        reset: true
    });

    sr.reveal('#sec-0km .header-content-left', {
        duration: 2000,
        origin: 'top',
        distance: '300px',
        reset: true
    });
    sr.reveal('#sec-0km .header-content-right', {
        duration: 2000,
        origin: 'right',
        distance: '300px',
        reset: true
    });
    sr.reveal('#sec-usa .header-content-left', {
        duration: 2000,
        origin: 'botton',
        distance: '300px',
        reset: true
    });
    sr.reveal('#sec-usa .header-content-right', {
        duration: 2000,
        origin: 'top',
        distance: '300px',
        reset: true
    });
    sr.reveal('.header-btn', {
        duration: 2000,
        delay: 1000,
        origin: 'bottom',
        reset: true
    });
    sr.reveal('#sec-lic div', {
        duration: 2000,
        origin: 'left',
        distance: '300px',
        viewFactor: 0.2,
        reset: true
    });
    sr.reveal('#sec-con div', {
        duration: 2000,
        origin: 'right',
        distance: '300px',
        viewFactor: 0.2,
        reset: true
    });
    sr.reveal('#sec-fot', {
        duration: 2000,
        delay: 1000,
        origin: 'bottom',
        reset: true
    });

    /*		
    		ScrollReveal().reveal('.squares');
    		ScrollReveal().reveal('.triangles');
    		ScrollReveal().reveal('.circles');
    */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $('#wspButton').floatingWhatsApp({
            phone: '5491125314698',
            popupMessage: 'Hola, en que podemos ayudarte?',
            message: '',
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Bienvenido a Taxis Bazola!',
            headerColor: '#59d600',
            backgroundColor: '#59d600',
            buttonImage: '<img src="img/whatsapp.svg" />',
            position: 'right', //Position: left | right,
        });
    });
    </script>
</body>

</html>