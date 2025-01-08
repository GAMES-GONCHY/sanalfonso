<br><br><BR></BR>

<h1>Lista de paises</h1>
<a href="<?php echo base_url(); ?>index.php/pais/agregarpais">
	<button type="button" class="btn btn-success">Agregar Pais</button>
</a>
<button></button>

<table class="table">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Pais</th>
			<th>Superficie</th>
			<th>Población</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$cont=1;
		foreach($paises->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $cont; ?></td>
			<td><?php echo $row->pais; ?></td>
			<td><?php echo $row->superficie; ?></td>
			<td><?php echo $row->poblacion; ?></td>
			<td>
			<?php
echo form_open_multipart("pais/modificarpais");// <form>
?>
<input type="number" name="idpais" value="<?php echo $row->idPais ?>" >
<button type="submit" class="btn btn-warning">Modificar</button>
<?php
echo form_close();// </form>
?>				
			</td>
			<td>
<?php
echo form_open_multipart("pais/eliminarpaisbd");// <form>
?>
<input type="number" name="idpais" value="<?php echo $row->idPais ?>" >
<button type="submit" class="btn btn-danger">Eliminar</button>
<?php
echo form_close();// </form>
?>

			</td>
		</tr>
		<?php
		$cont++;
		}
		?>
	</tbody>
</table>
