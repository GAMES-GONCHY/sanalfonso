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
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li> -->
                                <li class="breadcrumb-item active">Modificar Usuario</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Modificar Usuario</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">

                        <?php
                            foreach($info->result() as $row)
                            {
                        ?>
                        <?php
                            echo form_open_multipart("crudusers/modificarbd");
                        ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row->idUsuario ?>">
                            </div>
                            <div class="form-group">
                                <label for="nickName">Nick Name</label>
                                <input type="text" class="form-control" id="nickName" name="nick" placeholder="Nickname" value="<?php echo $row->nickName ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" value="<?php echo $row->nombre ?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido1">Primer Apellido</label>
                                <input id="apellido1" name="apellido1" type="text" placeholder="Primer Apellido" class="form-control" value="<?php echo $row->primerApellido ?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido2">Segundo Apellido</label>
                                <input id="apellido2" name="apellido2" type="text" placeholder="Segundo Apellido" class="form-control" value="<?php echo $row->segundoApellido ?>">
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">E-mail</label>
                                <input type="email" name="email" parsley-trigger="change" value="<?php echo $row->email ?>"
                                        placeholder="Enter email" class="form-control" id="emailAddress">
                            </div>

                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select class="selectpicker" data-style="btn-danger" id="rol" name="rol">
                                    <option value="Socio" <?php echo ($row->rol == 'Socio') ? 'selected' : ''; ?>>Socio</option>
                                    <option value="Administrador" <?php echo ($row->rol == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                                    <option value="Invitado" <?php echo ($row->rol == 'Invitado') ? 'selected' : ''; ?>>Invitado</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fono">Fono</label>
                                <input id="fono" name="fono" type="text" placeholder="Fono" class="form-control" value="<?php echo $row->fono ?>">
                            </div>
                            <div class="form-group">
                                <label for="fono">Genero</label>
                                <div class="radio mb-1">
                                    <input type="radio" name="genero" id="generoM" value="M" <?php echo ($row->sexo == 'M') ? 'checked' : ''; ?>>
                                    <label for="generoM">
                                        Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="genero" id="generoF" value="F" <?php echo ($row->sexo == 'F') ? 'checked' : ''; ?>>
                                    <label for="generoF">
                                        Femenino
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        <!-- </form> -->
                        <?php
                            echo form_close();
                        ?>
                        <?php
                            }
                        ?>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->

