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
              <th>Código Socio</th>
              <th>Socio</th>
              <th>CI</th>
              <th>Fecha Lectura</th>
              <th>Ingresar Lectura</th>
            </tr>
          </thead>
          <tbody id="lecturas-body">
            <?php
            $cont = 1;
            $meses = [
              'Jan' => 'Ene', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Abr',
              'May' => 'May', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Ago',
              'Sep' => 'Sep', 'Oct' => 'Oct', 'Nov' => 'Nov', 'Dec' => 'Dic'
            ];
            foreach ($lecturas as $lectura) {
              // Verificar si la fecha de lectura está presente y es válida
              if (!empty($lectura['fechaLectura'])) {
                // Crear el objeto DateTime solo si el valor no es nulo o vacío
                $fecha = strtotime($lectura['fechaLectura']);
                $fechaFormateada = date('d', $fecha) . '-' . strtoupper($meses[date('M', $fecha)]) . '-' . date('Y', $fecha);
                
              }
              else
              {
                $fechaFormateada = null;
                $mes = "Mes no disponible"; // Mensaje alternativo si no hay fecha de lectura
              }
            ?>
              <tr>
                <td><?php echo $cont; ?></td>
                <td><?php echo $lectura['lecturaActual']; ?></td>
                <td><?php echo $lectura['lecturaAnterior'] !== null ? $lectura['lecturaAnterior'] : 0; ?></td>
                <td><?php echo $lectura['codigoSocio']; ?></td>
                <td><?php echo $lectura['nombreSocio']; ?></td>
                <td><?php echo $lectura['ci']; ?></td>
                <td><?php echo $fechaFormateada ?></td>
                <td>
                  <button 
                      class="btn btn-success btn-sm mx-1" 
                      data-bs-toggle="modal" 
                      data-bs-target="#modalNuevaLectura"
                      onclick="cargarLectura('<?php echo $fechaFormateada; ?>',
                          <?php echo $lectura['lecturaActual']; ?>,
                          '<?php echo $lectura['codigoSocio']; ?>',
                          '<?php echo $lectura['nombreSocio']; ?>',
                          '<?php echo $lectura['ci']; ?>')">
                      <i class="fas fa-pencil-alt"></i> <!-- Icono de lápiz -->
                  </button>
                </td>
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
              <th>Código Socio</th>
              <th>Socio</th>
              <th>CI</th>
              <th>Fecha Lectura</th>
              <th>Ingresar Lectura</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
