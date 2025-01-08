<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  


  <h1 class="page-header">Socios</h1>


  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">Gestionar Socios</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
              <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="row mb-3">
              <div class="col-md-12 mb-2">
                <a href="<?php echo base_url(); ?>index.php/lecturadl/mostrarlectura" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER LECTURAS HABILITADAS
                </a>
              </div>
              <!-- <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/lecturadl/realizarlectura" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                  REGISTRAR LECTURAS
                </a>
              </div> -->
            </div>

            <table id="datatable" class="table table-hover table-striped align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Lectura Anterior</th>
                        <th>Lectura Actual</th>
                        <th>Fecha Lectura</th>
                        <th>Codigo Medidor</th>
                        <th>Puerto</th>
                        <!-- <th>Restaurar</th> -->
                    </tr>
                </thead>
                <tbody id="lecturas-body">
                    <?php
                    $cont = 1;
                    foreach ($lecdeshabilitados as $lectura) { // Procesar las lecturas obtenidas de la base de datos
                    ?>
                        <tr class="text-center">
                            <td><?php echo $cont; ?></td>
                            <td><?php echo $lectura['lecturaAnterior'] !== null ? $lectura['lecturaAnterior'] : 0; ?></td>
                            <td><?php echo $lectura['lecturaActual']; ?></td>
                            <td><?php echo $lectura['fechaLectura']; ?></td>
                            <td><?php echo $lectura['codigoMedidor']; ?></td>
                            <td><?php echo $lectura['puerto']; ?></td>
                            <!-- <td>
                              <?php echo form_open_multipart("lecturadl/habilitarbd"); ?>
                                  <input type="hidden" name="id" value="<?php echo $lectura['idLectura']; ?>">
                                  <button type="submit" class="btn btn-success btn-sm" title="Restaurar">
                                      <i class="fas fa-recycle"></i> 
                                  </button>
                              <?php echo form_close(); ?>
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
                        <th>Lectura Anterior</th>
                        <th>Lectura Actual</th>
                        <th>Fecha Lectura</th>
                        <th>Codigo Medidor</th>
                        <th>Puerto</th>
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
