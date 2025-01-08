<br><br><br>
<h1>Modificar Pais</h1>


<?php
foreach($infopais->result() as $row)
{
?>

<?php
echo form_open_multipart("pais/modificarpaisbd");// <form>
?>
<input type="text" name="idpais" value="<?php echo $row->idPais ?>">
<input type="text" name="pais" class="form-control" placeholder="Modifique el pais" value="<?php echo $row->pais ?>">
<input type="number" name="superficie" class="form-control" placeholder="Modifique la superficie" value="<?php echo $row->superficie ?>">
<input type="number" name="poblacion" class="form-control" placeholder="Modifique la población" value="<?php echo $row->poblacion ?>">
<button type="submit" class="btn btn-success">Modificar Pais</button>

<?php
echo form_close();// </form>
?>

<?php
}
?>