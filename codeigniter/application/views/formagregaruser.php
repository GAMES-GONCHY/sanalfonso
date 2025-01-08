
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
                                <li class="breadcrumb-item active">Nuevo Usuario</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Nuevo Usuario</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <?php
                            echo form_open_multipart("crudusers/agregarbd");
                        ?>
                            <div class="form-group row">
                                <label for="nickName" class="col-4 col-form-label">Nick Name<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="nickName" name="nick" placeholder="Nickname" aria-describedby="inputGroupPrepend"
                                            required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-4 col-form-label">Password</label>
                                <div class="col-7">
                                    <input id="hori-pass1" name="password1" type="password" placeholder="Password"
                                            class="form-control" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass2" class="col-4 col-form-label">Confirm Password</label>
                                <div class="col-7">
                                    <input data-parsley-equalto="#hori-pass1" id="hori-pass2" name="password2" type="password"
                                            placeholder="Password" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="nombre" class="col-4 col-form-label">Nombre<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" required
                                            class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido1" class="col-4 col-form-label">Primer Apellido<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input id="apellido1" name="apellido1" type="text" placeholder="Primer Apellido" required
                                            class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido2" class="col-4 col-form-label">Segundo Apellido<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input id="apellido2" name="apellido2" type="text" placeholder="Segundo Apellido" required
                                            class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Email<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="email" required parsley-type="email" class="form-control"
                                            id="inputEmail3" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rol" class="col-4 col-form-label">Rol<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select class="selectpicker" data-style="btn-danger" id="rol" name="rol">
                                        <option value="Socio" >Socio</option>
                                        <option value="Administrador" selected>Administrador</option>
                                        <option value="Auxiliar">Invitado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fono" class="col-4 col-form-label">Fono<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input id="fono" name="fono" type="text" placeholder="Fono" required
                                            class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="generoM" class="col-4 col-form-label">Genero *:<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <div class="radio mb-1">
                                        <input type="radio" name="genero" id="generoM" value="M" required="">
                                        <label for="generoM">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="genero" id="generoF" value="F">
                                        <label for="generoF">
                                            Femenino
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        Registrar
                                    </button>

                                    <button type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                        Cancelar
                                    </button>
                                </div>
                            </div>  
                        <?php
                            echo form_close();
                        ?>
                    </div> <!-- end card-box -->

                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->