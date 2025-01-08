<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <!-- <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
    <li class="breadcrumb-item active">Extension Combination</li>
  </ol> -->

  <h1 class="page-header">Dataloggers</h1>

  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <h4 class="panel-title">En servicio</h4>
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
                <a href="<?php echo base_url(); ?>index.php/datalogger/deshabilitados" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                  VER DESHABILITADOS
                </a>
              </div>
              <!-- <div class="col-md-6 mb-2">
                <a href="<?php echo base_url(); ?>index.php/datalogger/agregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                  Agregar Datalogger
                </a>
              </div> -->
            </div>
            <table id="datatable" class="table table-hover table-striped align-middle">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Cod. Datalogger</th>
                  <th>Cod. Medidor</th>
                  <th>Cod. Socio</th>
                  <th>Socio</th>
                  <th>IP</th>
                  <th>Puerto</th>
                  <th>Fecha registro</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = 1;
                foreach ($datalogger->result() as $row) {
                ?>
                  <tr data-id="<?php echo $row->idDatalogger; ?>">
                    <td><?php echo $cont; ?></td>
                    <td><?php echo $row->codigoDatalogger; ?></td>
                    <td><?php echo $row->codigoMedidor; ?></td>
                    <td><?php echo $row->codigoSocio; ?></td>
                    <td><?php echo $row->nombreSocio; ?></td>
                    <td class="ip"><?php echo $row->IP; ?></td>
                    <td class="puerto"><?php echo $row->puerto; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row->fechaRegistro)); ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <button 
                                class="btn btn-black btn-sm mx-1" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalPosBooking" 
                                onclick="cargarDatos('<?php echo $row->idDatalogger; ?>',
                                                      '<?php echo $row->IP; ?>',
                                                      '<?php echo $row->puerto; ?>')">
                                <i class="fas fa-cog"></i> <!-- Ícono de configuración -->
                            </button>
                            <button class="btn btn-danger btn-sm mx-1" onclick="eliminarDatalogger('<?php echo $row->idDatalogger; ?>')">
                                <i class="fas fa-trash"></i> <!-- Ícono de eliminar -->
                            </button>
                        </div>
                    </td>
                  </tr>
                <?php
                  $cont++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th>Cod. Datalogger</th>
                  <th>Cod. Medidor</th>
                  <th>Cod. Socio</th>
                  <th>Socio</th>
                  <th>IP</th>
                  <th>Puerto</th>
                  <th>Fecha registro</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- START FOOTER-->
        </div>
      </div>
    </div>
  </div>
</div>