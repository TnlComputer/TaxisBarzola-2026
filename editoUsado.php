<?php 
include "Connections/conexionNew.php"; 
include "usuarios/autorizo.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_POST["id_usado2"]!=NULL)
{
	$id_usado=$_POST['id_usado2'];
	$_session['id_marca']=$_POST['id_marca2'];
	
			
	  		$consUsados = "SELECT * FROM usados WHERE id_usado=?";
			$st_ejecutar_consUsados = $conexionNew->prepare($consUsados); $st_ejecutar_consUsados->execute([(string)$id_usado]); $ejecutar_consUsados = $st_ejecutar_consUsados->get_result();
			$filaUsados=$ejecutar_consUsados->fetch_assoc();
			$marca1=$filaUsados['marca_usado'];
			$modelo1=$filaUsados['mod_usado'];
			$local1=$filaUsados['ubicacion_usado'];
			$titular1=$filaUsados['titular_usado'];
	  		$consMarca = "SELECT * FROM marcas WHERE id_marca=?";
			$st_ejecutar_consMarca = $conexionNew->prepare($consMarca); $st_ejecutar_consMarca->execute([(string)$marca1]); $ejecutar_consMarca = $st_ejecutar_consMarca->get_result();
			$filaMarca=$ejecutar_consMarca->fetch_assoc();
	  		$consMod = "SELECT * FROM modelos WHERE id_modelo=?";
			$st_ejecutar_consMod = $conexionNew->prepare($consMod); $st_ejecutar_consMod->execute([(string)$modelo1]); $ejecutar_consMod = $st_ejecutar_consMod->get_result();
			$filaMod=$ejecutar_consMod->fetch_assoc();  
	  		$consLoc = "SELECT * FROM locales WHERE id_local=?";
			$st_ejecutar_consLoc = $conexionNew->prepare($consLoc); $st_ejecutar_consLoc->execute([(string)$local1]); $ejecutar_consLoc = $st_ejecutar_consLoc->get_result();
			$filaLoc=$ejecutar_consLoc->fetch_assoc();  
			$consCli = "SELECT * FROM clientes WHERE id_cliente=?";
			$st_ejecutar_consCli = $conexionNew->prepare($consCli); $st_ejecutar_consCli->execute([(string)$titular1]); $ejecutar_consCli = $st_ejecutar_consCli->get_result();
			$filaCli=$ejecutar_consCli->fetch_assoc();  

}
else
	{
		$mensajes = "No hay Usado para modificar";
	}
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
                <h4 style="font-weight: bold;" class="display-5">CAMBIO 0KM</h4>
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
                <div class="col-md-12 mt-2" align="center" ;>
                    <form name="form1" action="UsadoActualizo.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Marca">Marca:</label></span>
                                <span class="form-0km"><select name="marca_slc" id="marca" required="required">
                                        <option value=""><?php echo $filaMarca['marca'] ?></option>
                                        <?php include("select-marca.php")?>
                                    </select></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Modelo">Modelo:</label></span>
                                <span class="form-0km"><select name="modelo_slc" id="modelo" required="required">
                                        <option value=""><?php echo $filaMod['nombre_modelo'] ?></option>
                                        <?php include("select-modelo.php")?>
                                    </select></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="anio">A&ntilde;o:</label></span>
                                <span class="form-0km"><input type="text" id="anio" class="cambio" name="anio_txt"
                                        placeholder="Escribe el a&ntilde;o" title="A&ntilde;o"
                                        value="<?php echo $filaUsados['anio_usado']; ?>" required /></span>
                                <input type="hidden" name="id_usado2" value="<?php echo $filaUsados['id_usado']; ?>" />
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="nromotor">Motor:</label></span>
                                <span class="form-0km"><input type="text" id="motor" class="cambio" name="motor_txt"
                                        placeholder="Escribe el nro motor" title="nro. motor"
                                        value="<?php echo $filaUsados['motor_usado']; ?>" required /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="anio">Chasis:</label></span>
                                <span class="form-0km"><input type="text" id="chasis" class="cambio" name="chasis_txt"
                                        placeholder="Escribe el nro chasis" title="nro. chasis"
                                        value="<?php echo $filaUsados['chasis_usado']; ?>" required /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="concesionario">Concesionario:</label></span>
                                <span class="form-0km"><select name="local_slc" id="local" required>
                                        <option value=""><?php echo $filaLoc['local'] ?></option>
                                        <?php include("select-local-cambio.php")?>
                                    </select> </span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Combustible">Combustible</label></span>
                                <span class="form-0km"><input type="text" id="Combustible" class="cambio"
                                        name="Combustible_txt" placeholder="Escribe el Combustible" title="Combustible"
                                        value="<?php echo $filaUsados['combustible_usado']; ?>" required /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="titular">Titular:</label> </span>
                                <span class="form-0km"><select name="titular_slc" id="titular_txt" required="required">
                                        <option value="<?php echo $filaCli['id_cliente'] ?>">
                                            <?php echo $filaCli['dni_cliente']." - ".$filaCli['apellido_cliente'].",".$filaCli['nom_cliente'] ?>
                                        </option>
                                        <option value=""> - - - </option>
                                        <?php include("select-cliente-A0U.php")?>
                                    </select></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="dominio">Kilometraje</label></span>
                                <span class="form-0km"><input type="text" id="dominio_usado" class="cambio"
                                        name="kilometraje_txt" placeholder="Escribe el Kilometraje" title="Dominio"
                                        value="<?php echo $filaUsados['kilometraje_usado']; ?>" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="dominio">Dominio</label></span>
                                <span class="form-0km"><input type="text" id="dominio_usado" class="cambio"
                                        name="dominio_txt" placeholder="Escribe el Domino" title="Dominio"
                                        value="<?php echo $filaUsados['dominio_usado']; ?>" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="Valor_Compra">Valor de Compra</label></span>
                                <span class="form-0km"><input type="text" id="Valor_Compra_usado" class="cambio"
                                        name="ValorCompra_txt" placeholder="Escribe el Valor de Compra"
                                        title="Valor de Compra"
                                        value="<?php echo $filaUsados['Valor_Compra_usado']; ?>" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="fecha_pedido">Fecha Pedido</label></span>
                                <span class="form-0km"><input type="text" id="fecha_pedido_usado" class="cambio"
                                        name="fechaPedido_txt" placeholder="AAAA-MM-DD" title="Fecha de Pedido"
                                        value="<?php echo $filaUsados['fecha_pedido_usado']; ?>" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="fecha_pago_0km">Fecha Pago</label></span>
                                <span class="form-0km"><input type="text" id="fecha_pago_usado" class="cambio"
                                        name="fechaPago_txt" placeholder="AAAA-MM-DD" title="Fecha de Pago"
                                        value="<?php echo $filaUsados['fecha_pago_usado']; ?>" /></span>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="nro_operacion_0km">Nro Operación</label></span>
                                <span class="form-0km"><input type="text" id="nro_operacion_0km" class="cambio"
                                        name="nroOperacion_txt" placeholder="Escribe el nro de la operación"
                                        title="nro operación"
                                        value="<?php echo $filaUsados['nro_operacion_usado']; ?>" /></span>
                            </div>


                            <!--        <div> 
            <label for="concesionario_usado">Concesionario            </label>
	        <input type="text" id="concesionario_usado" class="cambio" name="concesionario_txt" placeholder="Escribe el Concecionario" title="Concesionario" value="<?php echo $filaUsados['concecionario_usado']; ?>" />
		</div>
-->
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="vendedor_concesionario_usado">Vendedor</label></span>
                                <span class="form-0km"><input type="text" id="vendedor_concesionario_usado"
                                        class="cambio" name="vendedorConcesionario_txt"
                                        placeholder="Escribe el vendedor del concesionario"
                                        title="Vendedor Concesionario"
                                        value="<?php echo $filaUsados['vendedor_concecionario_usado']; ?>" /></span>
                            </div>
                            <!--        <div> 
            <label for="mostrar">Mostrar</label>
	        <select name="mostrar_slc" id"mostrar" class="cambio" required="required">	
				<option value="<?php echo $filaUsados['mostrar']; ?>"><?php echo $filaUsados['mostrar']; ?></option>
			    <option value="SI">SI</option>
                <option value="NO">NO</option>
			</select>    
		</div>
-->
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto1_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto1_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto1">Imagen 1:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto1" />
                                        <input type="hidden" name="imagen1_hdn"
                                            value="<?php echo $filaUsados['foto1_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar1" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto2_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto2_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto2">Imagen 2:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto2" />
                                        <input type="hidden" name="imagen2_hdn"
                                            value="<?php echo $filaUsados['foto2_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar2" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto3_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto3_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto3">Imagen 3:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto3" />
                                        <input type="hidden" name="imagen3_hdn"
                                            value="<?php echo $filaUsados['foto3_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar3" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto4_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto4_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto4">Imagen 4:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto4" />
                                        <input type="hidden" name="imagen4_hdn"
                                            value="<?php echo $filaUsados['foto4_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar4" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto5_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto5_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto5">Imagen 5:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto5" />
                                        <input type="hidden" name="imagen5_hdn"
                                            value="<?php echo $filaUsados['foto5_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar5" type="checkbox" value="SI"></span>

                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto6_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto6_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto6">Imagen 6:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto6" />
                                        <input type="hidden" name="imagen6_hdn"
                                            value="<?php echo $filaUsados['foto6_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar6" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto7_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto7_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto7">Imagen 7:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto7" />
                                        <input type="hidden" name="imagen7_hdn"
                                            value="<?php echo $filaUsados['foto7_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar7" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto8_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto8_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto8">Imagen 8:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto8" />
                                        <input type="hidden" name="imagen8_hdn"
                                            value="<?php echo $filaUsados['foto8_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar8" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto9_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto9_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto9">Imagen 9:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" id="imagen" name="foto9" />
                                        <input type="hidden" name="imagen9_hdn"
                                            value="<?php echo $filaUsados['foto9_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar9" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto10_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto10_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto10">Imagen 10:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto10" id="imagen" />
                                        <input type="hidden" name="imagen10_hdn"
                                            value="<?php echo $filaUsados['foto10_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar10" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto11_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto11_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto11">Imagen 11:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto11" id="imagen" />
                                        <input type="hidden" name="imagen11_hdn"
                                            value="<?php echo $filaUsados['foto11_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar11" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto12_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto12_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto12">Imagen 12:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto12" id="imagen" />
                                        <input type="hidden" name="imagen12_hdn"
                                            value="<?php echo $filaUsados['foto12_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar12" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto13_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto13_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto13">Imagen 13:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto13" id="imagen" />
                                        <input type="hidden" name="imagen13_hdn"
                                            value="<?php echo $filaUsados['foto13_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar13" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto14_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto14_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto14">Imagen 14:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto14" id="imagen" />
                                        <input type="hidden" name="imagen14_hdn"
                                            value="<?php echo $filaUsados['foto14_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar14" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto15_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto15_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto15">Imagen 15:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto15" id="imagen" />
                                        <input type="hidden" name="imagen15_hdn"
                                            value="<?php echo $filaUsados['foto15_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar15" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto16_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto16_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto16">Imagen 16:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto16" id="imagen" />
                                        <input type="hidden" name="imagen16_hdn"
                                            value="<?php echo $filaUsados['foto16_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar16" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto17_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto17_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto17">Imagen 17:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto17" id="imagen" />
                                        <input type="hidden" name="imagen17_hdn"
                                            value="<?php echo $filaUsados['foto17_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar17" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto18_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto18_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto18">Imagen 18:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto18" id="imagen" />
                                        <input type="hidden" name="imagen18_hdn"
                                            value="<?php echo $filaUsados['foto18_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar18" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto19_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto19_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto19">Imagen 19:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto19" id="imagen" />
                                        <input type="hidden" name="imagen19_hdn"
                                            value="<?php echo $filaUsados['foto19_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar19" type="checkbox" value="SI"></span>
                            </div>
                            <div class="mt-2" align="left">
                                <?php  if ($filaUsados['foto20_usado']=='NULL') { ?>
                                <img src="images/sinfoto.jpg" width="118" height="88">
                                <?php }else{ ?>
                                <img src=<?php echo"images/usados/".$filaUsados['foto20_usado']; ?> width="118"
                                    height="88">
                                <?php } ?>
                            </div>
                            <div class="fila0km" align="left">
                                <span class="etiq0km"><label for="foto20">Imagen 20:</label></span>
                                <span class="form-0km">
                                    <div class="adjuntar-archivo cambio">
                                        <input type="file" name="foto20" id="imagen" />
                                        <input type="hidden" name="imagen20_hdn"
                                            value="<?php echo $filaUsados['foto20_usado']; ?>" /></div>
                                </span>
                                <span><input name="Borrar20" type="checkbox" value="SI"></span>
                            </div>

                            <div class="fila-obs" align="left">
                                <span class="etiqobs"><label for="observaciones">Observaciones</label></span>
                                <span class="form-obs"><textarea id="observaciones" class="cambio"
                                        name="observaciones_txa" cols="61"
                                        rows="6"><?php echo $filaUsados['obs_usado']; ?></textarea></span>
                            </div>
                            <div class="fila0km my-5" align="center" ;>
                                <span class="etiq0km"><input class="btn btn-outline-secondary header-btn btn-lg mt-2"
                                        type="submit" id="enviar-cambio" class="cambio" name="enviar_btn"
                                        value="Cambiar" />
                                </span>
                            </div>
                        </fieldset>
                    </form>
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