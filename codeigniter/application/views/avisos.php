<!-- START PAGE CONTENT -->
<div id="content" class="app-content">

    <h1 class="page-header">Avisos de cobranza<small> AquaReadPro</small></h1>

    <div class="row">
        <div class="col-md-12">
            
            <!-- Buscador de periodos -->
            <!-- <div class="input-group input-group-lg mb-3">
                <input id="searchInput" type="text" class="form-control input-white" placeholder="Busqueda por periodo..." />
                <button id="searchButton" type="button" class="btn btn-primary"><i class="fa fa-search fa-fw"></i> Buscar</button>
            </div> -->

            <div class="d-block d-md-flex align-items-center mb-3">

                <div class="d-flex">
					<div class="dropdown me-2" id="dropdown-avisos">
						<a href="#" id="filterButton" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" data-status="enviado">
							Filtrar por<b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-start" role="menu">
							<a href="javascript:;" class="dropdown-item" data-status="enviado">Pendientes</a>
							<a href="javascript:;" class="dropdown-item" data-status="revision">En revisión</a>
							<a href="javascript:;" class="dropdown-item" data-status="pagado">Pagados</a>
							<!-- <a href="javascript:;" class="dropdown-item" data-status="vencido">Vencidos</a> -->
							<!-- <a href="javascript:;" class="dropdown-item" data-status="rechazado">Rechazados</a> -->
						</div>
					</div>
                </div>
            </div>
            <!-- Contenedor de los avisos -->
            <div id="avisos-container">
				<div class="result-list">
					<?php if (!empty($avisos)): ?>
						<?php foreach ($avisos as $aviso): ?>
							<?php
								// Array para traducir los meses del inglés al español
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

								// Verificar si la fecha de lectura está presente y es válida
								if (!empty($aviso['fechaLectura'])) {
									// Crear el objeto DateTime solo si el valor no es nulo o vacío
									$fechaLectura = new DateTime($aviso['fechaLectura']);
									$mes = $meses[$fechaLectura->format('F')];  // Obtener el nombre del mes
									$anio = $fechaLectura->format('Y');  // Obtener el año
									$fechaLectura = $fechaLectura->format('Y/m/d');
									$fechaLecturaAnterior = date('Y-m-d', strtotime($aviso['fechaLecturaAnterior']));
								} else {
									$fechaLectura = null;
									$mes = "Mes no disponible"; // Mensaje alternativo si no hay fecha de lectura
								}

								// Calcular el consumo
								// $consumo = ($aviso['lecturaActual'] - $aviso['lecturaAnterior']);
								$consumo = round($aviso['lecturaActual']/100 - $aviso['lecturaAnterior']/100, 2);
								if($consumo<10)//si el consumo es menor q 10 m3 aplicar tarifado mínimo
								{
									$total = $aviso['tarifaMinima'];
								}
								else
								{
									$total = $aviso['tarifaVigente'] * $consumo;
								}
								// $total = $consumo * $aviso['tarifaVigente'];
							?>
							<!-- Agregar correctamente el atributo data-periodo con el mes correspondiente -->
							<div class="result-item" data-periodo="<?php echo $mes; ?>">
								<?php if ($aviso['estado'] == 'enviado' || $aviso['estado'] == 'vencido' || $aviso['estado'] == 'rechazado'): ?>
										<!-- Enlace para abrir el modal -->
										<a href="#" class="result-image" style="background-image: url('<?php echo base_url('uploads/qr/' . $qrmax); ?>')" 
											data-bs-toggle="modal" 
											data-bs-target="#qrModal" 
											onclick="cargarImagenModal('<?php echo base_url('uploads/qr/' . $qrmax); ?>', 
																	'<?php echo $aviso['codigoSocio']; ?>',
																	'<?php echo $aviso['fechaLectura']; ?>',
																	<?php echo $aviso['idAviso']; ?>,
																	'<?php echo !empty($aviso['saldo']) ? $aviso['saldo'] : ''; ?>',
																	'<?php echo $aviso['estado']; ?>')">
										</a>

								<?php else: ?>
									<!-- Enlace inactivo si el estado no es 'enviado' o 'vencido' -->
									<a href="#" class="result-image" style="background-image: url('<?php echo base_url('uploads/qr/' . $qrmax); ?>')" 
									style="pointer-events: none; opacity: 0.5;">
									</a>
								<?php endif; ?>
								<div class="result-info" style="color: white;">
									<h3 class="desc" style="line-height: 0.5;">Periodo: <?php echo $mes.'-'.$anio; ?></h3>
									<h3 class="desc" style="line-height: 0.5;">Consumo: <?php echo $consumo; ?> m³</h3>
									<h3 class="desc" style="line-height: 0.5;">Tarifa Vigente: <?php echo $aviso['tarifaVigente']; ?> Bs.</h3>

									<!-- <h4 class="desc" style="line-height: 1.2;">Fecha Vencimiento: <?php echo $aviso['fechaVencimiento']; ?></h4> -->
									<h3 class="desc" style="line-height: 0.5;">
										<?php if ($aviso['estado'] == 'pagado'): ?>
											Fecha de Pago: <?php echo date('d-m-Y', strtotime($aviso['fechaPago'])); ?>
										<?php else: ?>
											Fecha de Vencimiento: <?php echo date('d-m-Y', strtotime($aviso['fechaVencimiento'])); ?>
										<?php endif; ?>
									</h3>
									<!-- <h3 class="desc" style="line-height: 0.5;">
										Estado: <?php echo ($aviso['estado'] == 'revision') ? 'Revisión' : ucfirst($aviso['estado']); ?>
									</h3> -->
									<?php
										$estado = $aviso['estado'];
										$estadoClase = '';

										// Determinar la clase según el estado
										switch ($aviso['estado']) {
											case 'pagado':
												$estadoClase = 'estado-pagado';
												break;
											case 'revision':
												$estadoClase = 'estado-revision';
												break;
											case 'rechazado':
												$estadoClase = 'estado-rechazado';
												break;
											case 'enviado':
												$estadoClase = 'estado-enviado';
												break;
											default:
												$estadoClase = 'estado-vencido';
												break;
										}
									?>
									<h3 class="desc" style="line-height: 0.5;">
										Estado: <span class="estado <?php echo $estadoClase; ?>"><?php echo ucfirst($aviso['estado']); ?></span>
									</h3>
								</div>
								<div class="result-price">
									<?php echo 'Bs. ' . number_format($total, 2); ?>
									<!-- <button 
										type="button" 
										class="table-booking btn btn-yellow d-block w-100" 
										data-bs-toggle="modal" 
										data-bs-target="#modalPosBooking"
										onclick="cargarDatos('<?php echo $aviso['codigoSocio']; ?>',
											'<?php echo $aviso['nombreSocio']; ?>',
											'<?php echo $mes; ?>',
											'<?php echo $consumo; ?>',
											'<?php echo ($aviso['lecturaActual']*100); ?>',
											'<?php echo ($aviso['lecturaAnterior']*100); ?>',
											'<?php echo $fechaLectura; ?>',
											'<?php echo $fechaLecturaAnterior; ?>',
											'<?php echo $aviso['tarifaVigente']; ?>',
											'<?php echo $aviso['tarifaMinima']; ?>',
											'<?php echo number_format($total, 2); ?>',
											'<?php echo $aviso['fechaVencimiento']; ?>',
											'<?php echo ($aviso['estado'] == 'enviado') ? 'Pendiente' : $aviso['estado']; ?>',
											'<?php echo $aviso['fechaPago']; ?>',
											<?php echo $aviso['saldo']; ?>)">
										Detalle
									</button> -->
									<button 
										type="button" 
										class="table-booking btn btn-yellow d-block w-100" 
										onclick="generarPDF('<?php echo $aviso['codigoSocio']; ?>',
															'<?php echo $aviso['nombreSocio']; ?>',
															'<?php echo $aviso['codigoMedidor']; ?>',
															'<?php echo $aviso['codigoDatalogger']; ?>',
															'<?php echo $aviso['lecturaActual']; ?>',
															'<?php echo $aviso['lecturaAnterior']; ?>',
															'<?php echo $aviso['fechaLectura']; ?>',
															'<?php echo $aviso['fechaLecturaAnterior']; ?>',
															'<?php echo $aviso['tarifaVigente']; ?>',
															'<?php echo $aviso['tarifaMinima']; ?>',
															'<?php echo $aviso['fechaVencimiento']; ?>',
															'<?php echo $aviso['estado']; ?>',
															'<?php echo $aviso['fechaPago']; ?>',
															<?php echo $aviso['saldo']; ?>)">
										Ver Detalle
									</button>
								</div>

							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>No hay avisos disponibles.</p>
					<?php endif; ?>
				</div>
			</div>
    </div>
