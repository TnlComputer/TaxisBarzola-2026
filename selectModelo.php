<?php 
include "Connections/conexionNew.php";

error_reporting(E_ALL ^ E_NOTICE);

$consModel="SELECT * FROM modelos where id_marca=?";

$idMarcaBind=(string)$_GET['id'];
$stConsModel=$conexionNew->prepare($consModel);
$stConsModel->bind_param('s', $idMarcaBind);
$stConsModel->execute();
$ejecutar_consModel=$stConsModel->get_result();


?>	

<span class="etiq0km"><label for="Modelo">Modelo:</label></span>
<span class="form-0km"><select name="model"  id="" class="cambio" required="required" >	
	<option value="">Seleccione</option>
	<?php while ($fila=$ejecutar_consModel->fetch_assoc()){ ?>
	<option value="<?php echo $fila['id_modelo']?>"><?php echo $fila['nombre_modelo']?></option>
<?php }?>
</select></span>