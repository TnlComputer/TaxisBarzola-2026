<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);

session_start();
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

$po_UsadoCambio=1;
$id_UsadoCambio=$posicion2;

?>

<script>
window.onload = function() {
    var lista = document.getElementById("usado-lista");
    lista.onchange = seleccionarUsado;

    function seleccionarUsado() {
        window.location = "?op=cambioAuto&usado_slc=" + lista.value
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
                <h4 style="font-weight: bold;" class="display-5">USADO Pantalla Principal</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="sec-0km" class="col-md-6" align="left">
                <?php	
	  				$consUsado = "SELECT * FROM usados WHERE id_usado=?";
					$id_UsadoCambioBind=(string)$id_UsadoCambio;
					$stConsUsado = $conexionNew->prepare($consUsado);
					$stConsUsado->bind_param('s', $id_UsadoCambioBind);
					$stConsUsado->execute();
					$ejecutar_consUsado = $stConsUsado->get_result();
					$filaMUsado=$ejecutar_consUsado->fetch_assoc();
					$marca1=$filaMUsado['marca_usado'];
					$modelo1=$filaMUsado['mod_usado'];
	  				$consMarca = "SELECT * FROM marcas WHERE id_marca=?";
					$marca1Bind=(string)$marca1;
					$stConsMarca = $conexionNew->prepare($consMarca);
					$stConsMarca->bind_param('s', $marca1Bind);
					$stConsMarca->execute();
					$ejecutar_consMarca = $stConsMarca->get_result();
					$filaMarca=$ejecutar_consMarca->fetch_assoc();
            		$marcaP2=$filaMarca['marca'];
					  
					$consMod = "SELECT * FROM modelos WHERE id_modelo=?";
					$modelo1Bind=(string)$modelo1;
					$stConsMod = $conexionNew->prepare($consMod);
					$stConsMod->bind_param('s', $modelo1Bind);
					$stConsMod->execute();
					$ejecutar_consMod = $stConsMod->get_result();
					$filaMod=$ejecutar_consMod->fetch_assoc();  
					$modeloP2=$filaMod['nombre_modelo'];
					
	  			?>
                <img src="images/usados/big<?php echo $filaMUsado['foto1_usado']; ?>"
                    class="d-block img-fluid img-thumbnail" style="width:100%; height:auto; background: #f1f1f1;">
                <h4><?php echo $marcaP2; ?></h4>
                <h6><?php echo $modeloP2; ?></h6>

            </div>
            <div id="sec-0km" class="col-md-6" align="right">
                <div align="center">
                    <label for="usado-lista"></label>
                    <select name="usado_slc" id="usado-lista" class="cambio" required>
                        <option value=""> - - - </option>
                        <?php include("select-usado.php"); ?>
                    </select>
                </div>
                <div class="mt-4" align="center">
                    <?php 
				if($_GET["usado_slc"]!=NULL) {
					$idCUsado= $_GET["usado_slc"];
			  	
					$consCamUsado = "SELECT * FROM usados WHERE id_usado=?";
					$idCUsadoBind=(string)$idCUsado;
					$stConsCamUsado = $conexionNew->prepare($consCamUsado);
					$stConsCamUsado->bind_param('s', $idCUsadoBind);
					$stConsCamUsado->execute();
					$ejecutar_consCamUsado = $stConsCamUsado->get_result();
					$filaCamUsado=$ejecutar_consCamUsado->fetch_assoc();
					$marcaN=$filaCamUsado['marca_usado'];
					$modeloN=$filaCamUsado['mod_usado'];
	  	
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

					if($filaCamUsado['foto1_usado']){?>
                    <img src="<?php echo 'images/usados/big'.$filaCamUsado['foto1_usado']; ?>"
                        class="d-block img-fluid img-thumbnail" style="width:90%; height:auto; background: #f1f1f1;">
                    <?php }else{ ?>
                    <img src="images/p-libre.jpg" class="d-block img-fluid img-thumbnail"
                        style="width:90%; height:auto; background: #f1f1f1;">
                    <?php } ?>
                    <h4><?php echo $filaCMarca['marca']; ?></h4>
                    <h6><?php echo $filaCMod['nombre_modelo']; ?></h6>
                    <?php } ?>
                </div>
                <div align="center">
                    <form action="pantallaPosicionActualizoUsados.php" method="post" name="Detalles " id="Detalles ">
                        <input name="posicion" id="posicion" type="hidden" value="<?php echo $po_UsadoCambio; ?>" />
                        <input name="id_Usado" id="id_Usado" type="hidden" value="<?php echo $idCUsado; ?>" />
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