<br><br><BR></BR>

<h1>Lista de libros</h1>
<a href="<?php echo base_url(); ?>index.php/libro/agregarlibro">
	<button type="button" class="btn btn-success">Agregar Libro</button>
</a>


<br>

<a href="<?php echo base_url(); ?>index.php/libro/deshabilitados">
	<button type="button" class="btn btn-secondary">VER DESHABILITADOS</button>
</a>

<table class="table">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Título</th>
			<th>Autor</th>
			<th>Genero</th>
			<th>Publicado</th>
			<th>Isbn</th>
			<th>Modificar</th>
			<th>Eliminar</th>
			<th>Deshabilitar</th>

		</tr>
	</thead>
	<tbody>
		<?php
		$cont=1;
		foreach($libros->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $cont; ?></td>
			<td><?php echo $row->titulo; ?></td>
			<td><?php echo $row->autor; ?></td>
			<td><?php echo $row->genero; ?></td>
			<td><?php echo $row->publicado; ?></td>
			<td><?php echo $row->isbn; ?></td>
			<td>
			<?php
echo form_open_multipart("libro/modificarlibro");// <form>
?>
<input type="hidden" name="id" value="<?php echo $row->id ?>" >
<button type="submit" class="btn btn-warning">Modificar</button>
<?php
echo form_close();// </form>
?>				
			</td>
			<td>
<?php
echo form_open_multipart("libro/eliminarlibrobd");// <form>
?>
<input type="hidden" name="id" value="<?php echo $row->id ?>" >
<button type="submit" class="btn btn-danger">Eliminar</button>
<?php
echo form_close();// </form>
?>

			</td>
			<td>
<?php
echo form_open_multipart("libro/deshabilitarbd");// <form>
?>
<input type="hidden" name="id" value="<?php echo $row->id ?>" >
<button type="submit" class="btn btn-primary">Deshabilitar</button>
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
