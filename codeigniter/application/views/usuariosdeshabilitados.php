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
                        <h4 class="page-title">Gestionar Usuarios</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url(); ?>index.php/crudusers/habilitados">
                                <button type="button" class="btn btn-info">VER HABILITADOS</button>
                            </a>
                        </div>

                        <div class="card-body">

                            <!-- <h4 class="header-title">Lista Usuarios</h4> -->

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nick name</th>
                                        <!-- <th>Password</th> -->
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Fecha Registro</th>
                                        <th>Habilitar</th>
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
                                            <td><?php echo $row->nombre ?></td>
                                            <td><?php echo $row->primerApellido ?></td>
                                            <td><?php echo $row->segundoApellido ?></td>
                                            <td><?php echo $row->rol ?></td>
                                            <td><?php echo $row->fono ?></td>
                                            <td><?php echo $row->fechaRegistro ?></td>
                                            <td>
                                                <?php
                                                echo form_open_multipart("crudusers/habilitarbd");
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
                                                    <button type="submit" class="btn btn-primary">Habilitar</button>
                                                <?php
                                                echo form_close();
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
                                        <!-- <th>Password</th> -->
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Fecha Registro</th>
                                        <th>Habilitar</th>
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

    