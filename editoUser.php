<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();

$idUser=$_POST['id_user2'];
echo htmlspecialchars((string)$idUser, ENT_QUOTES, 'UTF-8')."<br>";
$st = $conexionNew->prepare("SELECT * FROM usuarios WHERE id_user=?");
$st->execute([(string)$idUser]);
$consUsr = $st->get_result();
$cant_regUsr=mysqli_num_rows($consUsr);
$fila=mysqli_fetch_array($consUsr); 
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
                <h4 style="font-weight: bold;" class="display-5">Cambio Usuario</h4>
                <div class="col-md-12 mt-4" ;>
                    <a class="bnt btn-outline-secondary btn-sm" href="userAlta.php">Alta Usuario</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="userBaja.php">Baja Usuario</a>
                    <a class="bnt btn-outline-secondary btn-sm" href="userCambio.php">Cambio Usuario</a>
                </div>
            </div>
        </div>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 mt-2" align="center" ;>
                    <form action="userAct.php" id="alta-modelo" class="cambio" enctype="multipart/form-data"
                        method="post">
                        <fieldset>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="contasenia">Contrase&ntilde;a :</label></span>
                                <span class="form-0km"><input type="password" id="password" class="cambio"
                                        name="clave_txt" placeholder="Dejar vac&iacute;o para mantener la actual"
                                        title="Nueva contrase&ntilde;a (opcional)" value="" autocomplete="new-password" /></span>
                                <input type="hidden" name="usuario_hdn" value="<?php echo $fila['usuario_user']; ?>" />
                                <input type="hidden" name="id_user_hdn" value="<?php echo $fila['id_user']; ?>" />

                            </div>

                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Nombre">Nombre :</label></span>
                                <span class="form-0km"><input type="text" id="Nombre" class="cambio" name="nombre_txt"
                                        placeholder="Escribe tu Nombre" title="Tu Nombre"
                                        value="<?php echo $fila['nombre_user'] ?>" required /></span>
                            </div>

                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Apellido">Apellido :</label></span>
                                <span class="form-0km"><input type="text" id="Apellido" class="cambio"
                                        name="apellido_txt" placeholder="Escribe tu Apellido" title="Tu Apellido"
                                        value="<?php echo $fila['apellido_user'] ?>" required /></span>
                            </div>

                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Nivel">Seguridad :</label></span>
                                <span class="form-0km"><select name="nivel_slc" id="Seguridad" required="required">
                                        <option value=""><?php echo utf8_decode($fila['nivel_user']) ?></option>
                                        <?php include("select-nivel.php")?>
                                    </select></span>
                            </div>

                            <div class="fila-obs" align="left">
                                <img src=<?php echo"usuarios/imgUser/".$fila['imagen_user'] ?> width="100" height="100"
                                    alt="">
                                <br />
                                <span class="etiq0km"><label for="foto">Imagen :</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto_txt" title="Tu Foto" />
                                        <input type="hidden" name="imagen_hdn"
                                            value="<?php echo $fila['imagen_user']; ?>" />
                                </span>
                            </div>
                            <div class="fila0km my-2" align="center">
                                <input name="id_modelo2" type="hidden" value="<?php echo $idModelo ?>" />
                                <span class="etiq0km" align="center">
                                    <input class="btn btn-outline-secondary header-btn btn-lg mt-2" type="submit"
                                        id="enviar-cambio" class="cambio" name="enviar_btn" value="Cambiar" />
                                </span>
                            </div>
                        </fieldset>
                    </form>
                    <div class="fila0km my-2" align="center">
                        <form action="userCambio.php" id="alta-modelo" class="cambio" enctype="multipart/form-data">
                            <span class="etiq0km" align="center">
                                <input class="btn btn-outline-secondary header-btn btn-lg mt-2" type="submit"
                                    id="enviar-cambio" class="cambio" name="enviar_btn" value="Volver" align="center" />
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