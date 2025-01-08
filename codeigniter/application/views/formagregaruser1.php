<!-- START PAGE CONTENT -->
<div id="content" class="app-content">

  <!-- <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
    <li class="breadcrumb-item active">Form Validation</li>
  </ol> -->


  <h1 class="page-header">
    <?php if ($rol == 2): ?>
      Agregar Administrador
    <?php else: ?>
      Agregar Socio
    <?php endif; ?>
  </h1>


  <div class="row">
    <div class="col-xl-10">
      <div class="panel panel-inverse" data-sortable-id="form-validation-1">
        <div class="panel-heading">
          <h4 class="panel-title">Registro</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>
        <div class="panel-body">
          <!-- <form class="form-horizontal" data-parsley-validate="true" name="demo-form"> -->
          <?php
          $mensaje = $this->session->flashdata('mensaje');
          $alertType = $this->session->flashdata('alert_type');
          ?>
          <?php if ($alertType === 'error' && $mensaje): ?>
            <div class="row">
              <label class="col-lg-4"></label>
              <div class="col-lg-8">
                <div class="alert alert-danger mb-0" role="alert">
                  <?php echo $mensaje; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
            <br>
          
          <form class="form-horizontal" data-parsley-validate="true" id="form-add-user" name="demo-form" method="post" action="<?php echo base_url(); ?>index.php/crudusers/agregarbd">
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nickname" style="color: white;">Nickname * :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Nickname" data-parsley-required="true" /> -->
                <input class="form-control" type="text" id="nickname" name="nickname" 
                  placeholder="Nickname" 
                  data-parsley-required="true" 
                  data-parsley-no-special-chars 
                  data-parsley-no-special-chars-message="Este campo no debe contener caracteres especiales ni tener espacios al inicio o al final." />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nombre" style="color: white;">Nombre * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" data-parsley-required="true" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="primerapellido" style="color: white;">Primer Apellido * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="primerapellido" name="primerapellido" placeholder="Primer Apellido" data-parsley-required="true" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="segundoapellido" style="color: white;">Segundo Apellido :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="segundoapellido" name="segundoapellido" placeholder="Segundo Apellido" data-parsley-required="false" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="email" style="color: white;">Email * :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="email" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" /> -->
                <input class="form-control" type="email" id="email" name="email" 
                  placeholder="Email" 
                  data-parsley-required="true" 
                  data-parsley-type="email" 
                  data-parsley-custom-email-validation 
                  data-parsley-custom-email-validation-message="El correo electrónico debe contener '@' y terminar en '.com'." />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" style="color: white;">Tipo usuario * :</label>
              <div class="col-lg-8">
                <select class="form-select" id="select-required" name="rol" data-parsley-required="true">
                  <?php if ($rol == 2): ?>
                    <!-- Si el rol es igual a 2, solo se muestra la opción de Administrador -->
                    <option value="2" selected>ADMINISTRADOR</option>
                  <?php else: ?>
                    <!-- Si el rol no es 2, se muestran las opciones de Socio y Auxiliar -->
                    <option value="0" <?php echo ($rol == 0) ? 'selected' : ''; ?>>SOCIO</option>
                    <!-- <option value="1" <?php echo ($rol == 1) ? 'selected' : ''; ?>>AUXILIAR</option> -->
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="fono" style="color: white;">Fono * :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="number" id="fono" name="fono" data-parsley-type="number" placeholder="Number" data-parsley-required="true" /> -->
                <input class="form-control" type="number" id="fono" name="fono" 
                  placeholder="Number" 
                  data-parsley-required="true" 
                  data-parsley-type="digits" 
                  data-parsley-min="60000000" 
                  data-parsley-min-message="El número debe tener al menos 8 dígitos y debe empezar mínimamente con 6."
                  data-parsley-max="79999999" 
                  data-parsley-max-message="El número no puede exceder 8 dígitos." />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" style="color: white;">Genero * :</label>
              <div class="col-lg-8 pt-2">
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="genero" value="M" id="radioRequired1" data-parsley-required="true" />
                  <label class="form-check-label" for="radioRequired1" style="color: white;">Masculino</label>
                </div>
                <div class="form-check mt-2">
                  <input type="radio" class="form-check-input" name="genero" id="radioRequired2" value="F" />
                  <label class="form-check-label" for="radioRequired2" style="color: white;">Femenino</label>
                </div>
                
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
              <div class="col-lg-8">
                <button type="submit" id="btnagregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">Agregar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>