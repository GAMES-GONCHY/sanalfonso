<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista Estudiantes</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


            <div class="card">
              <div class="card-header">
<a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
	<button type="button" class="btn btn-success">Agregar Libro</button>
</a>


<br><br>

<a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
	<button type="button" class="btn btn-secondary">VER DESHABILITADOS</button>
</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Genero</th>
                    <th>Publicado</th>
                    <th>ISBN</th>
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
      <td><?php echo $cont ?></td>
      <td><?php echo $row->titulo ?></td>
      <td> <?php echo $row->autor ?> </td>
      <td><?php echo $row->genero ?></td>
      <td><?php echo $row->publicado ?></td>
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

                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Titulo</th>
                      <th>Autor</th>
                      <th>Genero</th>
                      <th>Publicado</th>
                      <th>ISBN</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                      <th>Deshabilitar</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
