<!-- START PAGE CONTENT -->
		<div id="content" class="app-content">
			<h1 class="page-header mb-3">Bienvenido 
				<?php if ($this->session->userdata('rol') == 0) : ?>
					Socio
				<?php elseif ($this->session->userdata('rol') == 1) : ?>
					Auxiliar
				<?php else : ?>
					Administrador
				<?php endif; ?>
			</h1>



			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card border-0 mb-3 overflow-hidden">
						<div class="card-body">
							<div class="row">
								<!-- Sección de información del consumo -->
								<div class="col-xl-7 col-lg-8">
									<div class="d-flex mb-1">
										<h2 class="mb-0 text-white">
											<b>Consumo:</b>
											<span data-animation="number" data-value="<?php echo number_format($consumo['consumo'], 2); ?>">0.00</span> [m3]
										</h2>
									</div>
									<div class="mb-3">
										<i class="fa fa-caret-up"></i>
										<span data-animation="number" data-value=""></span>
										<?php
											if (!empty($consumo['fechaLectura'])) {
												try {
													$fecha = new DateTime($consumo['fechaLectura']);
													$formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'MMMM yyyy');
													echo ucfirst($formatter->format($fecha));
												} catch (Exception $e) {
													echo "Fecha no disponible";
												}
											} else {
												echo "Fecha no disponible";
											}
										?>
									</div>
									<hr class="bg-white-transparent-5" />
									
									<!-- Sección de información de pagos -->
									<div class="row text-truncate text-end">
										<div class="col-12">
											<h2 class="mb-0 text-white">
												<b>Recaudado:</b>
												<span data-animation="number" data-value="<?php echo number_format($consumo['pago'], 2); ?>">0.00</span> [Bs.]
											</h2>
											<i class="fa fa-caret-up"></i>
											<?php
												if (!empty($consumo['fechaLectura'])) {
													try {
														$fecha = new DateTime($consumo['fechaLectura']);
														echo ucfirst($formatter->format($fecha));
													} catch (Exception $e) {
														echo "Fecha no disponible";
													}
												} else {
													echo "Fecha no disponible";
												}
											?>
										</div>
									</div>
								</div>

								<!-- Imagen ilustrativa -->
								<div class="col-xl-5 col-lg-4 d-flex align-items-center justify-content-center">
									<img src="<?php echo base_url(); ?>coloradmin/assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>




			<div class="row" style="display: flex;">
				<div class="col-xl-6 col-lg-6" style="flex: 1; display: flex; flex-direction: column; color: white;">
					<!-- GRAFICO CONSUMO VS TIEMPO -->
					<div class="card border-0 mb-3" style="flex: 1; display: flex; flex-direction: column; color: white;">
						<div class="card-body">
							<div class="mb-3" style="color: white;"><b>CONSUMO VS TIEMPO</b><br><br> [m3] VS [mes]</div>
						</div>
						<div class="card-body p-0" style="flex-grow: 1;">
							<div id="consumoBarChart" class="widget-chart-full-width" style="height: 100%;"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6" style="flex: 1; display: flex; flex-direction: column; color: white;">
					<!-- GRAFICO PAGOS VS TIEMPO -->
					<div class="card border-0 mb-3" style="flex: 1; display: flex; flex-direction: column; color: white;">
						<div class="card-body">
							<div class="mb-3" style="color: white;"><b>PAGOS VS TIEMPO</b><br><br> [Bs] VS [mes]</div>
						</div>
						<div class="card-body p-0" style="flex-grow: 1;">
							<div id="pagosBarChart" class="widget-chart-full-width" style="height: 100%;"></div>
						</div>
					</div>
				</div>
			</div>


<!-- END PAGE CONTENT -->
