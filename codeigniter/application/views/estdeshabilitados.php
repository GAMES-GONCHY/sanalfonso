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

<a href="<?php echo base_url(); ?>index.php/estudiante/habilitados">
	<button type="button" class="btn btn-success">VER HABILITADOS</button>
</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Nota</th>
                    <th>Habilitar</th>
                  </tr>
                </thead>
                  <tbody>
		<?php
		$cont=1;
		foreach($alumnos->result() as $row)
		{
		?>
		<tr>
      <td><?php echo $cont ?></td>
      <td><?php echo $row->nombre ?></td>
      <td> <?php echo $row->primerApellido ?> </td>
      <td><?php echo $row->segundoApellido ?></td>
      <td><?php echo $row->nota ?></td>

			<td>
          <?php
          echo form_open_multipart("estudiante/habilitarbd");// <form>
          ?>
          <input type="hidden" name="id" value="<?php echo $row->idEstudiante ?>" >
          <button type="submit" class="btn btn-primary">Habilitar</button>
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
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Nota</th>
                  <th>Habilitar</th>

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
