<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
  <div class="container mt-4">
    <!-- Botón "Atrás" con el mismo estilo de los otros botones -->
    <div class="d-flex justify-content-left mb-4 w-100">
      <div class="d-inline-flex" style="gap: 0;">
        <div class="card text-center shadow-sm" style="width: 8rem; margin: 0;"> <!-- Reduce el ancho aquí -->
          <div class="card-body" style="padding: 5px;"> <!-- Reduce el padding aquí -->
            <a href="<?php echo base_url(); ?>index.php/lecturadl/actualizarlecturas/0" class="text-info text-decoration-none hover-atras" style="display: block; padding: 5px; border-radius: 8px; transition: 0.3s;">
              <i class="fas fa-arrow-left fa-1x mb-1"></i><br> <!-- Reduce el tamaño del icono -->
              <span class="h6" style="font-size: 0.8rem;">Atrás</span> <!-- Ajusta el tamaño del texto -->
            </a>
          </div>
        </div>
      </div>
    </div>


    <!-- Contenido de la página -->
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Medidores no leídos</h4>
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
                  <th>Cod. Medidor</th>
                  <th>Cod. Datalogger</th>
                  <th>Cod. Socio </th>
                  <th>Socio</th>
                  <th>IP</th>
                  <th>Puerto</th>
                </tr>
              </thead>
              <tbody id="lecturas-body">
                <?php
                $cont = 1;
                foreach ($fallidas as $fallida) {
                ?>
                  <tr>
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $fallida['codigoMedidor'] !== null ? $fallida['codigoMedidor'] : 'Sin código'; ?></td>
                    <td><?php echo $fallida['codigoDatalogger'] !== null ? $fallida['codigoDatalogger'] : 'Sin código'; ?></td>
                    <td><?php echo $fallida['codigoSocio'] !== null ? $fallida['codigoSocio'] : 'Sin código'; ?></td>
                    <td><?php echo $fallida['socio'] !== null ? $fallida['socio'] : 'Sin nombre'; ?></td>
                    <td><?php echo $fallida['IP'] !== null ? $fallida['IP'] : 'Sin IP'; ?></td>
                    <td><?php echo $fallida['puerto'] !== null ? $fallida['puerto'] : 'Sin puerto'; ?></td>
                  </tr>
                <?php
                  $cont++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Cod. Medidor</th>
                  <th>Cod. Datalogger</th>
                  <th>Cod. Socio </th>
                  <th>Socio</th>
                  <th>IP</th>
                  <th>Puerto</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Agrega los estilos CSS -->
<style>
  .hover-atras:hover {
    color: #ffffff !important;
    background-color: #17a2b8 !important; /* Azul claro para el botón "Atrás" */
    border-radius: 8px;
    transition: 0.3s;
    padding: 10px;
  }
</style>
