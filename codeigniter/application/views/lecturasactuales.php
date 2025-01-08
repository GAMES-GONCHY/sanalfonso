<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
  <div class="container mt-4">
    <!-- Contenedor para centrar las tarjetas -->
    <div class="d-flex justify-content-left mb-4 w-100">
      <div class="d-inline-flex" style="gap: 0;">
        <!-- Botón "Lecturas Eliminadas" -->
        <!-- <div class="card text-center shadow-sm" style="width: 7rem; margin: 0;">
          <div class="card-body" style="padding: 5px;">
            <a href="<?php echo base_url(); ?>index.php/lecturadl/deshabilitados" class="text-danger text-decoration-none hover-eliminados" style="display: block; padding: 5px; border-radius: 8px; transition: 0.3s;">
              <i class="fas fa-trash-restore fa-lg mb-1"></i><br>
              
            </a>
          </div>
        </div> -->
      </div>
    </div>


    <!-- Tabla de lecturas -->
    <div class="panel panel-inverse">
      <div class="panel-heading d-flex justify-content-between align-items-center">
        <h4 class="panel-title">Historial de Lecturas</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
      </div>
      <div class="panel-body">
        <table id="datatable" class="table table-hover table-striped align-middle">
          <thead>
            <tr>
              <th>No.</th>
              <th>Lectura Actual</th>
              <th>Lectura Anterior</th>
              <th>Código Medidor</th>
              <th>Código Datalogger</th>
              <th>Código Socio</th>
              <th>Socio</th>
              <th>Fecha Lectura</th>
              <!-- <th>Acciones</th> -->
            </tr>
          </thead>
          <tbody id="lecturas-body">
            <?php
            $cont = 1;
            foreach ($lecturas as $lectura) {
            ?>
              <tr class="text-center">
                <td><?php echo $cont; ?></td>
                <td><?php echo $lectura['lecturaActual']; ?></td>
                <td><?php echo $lectura['lecturaAnterior'] !== null ? $lectura['lecturaAnterior'] : 0; ?></td>
                <td><?php echo $lectura['codigoMedidor']; ?></td>
                <td><?php echo $lectura['codigoDatalogger']; ?></td>
                <td><?php echo $lectura['codigoSocio']; ?></td>
                <td><?php echo $lectura['nombreSocio']; ?></td>
                <!-- <td><?php echo $lectura['fechaLectura']; ?></td> -->
                <td><?php echo date('d-m-Y', strtotime($lectura['fechaLectura'])); ?></td>
                <!-- <td>
                  <div class="btn-group" role="group">
                    <?php echo form_open_multipart("lecturadl/deshabilitarbd"); ?>
                    <input type="hidden" name="id" value="<?php echo $lectura['idLectura']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <?php echo form_close(); ?>
                  </div>
                </td> -->
              </tr>
            <?php
              $cont++;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Lectura Actual</th>
              <th>Lectura Anterior</th>
              <th>Código Medidor</th>
              <th>Código Datalogger</th>
              <th>Código Socio</th>
              <th>Socio</th>
              <th>Fecha Lectura</th>
              <!-- <th>Acciones</th> -->
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
