<!-- START PAGE CONTENT -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
    <li class="breadcrumb-item active">Form Validation</li>
  </ol>


  <h1 class="page-header">Agregar datalogger</h1>


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
          <form class="form-horizontal" data-parsley-validate="true" id="form-add-user" name="demo-form" method="post" action="<?php echo base_url(); ?>index.php/datalogger/agregarbd">
            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="latitud">Latitud * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="latitud" name="latitud" placeholder="Latitud" data-parsley-required="true" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-lg-4 col-form-label form-label" for="logitud">Longitud * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" id="longitud" name="longitud" placeholder="Longitud" data-parsley-required="true" />
              </div>
            </div>
            <div class="form-group row mb-3">
            <label class="col-lg-4 col-form-label form-label" for="logitud">Codigo Socio * :</label>
              <div class="col-lg-8">
                <input class="form-control" type="number" id="codsocio" name="codsocio" placeholder="Código Socio" data-parsley-required="true" />
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