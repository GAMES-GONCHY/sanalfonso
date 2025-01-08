<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
  <!-- Fila de botones con widgets -->
  <div class="row mb-4">
    <!-- Button 1: Historial de Consumos -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="consumos" data-title="Historial de Comsumos" class="table-booking">
        <div class="widget widget-stats bg-gradient-cyan-blue">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-tint fa-fw"></i></div>

          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE CONSUMOS</div>
            <div class="stats-number"><?php echo number_format($consumo['consumo'], 2); ?> [m3]</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 100.0%;"></div>
            </div>
            <div class="stats-desc">Periodo: <?php echo $top1['fechaLectura'];?></div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 2: Historial de Pagos -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="pagos" data-title="Historial de Pagos" class="table-booking">
        <div class="widget widget-stats bg-gradient-red">
          
          <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE PAGOS</div>
            <div class="stats-number"><?php echo number_format($consumo['pago'], 2); ?> [Bs.]</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
            <div class="stats-desc">Periodo: <?php echo $top1['fechaLectura'];?></div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 4: Historial de Avisos vencidos -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="avisos" data-title="Historial de avisos Vencidos - Rechazados" class="table-booking">
        <div class="widget widget-stats bg-gradient-green">
          <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-circle fa-fw"></i></div>

          <div class="stats-content">
            <div class="stats-title">AVISOS VENCIDOS</div>
            <div class="stats-number" id="totalVencidosRechazados">0</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: <?php echo $porcentaje; ?>%;"></div>
            </div>
            <div class="stats-desc"> (<?php echo $porcentaje; ?>%). Del total</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 5: Top 5 Consumidores -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="ranking" data-title="Ranking Consumidores" class="table-booking">
        <div class="widget widget-stats bg-gradient-purple">
          <div class="stats-icon stats-icon-lg"><i class="fa fa-trophy fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">TOP 5 CONSUMIDORES</div>
            <div class="stats-number">(1) <span style="color: gold; font-size: 14px;"><?php echo trim($top1['socio']); ?></span></div>
            
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 100.0%;"></div>
            </div>
            <div class="stats-desc">Periodo: <?php echo $top1['fechaLectura']; ?></div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Tabla de Reportes -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-warning text-center" role="alert" style="margin-bottom: 20px;">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
              <!-- Botón para Generar PDF -->
            <a id="generarPDFBtn" class="btn btn-xs btn-success">
              <i class="fa fa-file-pdf"></i> Generar PDF
            </a>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
          </div>
          <div class="panel-body">
            <table id="datatable" class="table table-hover table-striped align-middle" style="text-align: center;">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Socio</th>
                  <th>Código</th>
                  <th>Mes - Año</th>
                  <!-- <th>Total [Bs.]</th>
                  <th>Saldo</th>
                  <th>Estado</th> -->
                </tr>
              </thead>
              <tbody>
                <!-- Aquí puedes incluir el código PHP para generar las filas -->
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th>Socio</th>
                  <th>Código</th>
                  <th>Mes - Año</th>
                  <!-- <th>Total [Bs.]</th>
                  <th>Saldo</th>
                  <th>Estado</th> -->
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
