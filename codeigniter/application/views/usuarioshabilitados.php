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
                            
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <a href="<?php echo base_url(); ?>index.php/crudusers/deshabilitados" class="btn btn-info w-100">
                                        VER DESHABILITADOS
                                    </a>

                                    <br>
                                    <br>

                                    <a href="<?php echo base_url(); ?>index.php/crudusers/agregar">
                                        <button type="button" class="btn btn-success w-100">Agregar Usuarios</button>
                                    </a>
                                </div>        
                            </div>        
                            <br><br>
                            <table id="datatable-buttons" class="table table-hover dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Perfil</th>
                                        <th>Cargar</th>
                                        <th>Nick name</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>E-mail</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Género</th>
                                        <th>Creado</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
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
                                            <td>
                                                <?php 
                                                    $foto=$row->foto;
                                                    if($foto=="")
                                                    {
                                                ?>
                                                    <img src="<?php echo base_url(); ?>uploads/usersphoto/perfil.jpg" width="40">
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>uploads/usersphoto/<?php echo $foto ?>" width="40">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo form_open_multipart("crudusers/subirfoto");// <form>
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
                                                    <button type="submit" class="btn btn-primary">Subir</button>
                                                <?php 
                                                    echo form_close();// </form>
                                                ?>		
                                            </td>
                                            <td><?php echo $row->nickName ?></td>
                                            <td><?php echo $row->nombre ?></td>
                                            <td><?php echo $row->primerApellido ?></td>
                                            <td><?php echo $row->segundoApellido ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php echo $row->rol ?></td>
                                            <td><?php echo $row->fono ?></td>
                                            <td><?php echo $row->sexo ?></td>
                                            <td><?php echo $row->fechaRegistro ?></td>
                                                    <td>
                                                <?php
                                        echo form_open_multipart("crudusers/modificar");// <form>
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
                                        <button type="submit" class="btn btn-warning">Modificar</button>
                                        <?php
                                        echo form_close();// </form>
                                        ?>				
                                                    </td>
                                                    <td>
                                        <?php
                                        echo form_open_multipart("crudusers/deshabilitarbd");// <form>
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->idUsuario ?>" >
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
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Perfil</th>
                                        <th>Cargar</th>
                                        <th>Nick name</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>E-mail</th>
                                        <th>Rol</th>
                                        <th>Fono</th>
                                        <th>Género</th>
                                        <th>Creado</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
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

    