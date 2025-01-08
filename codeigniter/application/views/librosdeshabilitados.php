<br><br><BR></BR>

<h1>Lista de libros deshabilitados</h1>
<a href="<?php echo base_url(); ?>index.php/libro/mostrarlibros">
	<button type="button" class="btn btn-secondary">VER HABILITADOS</button>
</a>



<br>


<button></button>

<table class="table">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Título</th>
			<th>Autor</th>
			<th>Genero</th>
			<th>Publicado</th>
			<th>Isbn</th>
			<th>Habilitar</th>

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
echo form_open_multipart("libro/habilitarbd");// <form>
?>
<input type="hidden" name="id" value="<?php echo $row->id ?>" >
<button type="submit" class="btn btn-warning">HABILITAR</button>
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
