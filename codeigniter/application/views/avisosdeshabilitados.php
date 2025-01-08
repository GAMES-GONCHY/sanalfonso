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
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/avisocobranza/deshabilitados" class="nav-link <?php echo (current_url() == base_url() . 'index.php/avisocobranza/deshabilitados') ? 'active' : ''; ?>">Eliminados</a>
        </li>
    </ul>


  <!-- <div class="tab-content"> -->
    <!-- Tabla de Pendientes -->
    <!-- <div class="tab-pane fade active show" id="nav-pills-tab-1"> -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h4 class="panel-title">Avisos Eliminados</h4>
                        </div>
                        <div class="panel-body">
                            <table id="pendientes" class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Codigo Socio</th>
                                        <th>Socio</th>
                                        <th>Consumo (m³)</th>
                                        <th>Periodo</th>
                                        <th>Lectura Anterior</th>
                                        <th>Fecha Lectura Anterior</th>
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Fecha Eliminación</th>
                                        <th>Restaurar:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont = 1;
                                    foreach ($deshabilitados as $deshabilitado) {
                                        $consumo = $deshabilitado['lecturaActual'] - $deshabilitado['lecturaAnterior'];


                                        if($consumo<10)//si el consumo es menor q 10 m3 aplicar tarifado mínimo
                                        {
                                            $total = $deshabilitado['tarifaMinima'];
                                        }
                                        else
                                        {
                                            $total = $deshabilitado['tarifaVigente'] * $consumo;
                                        }

                                        // $total = $deshabilitado['tarifaVigente'] * $consumo;
                                        $fechaActualizacion = !empty($deshabilitado['fechaActualizacion']) ? date('Y-m-d', strtotime($deshabilitado['fechaActualizacion'])) : 'Sin Fecha';
                                        $fechaLectura = date('Y-m-d', strtotime($deshabilitado['fechaLectura']));
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $cont; ?></td>
                                        <td><?php echo $deshabilitado['codigoSocio']; ?></td>
                                        <td><?php echo $deshabilitado['nombreSocio']; ?></td>
                                        <td><?php echo $consumo ;?> m³</td>
                                        <td><?php echo $fechaLectura ;?></td>
                                        <td><?php echo ($deshabilitado['lecturaAnterior'])*100; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($deshabilitado['fechaLecturaAnterior'])); ?></td>
                                        
                                        <td><?php echo $deshabilitado['tarifaVigente']; ?></td>
                                        <td><?php echo number_format($total, 2); ?></td>
                                        <td><?php echo $fechaActualizacion
                                        ; ?></td>
                                        <td>
                                            <?php echo form_open_multipart("avisocobranza/revisarbd"); ?>
                                                <input type="hidden" name="id" value="<?php echo $deshabilitado['idAviso']; ?>">
                                                <input type="hidden" name="estado" value="enviado">
                                                <input type="hidden" name="tab" value="deshabilitados">
                                                <button type="submit" class="btn btn-success btn-sm" title="Restaurar">
                                                    <i class="fas fa-recycle"></i> <!-- Ícono de reciclaje para restauración -->
                                                </button>
                                            <?php echo form_close(); ?>
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
                                        <th>Lectura Anterior</th>
                                        <th>Fecha Lectura Anterior</th>
                                        <th>Tarifa Aplicada [Bs/m3]</th>
                                        <th>Total [Bs.]</th>
                                        <th>Fecha Eliminación</th>
                                        <th>Restaurar:</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div> -->



