<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Crear Aviso de Cobranza</li>
  </ol>

  <h1 class="page-header">Crear Nuevo Aviso de Cobranza</h1>

  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Formulario para Crear Aviso</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
          </div>
          <div class="panel-body">
            <form action="<?= site_url('AvisoCobranza/guardar') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="consumo">Consumo (m³):</label>
                <input type="number" class="form-control" name="consumo" required>
              </div>
              <div class="form-group mb-3">
                <label for="tarifaAplicada">Tarifa Aplicada:</label>
                <input type="number" class="form-control" name="tarifaAplicada" required>
              </div>
              <div class="form-group mb-3">
                <label for="fechaLecturaActual">Fecha de Lectura Actual:</label>
                <input type="date" class="form-control" name="fechaLecturaActual" required>
              </div>
              <div class="form-group mb-3">
                <label for="fechaVencimiento">Fecha de Vencimiento:</label>
                <input type="date" class="form-control" name="fechaVencimiento" required>
              </div>
              <div class="form-group mb-3">
                <label for="codigoQR">Subir Código QR:</label>
                <input type="file" class="form-control" name="codigoQR" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary">Guardar Aviso</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
