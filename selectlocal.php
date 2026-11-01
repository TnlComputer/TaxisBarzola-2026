<?php 

//include "Connections/conexionNew.php";

error_reporting(E_ALL ^ E_NOTICE);

$consLocal="SELECT * FROM locales order by local asc";

$ejecutar_consLocal=$conexionNew->query($consLocal);


?>	

<span class="etiq0km"><label for="Concesionario">Concesionario:</label></span>
<span class="form-0km"><select name="locales" id"locales" class="cambio" required="required">	
	<option value="">Seleccione</option>
	<?php while ($fila=$ejecutar_consLocal->fetch_assoc()){ ?>
    <option value="<?php echo $fila['id_local']?>"><?php echo $fila['local']?></option>
<?php }?>
</select>        </span>

