<!-- START CONTENT PAGE -->
<div id="content" class="app-content">




  <!-- <h1 class="page-header">Tarifas</h1> -->


  <div class="container mt-4">
    <!-- Contenedor para centrar las tarjetas -->
    <div class="d-flex justify-content-left mb-4 w-100">
      <div class="d-inline-flex" style="gap: 0;">
        <!-- Botón "Atrás" con el mismo estilo de los otros botones -->
        <div class="card text-center shadow-sm" style="width: 7rem; margin: 0;"> <!-- Reduce el ancho aquí -->
          <div class="card-body" style="padding: 5px;"> <!-- Reduce el padding aquí -->
            <a href="<?php echo base_url(); ?>index.php/tarifa/habilitados" class="text-info text-decoration-none hover-atras" style="display: block; padding: 5px; border-radius: 8px; transition: 0.3s;">
              <i class="fas fa-arrow-left fa-1x mb-1"></i><br> <!-- Reduce el tamaño del icono -->
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Tarifas Eliminadas</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <table id="datatable" class="table table-hover table-striped align-middle" style="text-align: center;">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Tarifa vigente</th>
                  <th>Tarifa mínima</th>
                  <th>Conclusión de vigencia</th>
                  <!-- <th>Restaurar</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = 1;
                foreach ($tarifas->result() as $row) {
                ?>
                  <tr style="text-align: center;">
                    <td><?php echo $cont ?></td>
                    <td><?php echo $row->tarifaVigente ?></td>
                    <td><?php echo $row->tarifaMinima ?></td>
                    <td><?php echo $row->fechaActualizacion ?></td>

                    <!-- <td>
                      <div class="btn-group" role="group">
                          <?php echo form_open_multipart("tarifa/habilitar"); ?>
                          <input type="hidden" name="id" value="<?php echo $row->idTarifa; ?>">
                          <button type="submit" class="btn btn-success btn-sm" title="Restaurar">
                              <i class="fas fa-recycle"></i>
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
                  <th width="1%">No.</th>
                  <th>Tarifa vigente</th>
                  <th>Tarifa mínima</th>
                  <th>Conclusión de vigencia</th>
                  <!-- <th>Restaurar</th> -->
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
