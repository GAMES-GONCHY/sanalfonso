	<h1>Lista de estudiantes</h1>
	<br>
	<a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
		<button type="button" class="btn btn-success">Agregar estudiante</button>
	</a>
	<table border="1" class="table">
		<thead>
			<th>No.</th>
			<th>Nombre</th>
			<th>Primer Apellido</th>
			<th>Segundo Apellido</th>
			<th>Nota</th>
			<th>Eliminar</th>
			<th>Modificar</th>
		</thead>
		<tbody>
			<?php
			$contador=1;
			foreach($alumnos->result() as $row)
			{
			?>
			<tr>
				<td><?php echo $contador ?></td>
				<td><?php echo $row->nombre ?></td>
				<td> <?php echo $row->primerApellido ?> </td>
				<td><?php echo $row->segundoApellido ?></td>
				<td><?php echo $row->nota ?></td>

				
				<td>

<?php
echo form_open_multipart("estudiante/eliminarbd");
?>
<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
<button type="submit" class="btn btn-danger">Eliminar</button>
<?php
echo form_close();
?>
				
				</td>
				<td>

				<?php
echo form_open_multipart("estudiante/modificar");
?>
<input type="hidden" name="id" value="<?php echo $row->idEstudiante; ?>">
<button type="submit" class="btn btn-warning">Modificar</button>
<?php
echo form_close();
?>

				</td>
			</tr>
			<?php
			$contador++;
			}
			?>
		</tbody>
	</table>
