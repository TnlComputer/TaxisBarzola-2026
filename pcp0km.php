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

$po_0kmCambio=1;
$id_0kmCambio=$posicion1;

?>

<script>
window.onload = function() {
    var lista = document.getElementById("0km-lista");
    lista.onchange = seleccionar0km;

    function seleccionar0km() {
        window.location = "?op=cambioAuto&0km_slc=" + lista.value
    }
}
</script>

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
                <h4 style="font-weight: bold;" class="display-5">0KM Pantalla Principal</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="sec-0km" class="col-md-6" align="left">
                <?php	
                $cons0km = "SELECT * FROM 0km WHERE id_0km=?";
                $id_0kmCambioBind=(string)$id_0kmCambio;
                $stCons0km = $conexionNew->prepare($cons0km);
                $stCons0km->bind_param('s', $id_0kmCambioBind);
                $stCons0km->execute();
                $ejecutar_cons0km = $stCons0km->get_result();
                $fila0km=$ejecutar_cons0km->fetch_assoc();
                $marca1=$fila0km['marca_0km'];
                $modelo1=$fila0km['mod_0km'];
                $consMarca = "SELECT * FROM marcas WHERE id_marca=?";
                $marca1Bind=(string)$marca1;
                $stConsMarca = $conexionNew->prepare($consMarca);
                $stConsMarca->bind_param('s', $marca1Bind);
                $stConsMarca->execute();
                $ejecutar_consMarca = $stConsMarca->get_result();
                $filaMarca=$ejecutar_consMarca->fetch_assoc();
                $marcaP1=$filaMarca['marca'];

                $consMod = "SELECT * FROM modelos WHERE id_modelo=?";
                $modelo1Bind=(string)$modelo1;
                $stConsMod = $conexionNew->prepare($consMod);
                $stConsMod->bind_param('s', $modelo1Bind);
                $stConsMod->execute();
                $ejecutar_consMod = $stConsMod->get_result();
                $filaMod=$ejecutar_consMod->fetch_assoc();  
                $modeloP1=$filaMod['nombre_modelo'];

             ?>
                <img src="images/0km/big<?php echo $fila0km['foto1_0km']; ?>" class="d-block img-fluid img-thumbnail"
                    style="width:100%; height:auto; background: #f1f1f1;">
                <h4><?php echo $marcaP1; ?></h4>
                <h6><?php echo $modeloP1; ?></h6>

            </div>
            <div id="sec-0km" class="col-md-6" align="right">
                <div align="center">
                    <label for="0km-lista"></label>
                    <select name="0km_slc" id="0km-lista" class="cambio" required>
                        <option value=""> - - - </option>
                        <?php include("select-0km.php"); ?>
                    </select>
                </div>
                <div class="mt-4" align="center">
                    <?php 
				    if($_GET["0km_slc"]!=NULL) {
					$idC0km= $_GET["0km_slc"];
			  	
					$consCam0km = "SELECT * FROM 0km WHERE id_0km=?";
					$idC0kmBind=(string)$idC0km;
					$stConsCam0km = $conexionNew->prepare($consCam0km);
					$stConsCam0km->bind_param('s', $idC0kmBind);
					$stConsCam0km->execute();
					$ejecutar_consCam0km = $stConsCam0km->get_result();
					$filaCam0km=$ejecutar_consCam0km->fetch_assoc();
					$marcaN=$filaCam0km['marca_0km'];
					$modeloN=$filaCam0km['mod_0km'];
	  	
					$consCMarca = "SELECT * FROM marcas WHERE id_marca=?";
					$marcaNBind=(string)$marcaN;
					$stConsCMarca = $conexionNew->prepare($consCMarca);
					$stConsCMarca->bind_param('s', $marcaNBind);
					$stConsCMarca->execute();
					$ejecutar_consCMarca = $stConsCMarca->get_result();
					$filaCMarca=$ejecutar_consCMarca->fetch_assoc();
		
			  		$consCMod = "SELECT * FROM modelos WHERE id_modelo=?";
					$modeloNBind=(string)$modeloN;
					$stConsCMod = $conexionNew->prepare($consCMod);
					$stConsCMod->bind_param('s', $modeloNBind);
					$stConsCMod->execute();
					$ejecutar_consCMod = $stConsCMod->get_result();
					$filaCMod=$ejecutar_consCMod->fetch_assoc();  

			        if($filaCam0km['foto1_0km']){?>
                    <img src="<?php echo 'images/0km/big'.$filaCam0km['foto1_0km']; ?>"
                        class="d-block img-fluid img-thumbnail" style="width:90%; height:auto; background: #f1f1f1;">
                    <?php }else{ ?>
                    <img src="images/p-libre.jpg" class="d-block img-fluid img-thumbnail"
                        style="width:100%; height:auto; background: #f1f1f1;">
                    <?php } ?>
                    <h4><?php echo $filaCMarca['marca']; ?></h4>
                    <h6><?php echo $filaCMod['nombre_modelo']; ?></h6>
                    <?php }  ?>
                </div>
                <div align="center">
                    <form action="pantallaPosicionActualizo0km.php" method="post" name="Detalles " id="Detalles ">
                        <input name="posicion" id="posicion" type="hidden" value="<?php echo $po_0kmCambio; ?>" />
                        <input name="id_0km" id="id_0km" type="hidden" value="<?php echo $idC0km; ?>" />
                        <input class="btn btn-outline-secondary header-btn btn-lg mt-2" type="submit" name="button"
                            id="button" value="Cambiar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row">
            <div class="col-md-12" align="center" ;>
                <br />
            </div>
        </div>
    </div>
    <?php include "pie.php"; ?>

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