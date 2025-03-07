
<!-- START CONTENT PAGE -->
<div id="content" class="app-content">

  <div class="container mt-4">

    

    <!-- Contenedor para centrar las tarjetas -->
    <div class="d-flex justify-content-left mb-4 w-100">
      <div class="d-inline-flex" style="gap: 0;">
        <!-- Botón "Registrar" -->
        <div class="card text-center shadow-sm" style="width: 7rem; margin: 0;"> <!-- Reduce el ancho aquí -->
          <div class="card-body" style="padding: 5px;"> <!-- Reduce el padding aquí -->
            <!-- Cambia este enlace para que abra el modal -->
            <a href="javascript:void(0);" id="btnAgregarTarifa" data-bs-toggle="modal" 
              data-bs-target="#modalNuevaTarifa" 
              class="text-success text-decoration-none hover-registrar"
              style="display: block; padding: 5px; border-radius: 8px; transition: 0.3s;">
                <i class="fas fa-plus-circle fa-lg mb-1"></i><br> <!-- Cambia el tamaño del icono a fa-lg -->
            </a>
          </div>
        </div>

        <!-- Botón "Tarifas Eliminadas" -->
          <div class="card text-center shadow-sm" style="width: 7rem; margin: 0;">
            <div class="card-body" style="padding: 5px;"> <!-- Reduce el padding aquí -->
                <a href="javascript:void(0);" id="btnVerEliminadas"
                  class="text-danger text-decoration-none hover-eliminados" 
                  style="display: block; padding: 5px; border-radius: 8px; transition: 0.3s;">
                    <i class="fas fa-trash-restore fa-lg mb-1"></i><br> <!-- Cambia el tamaño del icono a fa-lg -->
                </a>
            </div>
        </div>
      </div>
    </div>
    <!-- Mensajes de éxito y error -->
    <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
    <?php endif; ?>
                  
    <!-- Botón de volver (se oculta por defecto) -->
    <button id="btnVolver" class="btn btn-primary mb-3" style="display: none;">
        <i class="fas fa-arrow-left"></i> Volver
    </button>
    <!-- Fin de mensajes de éxito y error -->
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
          <h4 class="panel-title" id="tituloTarifas">Gestionar Tarifas</h4>
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
                        <th>Tarifa vigente [Bs.]</th>
                        <th>Tarifa mínima</th>
                        <!-- <th>Inicio de vigencia</th> -->
                        <th>Modificar</th>
                        <!-- <th>Eliminar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cont = 1;
                    foreach ($tarifas->result() as $row) {
                    ?>
                        <tr id="row_<?php echo $row->idTarifa; ?>" style="text-align: center;"><!-- Agregar ID único a la fila -->
                            <td><?php echo $cont ?></td>
                            <td><?php echo $row->tarifaVigente ?></td>
                            <td><?php echo $row->tarifaMinima ?></td>
                            <!-- <td><?php echo date('Y-m-d', strtotime($row->fechaInicioVigencia)); ?></td> -->
                            <td>
                                <button type="button" class="btn btn-info btn-sm btnModificar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalModificarTarifa"
                                    onclick="cargarDatos(<?php echo $row->idTarifa; ?>, '<?php echo $row->tarifaVigente; ?>', '<?php echo $row->tarifaMinima; ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>

                            </td>
                            <!-- <td>
                                <div class="btn-group" role="group">
                                    <?php echo form_open_multipart("tarifa/deshabilitar"); ?>
                                    <input type="hidden" name="id" value="<?php echo $row->idTarifa; ?>">
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
                        <th width="1%">No.</th>
                        <th>Tarifa vigente [Bs.]</th>
                        <!-- <th>Inicio de vigencia</th> -->
                        <th>Tarifa mínima</th>
                        <th>Modificar</th>
                        <!-- <th>Eliminar</th> -->
                    </tr>
                </tfoot>
              </table>

          </div>
        </div>
      </div>
    </div>
  
 



   

      


  </div> <!-- FIN del contenedor #content -->
