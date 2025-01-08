<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar Estudiante</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Agregar Estudiante</li>
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
                                echo form_open_multipart("estudiante/agregarbd");//es igual q el tag <form>
                                ?>

                                <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre" required>
                                <input type="text" class="form-control" maxlength="20" minlength="3" name="apellido1" placeholder="Escribe el apellido paterno" required>
                                <input type="text" class="form-control" name="apellido2" placeholder="Escribe el apellido materno" required>
                                <input type="number" class="form-control" name="nota" placeholder="Escribe la nota" min="0" max="100" required> 
                                <input type="text" class="form-control" maxlength="10" minlength="3" name="login" placeholder="Ingrese su login" required>
                                <input type="password" class="form-control" maxlength="10" minlength="3" name="password" placeholder="Ingrese su password" required autocomplete="new-password" >

                                <button type="submit" class="btn btn-success">Agregar Estudiante</button>


                                <?php
                                echo form_close();////es igual q el tag </form>
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
