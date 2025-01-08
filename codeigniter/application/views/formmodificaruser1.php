<!-- START PAGE CONTENT -->
<div id="content" class="app-content">

  <!-- <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
    <li class="breadcrumb-item active">Form Validation</li>
  </ol> -->


  <h1 class="page-header">Modificar usuario</h1>


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
          <?php if ($error = $this->session->flashdata('mensaje')) : ?>
            <div class="row">
              <label class="col-lg-4"></label>
              <div class="col-lg-8">
                <div class="alert alert-danger mb-0" role="alert">
                  <?php echo $error; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <br>

          <?php if (!empty($info)): ?>
          <form class="form-horizontal" data-parsley-validate="true" name="demo-form" method="post" action="<?php echo base_url(); ?>index.php/crudusers/modificarbd" style="color: white;">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id" value="<?php echo $info['idUsuario']; ?>">
            </div>
            
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nickname">Nickname :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="text" id="nickname" name="nickname" placeholder="Nickname" value="<?php echo $info['nickName']; ?>" /> -->
                <input class="form-control" type="text" id="nickname" name="nickname" 
                  placeholder="Nickname" 
                  value="<?php echo $info['nickName']; ?>" 
                  data-parsley-no-special-chars 
                  data-parsley-no-special-chars-message="Este campo no debe contener caracteres especiales ni tener espacios al inicio o al final." 
                  data-parsley-required="true" />
              </div>
            </div>
          
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="nombre">Nombre :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" data-parsley-required="true" value="<?php echo $info['nombre']; ?>" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="primerapellido">Primer Apellido :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="primerapellido" name="primerapellido" placeholder="Primer Apellido" data-parsley-required="true" value="<?php echo $info['primerApellido']; ?>" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="segundoapellido">Segundo Apellido :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="segundoapellido" name="segundoapellido" placeholder="Segundo Apellido" value="<?php echo $info['segundoApellido'] ?>" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="email">Email * :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="email" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" value="<?php echo $info['email'] ?>" /> -->
                <input class="form-control" type="email" id="email" name="email" 
                  placeholder="Email" 
                  data-parsley-required="true" 
                  data-parsley-type="email" 
                  data-parsley-custom-email-validation 
                  value="<?php echo $info['email'] ?>" />

              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label">Tipo usuario * :</label>
              <div class="col-lg-8">
                <select class="form-select" id="select-required" name="rol" data-parsley-required="true">
                  <option value="0" <?php echo ($info['rol'] == 0) ? 'selected' : ''; ?>>SOCIO</option>
                  <!-- <option value="1" <?php echo ($info['rol'] == 1) ? 'selected' : ''; ?>>AUXILIAR</option>
                  <option value="2" <?php echo ($info['rol'] == 2) ? 'selected' : ''; ?>>ADMINISTRADOR</option> -->
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="fono">Fono * :</label>
              <div class="col-lg-8">
                <!-- <input class="form-control" type="text" id="fono" name="fono" data-parsley-type="number" placeholder="Number" data-parsley-required="true" data-parsley-error-message="Este valor no puede estar vacio" value="<?php echo $info['fono'] ?>" /> -->

                <input class="form-control" type="number" id="fono" name="fono"  
                  placeholder="Number" 
                  data-parsley-required="true"
                  data-parsley-type="digits" 
                  data-parsley-min="60000000" 
                  data-parsley-min-message="El número debe tener al menos 8 dígitos y debe empezar mínimamente con 6."
                  data-parsley-max="79999999" 
                  data-parsley-max-message="El número no puede exceder 8 dígitos." 
                  value="<?php echo $info['fono'] ?>" />
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label">Genero * :</label>
              <div class="col-lg-8 pt-2">
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="genero" id="radioRequired1" data-parsley-required="true" value="M" <?php echo ($info['sexo'] == 'M') ? 'checked' : ''; ?> />
                  <label class="form-check-label" for="radioRequired1">Masculino</label>
                </div>
                <div class="form-check mt-2">
                  <input type="radio" class="form-check-input" name="genero" id="radioRequired2" value="F" <?php echo ($info['sexo'] == 'F') ? 'checked' : ''; ?> />
                  <label class="form-check-label" for="radioRequired2">Femenino</label>
                </div>
                <!-- <div class="form-check mt-2">
                  <input type="radio" class="form-check-input" name="radiorequired" id="radioRequired3" value="key" />
                  <label class="form-check-label" for="radioRequired3">Radio Button 2</label>
                </div> -->
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-4 col-form-label form-label">&nbsp;</label>
              <div class="col-lg-8">
                <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">Modificar</button>
              </div>
            </div>
          </form>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>