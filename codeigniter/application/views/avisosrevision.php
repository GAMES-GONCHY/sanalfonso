<div id="content" class="app-content">
  <!-- <h1 class="page-header">Avisos de Cobranza</h1> -->

  <!-- Nav Pills para las pestañas de navegación -->
  <ul class="nav nav-pills mb-3">
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/gestion" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/gestion') ? 'active' : ''; ?>">Enviados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/revision" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/revision') ? 'active' : ''; ?>">En revisión</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/pagados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/pagados') ? 'active' : ''; ?>">Pagados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/rechazados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/rechazados') ? 'active' : ''; ?>">Rechazados</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/vencidos" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/vencidos') ? 'active' : ''; ?>">Vencidos</a>
      </li>
      <!-- <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/avisocobranza/deshabilitados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/deshabilitados') ? 'active' : ''; ?>">Eliminados</a>
      </li> -->
  </ul>


  <!-- <div class="tab-content"> -->
    <!-- Tabla de Pendientes -->
    <!-- <div class="tab-pane fade active show" id="nav-pills-tab-1"> -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h4 class="panel-title">Avisos En Resión</h4>
                        </div>
                        <div class="panel-body">
                            <table id="pendientes" class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Codigo Socio</th>
                                        <th>Socio</th>
                                        <th>Consumo (m³)</th>
                                        <th>Periodo</th>
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Fecha Pago QR</th>
                                        <th>Ver Comprobante</th>
                                        <th>Mover a:</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 1;
                                    $meses = [
                                        'January' => 'Enero',
                                        'February' => 'Febrero',
                                        'March' => 'Marzo',
                                        'April' => 'Abril',
                                        'May' => 'Mayo',
                                        'June' => 'Junio',
                                        'July' => 'Julio',
                                        'August' => 'Agosto',
                                        'September' => 'Septiembre',
                                        'October' => 'Octubre',
                                        'November' => 'Noviembre',
                                        'December' => 'Diciembre'
                                    ];
                                    foreach ($revisados as $revisado) {
                                        $consumo = round($revisado['lecturaActual'] - $revisado['lecturaAnterior'],2);
                                        if($consumo<10)//si el consumo es menor q 10 m3 aplicar tarifado mínimo
                                        {
                                            $total = $revisado['tarifaMinima'];
                                            $clasificacion = "Consumo mínimo";
                                        }
                                        else
                                        {
                                            if($consumo>=10 && $consumo<20)
                                            {
                                                $clasificacion = "Consumo moderado";
                                            }
                                            else
                                            {
                                                if($consumo>=20 && $consumo<30)
                                                {
                                                    $clasificacion = "Consumo estándar";
                                                }
                                                else
                                                {
                                                    if($consumo >=30 && $consumo <40)
                                                    {
                                                        $clasificacion = "Consumo elevado";
                                                    }
                                                    else
                                                    {
                                                        $clasificacion = "Consumo muy elevado";
                                                    }
                                                }
                                            }
                                            $total = $revisado['tarifaVigente'] * $consumo;
                                        }
                                        // $total = $revisado['tarifaVigente'] * $consumo;
                                        $fechaPago = !empty($revisado['fechaPago']) ? date('d-m-Y', strtotime($revisado['fechaPago'])) : 'Sin Fecha';
                                        $fechaLecturaAnterior = date('d-m-Y', strtotime($revisado['fechaLecturaAnterior']));
                                        $fechaVencimiento = date('d-m-Y', strtotime($revisado['fechaVencimiento']));
                                        // Verificar si la fecha de lectura está presente y es válida
                                        if (!empty($revisado['fechaLectura'])) {
                                            // Crear el objeto DateTime solo si el valor no es nulo o vacío
                                            $fechaLectura = new DateTime($revisado['fechaLectura']);
                                            $mes = $meses[$fechaLectura->format('F')];  // Obtener el nombre del mes
                                            // $anio = $fechaLectura->format('Y');  // Obtener el año
                                            $fechaLectura = $fechaLectura->format('d-m-Y');
                                        }
                                        else
                                        {
                                            $fechaLectura = null;
                                            $mes = "Mes no disponible"; // Mensaje alternativo si no hay fecha de lectura
                                        }
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $cont; ?></td>
                                        <td><?php echo $revisado['codigoSocio']; ?></td>
                                        <td><?php echo $revisado['nombreSocio']; ?></td>
                                        <td><?php echo $consumo; ?> m³</td>
                                        <td><?php echo date('d-m-Y', strtotime($fechaLectura)); ?></td>
                                        <!-- <td><?php echo ($revisado['lecturaActual'])*100; ?></td>
                                        <td><?php echo ($revisado['lecturaAnterior'])*100; ?></td> -->
                                        <td><?php echo $revisado['tarifaVigente']; ?></td>
                                        <td><?php echo number_format($total, 2); ?></td>
                                        <td><?php echo $fechaPago; ?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#comprobanteModal" onclick="cargarImagenModal('<?php echo base_url('uploads/comprobantes/' . trim($revisado['codigoSocio']) . '/' . $revisado['comprobante']); ?>')">
                                                <img 
                                                    src="<?php echo base_url('uploads/comprobantes/' . trim($revisado['codigoSocio']) . '/' . $revisado['comprobante']); ?>" 
                                                    alt="Comprobante" 
                                                    style="max-width: 100%; max-height: 50px; object-fit: cover;">
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo form_open_multipart("avisocobranza/revisarbd", ['class' => 'auto-submit-form']); ?>
                                                <input type="hidden" name="tab" value="revision">
                                                <input type="hidden" name="id" value="<?php echo $revisado['idAviso']; ?>">
                                                <select name="estado" onchange="this.form.submit()" class="form-select form-select-sm" style="color: white; background-color: #333;">
                                                    <option value="" selected disabled>Seleccionar</option>
                                                    <option value="pagado">Pagado</option>
                                                    <option value="rechazado">Rechazado</option>
                                                </select>
                                            <?php echo form_close(); ?>
                                        </td>
                                        <td>
                                            <button 
                                                class="btn btn-success btn-sm mx-1" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalPosBooking1"
                                                onclick="cargarDetalle('<?php echo $revisado['codigoSocio']; ?>',
                                                    '<?php echo $revisado['nombreSocio']; ?>',
                                                    '<?php echo $mes; ?>',
                                                    '<?php echo $consumo; ?>',
                                                    '<?php echo $clasificacion; ?>',
                                                    '<?php echo ($revisado['lecturaActual'])*100; ?>',
                                                    '<?php echo ($revisado['lecturaAnterior'])*100; ?>',
                                                    '<?php echo $fechaLectura; ?>',
                                                    '<?php echo $fechaLecturaAnterior; ?>',
                                                    '<?php echo $revisado['tarifaVigente']; ?>',
                                                    '<?php echo $revisado['tarifaMinima']; ?>',
                                                    '<?php echo number_format($total, 2); ?>',
                                                    '<?php echo $fechaVencimiento; ?>',
                                                    '<?php echo $revisado['estado']; ?>',
                                                    '<?php echo $fechaPago; ?>',
                                                    <?php echo $revisado['saldo']; ?>)">
                                                <i class="fas fa-eye"></i> <!-- Ícono de "ver detalles" -->
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $cont++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Codigo Socio</th>
                                        <th>Socio</th>
                                        <th>Consumo (m³)</th>
                                        <th>Periodo</th>
                                        <!-- <th>Lectura Actual</th>
                                        <th>Lectura Anterior</th> -->
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Ver Comprobante</th>
                                        <th>Fecha Pago QR</th>
                                        <th>Mover a:</th>
                                        <th>Ver</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div> -->



