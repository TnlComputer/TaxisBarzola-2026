<?php 
//include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

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
    <div class="container my-5" align="center">
        <div class="row" align="center">
            <div class="col-md-12 mt-5" align="center" ;>
                <br />
                <h4 style="font-weight: bold;" class="display-5">ALTA 0KM</h4>
                <div class="col-md-12 mt-4 bg-faded" align="center">
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmAlta.php">Alta 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmBaja.php">Baja 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCambio.php">Cambio 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm"> </a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmADet.php">Alta Detalle 0KM</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="0kmCDet.php">Cambio Detalle 0KM</a>
                </div>
            </div>
        </div>
        <div class="container my-2">
            <div class="row card " id="sec-0km">
                <div class="card-body col-md-12 mt-2" align="center" ;>
                    <form name="form1" action="0kmRAlta.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="fila0km" align="left">
                                <?php include("selectMarca.php")?>
                            </div>
                            <div class="fila0km" id="midiv" align="left">
                                <span class="etiq0km"><label for="Modelo">Modelo:</label></span>
                                <span class="form-0km">
                                    <select name="model" id="model" class="cambio">
                                        <option value="">Seleccione</option>
                                    </select></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="anio">A&ntilde;o:</label></span>
                                <span class="form-0km"><input type="text" id="anio" class="cambio" name="anio_txt"
                                        placeholder="Escribe el a&ntilde;o" title="A&ntilde;o" required /></span>
                            </div>
                            <div class="fila0km" align="left" align="left">
                                <span class="etiq0km"><label for="nromotor">Motor:</label></span>
                                <span class="form-0km"><input type="text" id="motor" class="cambio" name="motor_txt"
                                        placeholder="Escribe el nro motor" title="nro. motor" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="anio">Chasis:</label></span>
                                <span class="form-0km"><input type="text" id="chasis" class="cambio" name="chasis_txt"
                                        placeholder="Escribe el nro chasis" title="nro. chasis" /></span>
                            </div>
                            <!-- <div class="fila0km">
                                <?php // include("selectlocal.php")?>
                            </div> -->
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Combustible">Combustible:</label></span>
                                <span class="form-0km"><input type="text" id="Combustible" class="cambio"
                                        name="Combustible_txt" placeholder="Escribe el Combustible" title="Combustible"
                                        required /></span>
                            </div>
                            <!-- <div class="d-block">
                                <span class="etiq0km"><label for="titular">Titular:</label></span>
                                <span class="form-0km"><select name="cliente_slc" id="titular_txt">
                                        <option value=""> - - - </option>
                                        <?php // include("select-clienteLic.php")?>
                                    </select></span>
                            </div>
                            <div class="d-block">
                                <span class="etiq0km"><label for="dominio">Dominio:</label></span>
                                <span class="form-0km"><input type="text" id="dominio_0km" class="cambio"
                                        name="dominio_0km_txt" placeholder="Escribe el Domino" title="Dominio" /></span>
                            </div> -->
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Valor_Compra_0k">Valor de Compra:</label></span>
                                <span class="form-0km"><input type="text" id="Valor_Compra_0k" class="cambio"
                                        name="Valor_Compra_0k_txt" placeholder="Escribe el Valor de Compra"
                                        title="Valor de Compra" /></span>
                            </div>
                            <!-- <div class="d-block">
                                <span class="etiq0km"><label for="fecha_pedido_0km">Fecha Pedido:</label></span>
                                <span class="form-0km"><input type="text" id="fecha_pedido_0km" class="cambio"
                                        name="fecha_pedido_0km_txt" placeholder="Escribe la Fecha de Pedido"
                                        title="Fecha de Pedido" /></span>
                            </div>
                            <div class="d-block">
                                <span class="etiq0km"><label for="fecha_pago_0km">Fecha Pago:</label></span>
                                <span class="form-0km"><input type="text" id="fecha_pago_0km" class="cambio"
                                        name="fecha_pago_0km_txt" placeholder="Escribe la Fecha de pago"
                                        title="Fecha de Pago" /></span>
                            </div>
                            <div class="d-block">
                                <span class="etiq0km"><label for="nro_operacion_0km">Nro Operación:</label></span>
                                <span class="form-0km"><input type="text" id="nro_operacion_0km" class="cambio"
                                        name="nro_operacion_0km" placeholder="Escribe el nro de la operación"
                                        title="nro operación" /></span>
                            </div>
                            <div class="d-block">
                                <span class="etiq0km"><label for="vendedor_concesionario_0km">Vendedor:</label></span>
                                <span class="form-0km"><input type="text" id="vendedor_concesionario_0km" class="cambio"
                                        name="vendedor_concesionario_0km"
                                        placeholder="Escribe el vendedor del concesionario"
                                        title="Vendedor Concesionario" /></span>
                            </div> -->
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto1">Imagen 1:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto1" id="imagen" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto2">Imagen 2:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto2" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto3">Imagen 3:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto3" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto4">Imagen 4:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto4" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto5">Imagen 5:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto5" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto6">Imagen 6:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto6" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto7">Imagen 7:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto7" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto8">Imagen 8:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto8" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto9">Imagen 9:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto9" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto10">Imagen 10:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto10" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto11">Imagen 11:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto11" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto12">Imagen 12:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto12" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto13">Imagen 13:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto13" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto14">Imagen 14:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto14" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto15">Imagen 15:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto15" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto16">Imagen 16:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto16" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto17">Imagen 17:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto17" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto18">Imagen 18:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto18" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto19">Imagen 19:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto19" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto20">Imagen 20:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto20" />
                                    </div>
                                </span>
                            </div>
                            <div class="fila-obs" align="left">
                                <span class="etiqobs"><label for="observaciones">Observaciones:</label></span>
                                <span class="form-obs"><textarea class="cambio textarea" name="observaciones_txa"
                                        id="observaciones" cols="61" rows="6"></textarea></span>
                            </div>

                            <div class="fila0km my-5" align="center" ;>
                                <input class="btn btn-outline-secondary header-btn btn-lg mt-2" type="submit"
                                    id="enviar-alta" class="cambio" name="enviar_btn" value="Agregar" />
                            </div>
                        </fieldset>
                    </form>
                    <div class="col-md-12" align="center">
                        <form action="0kmAdmin.php" method="GET" enctype="multipart/form-data" name="Volver"
                            id="Volver">
                            <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                    type="submit" name="op" id="button" value="Volver"></span>
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