<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
  <!-- Fila de botones con widgets -->
  <div class="row mb-4">
    <!-- Button 1: Historial de Consumos -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="consumos" data-title="Historial de Consumos" class="table-booking">
        <div class="widget widget-stats bg-gradient-cyan-blue">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-tint fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">HISTORIAL DE CONSUMOS</div>
            <div class="stats-number">0.00 [m3]</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 100.0%;"></div>
            </div>
            <div class="stats-desc">Periodo: No disponible</div>
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
            <div class="stats-number">0.00 [Bs.]</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
            <div class="stats-desc">Periodo: No disponible</div>
          </div>
        </div>
      </a>
    </div>

    <!-- Button 4: Historial de Avisos vencidos -->
    <div class="col-xl-3 col-md-6">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalPosBooking" data-reporte="avisos" data-title="Historial de Avisos Vencidos" class="table-booking">
        <div class="widget widget-stats bg-gradient-green">
          <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-circle fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">AVISOS VENCIDOS</div>
            <div class="stats-number" id="totalVencidosRechazados">0</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 0%;"></div>
            </div>
            <div class="stats-desc">(0%). Del total</div>
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
            <div class="stats-number">(1) <span style="color: gold; font-size: 14px;">Sin información</span></div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 100.0%;"></div>
            </div>
            <div class="stats-desc">Periodo: No disponible</div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Tabla de Reportes -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-xl-12">
        <div class="panel panel-inverse">
          <div class="panel-heading d-flex justify-content-between align-items-center">
            <!-- Botón para Generar PDF -->
            <a id="generarPDFBtn" class="btn btn-xs btn-success">
              <i class="fa fa-file-pdf"></i> Generar PDF
            </a>
          </div>
          <div class="panel-body">
            <table id="datatable" class="table table-hover table-striped align-middle" style="text-align: center;">
              <thead>
                <tr>
                  <th width="1%">No.</th>
                  <th>Socio</th>
                  <th>Código</th>
                  <th>Mes - Año</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <th width="1%">No.</th>
                  <th>Socio</th>
                  <th>Código</th>
                  <th>Mes - Año</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
