<?php 
include "Connections/conexionNew.php";
// error_reporting(E_ALL ^ E_NOTICE);
$consMarca="SELECT * FROM marcas ORDER BY marca";
$ejecutar_consMarca=$conexionNew->query($consMarca);
?>

<span class="etiq0km"><label for="Marca">Marca:</label></span>
<span class="form-0km">
    <select name="marca" id="marca" class="cambio"
        onchange="from(document.form1.marca.value,'midiv','selectModelo.php')" required="required">
        <option value="">Seleccione</option>
        <?php while ($fila=$ejecutar_consMarca->fetch_assoc()){ ?>
        <option value="<?php echo $fila['id_marca']?>"><?php echo $fila['marca']?></option>
        <?php }?>
    </select></span>