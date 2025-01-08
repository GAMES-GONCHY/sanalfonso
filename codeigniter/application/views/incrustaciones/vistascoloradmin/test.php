   

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Xeria</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Usuarios</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url(); ?>index.php/usuario/agregar">
                                <button type="button" class="btn btn-success">Agregar Usuarios</button>
                            </a>

                            <br><br>

                            <a href="<?php echo base_url(); ?>index.php/usuario/deshabilitados">
                                <button type="button" class="btn btn-info">VER DESHABILITADOS</button>
                            </a>
                        </div>

                        <div class="card-body">

                            <!-- <h4 class="header-title">Lista Usuarios</h4> -->

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nick name</th>
                                        <th>Password</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Fecha Registro</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        <th>Deshabiltar</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                    $cont=1;
                                    foreach($usuarios->result() as $row)
                                    {
                                    ?>
                                    <tr>
                                            <td><?php echo $cont ?></td>
                                            <td><?php echo $row->nickName ?></td>
                                            <td><?php echo $row->password ?></td>
                                            <td><?php echo $row->nombre ?></td>
                                            <td><?php echo $row->primerApellido ?></td>
                                            <td><?php echo $row->segundoApellido ?></td>
                                            <td><?php echo $row->rol ?></td>
                                            <td><?php echo $row->fono ?></td>
                                            <td><?php echo $row->fechaRegistro ?></td>
                                                    <td>
                                                <?php
                                        echo form_open_multipart("usuario/modificar");// <form>
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
                                        <button type="submit" class="btn btn-warning">Modificar</button>
                                        <?php
                                        echo form_close();// </form>
                                        ?>				
                                                    </td>

                                                    <td>
                                        <?php
                                        echo form_open_multipart("estudiante/eliminarbd");// <form>
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <?php
                                        echo form_close();// </form>
                                        ?>

                                                    </td>

                                                    <td>
                                        <?php
                                        echo form_open_multipart("estudiante/deshabilitarbd");// <form>
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
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
                                        <th>Nick name</th>
                                        <th>Password</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Fecha Registro</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        <th>Deshabiltar</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    