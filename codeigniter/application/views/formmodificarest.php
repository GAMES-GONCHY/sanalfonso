<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modificar Estudiante</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modificar Estudiante</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <!-- /.card-header -->
                            <div class="card-body">


<?php
foreach($info->result() as $row)
{
?>

<?php
echo form_open_multipart("estudiante/modificarbd");//es igual q el tag <form>
?>

<input type="text" class="form-control" name="id" value="<?php echo $row->idEstudiante ?>" readonly>
<input type="text" class="form-control" name="nombre" placeholder="Modifica el nombre" value="<?php echo $row->nombre ?>">
<input type="text" class="form-control" name="apellido1" maxlength="20" minlength="3"  placeholder="Modifica el apellido paterno" value="<?php echo $row->primerApellido ?>">
<input type="text" class="form-control" name="apellido2" placeholder="Modifica el apellido materno" value="<?php echo $row->segundoApellido ?>">
<input type="text" class="form-control" name="nota" placeholder="Modifica la nota" min="0" max="100" value="<?php echo $row->nota ?>">

<button type="submit" class="btn btn-warning">Modificar Estudiante</button>


<?php
echo form_close();////es igual q el tag </form>
?>

<?php
}
?>

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




