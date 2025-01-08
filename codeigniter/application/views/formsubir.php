<!-- PAGE CONTENT -->
<div id="content" class="app-content">

	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<!-- <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li> -->
		<li class="breadcrumb-item active">Subir foto perfil</li>
	</ol>


	<h1 class="page-header">Cargue su foto de perfíl Aqui</h1>


	<form id="fileupload" action="<?php echo base_url(); ?>index.php/crudusers/subir" method="POST" enctype="multipart/form-data">
	<input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" >
	<input type="hidden" class="form-control" name="rol" value="<?php echo $rol; ?>" >
		<div class="panel panel-inverse">

			<div class="panel-heading">
				<h4 class="panel-title">
					Soporte de archivos
					<b class="badge d-inline-flex align-items-center p-0 ms-1">
						<i class="fa fa-circle fa-fw fs-6px text-blue me-1"></i>
						<i class="fa fa-circle fa-fw fs-6px text-cyan me-1"></i>
						<i class="fa fa-circle fa-fw fs-6px text-teal"></i>
					</b>
				</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
					<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a> -->
				</div>
			</div>

			<div class="alert alert-primary rounded-0 d-flex align-items-center mb-0 text-black">
				<div class="fs-24px w-80px text-center">
					<i class="fa fa-lightbulb fa-2x"></i>
				</div>
				<div class="flex-1 ms-3">
					<h4>Advertencia</h4>
					<ul class="ps-3">
						<li>El tamaño máximo de archivo para cargas en esta demostración es de <strong>5 MB</strong> (el tamaño de archivo predeterminado es ilimitado).</li>
						<li>Solo se permiten archivos de imagen (<strong>JPG, GIF, PNG</strong>) en esta demostración (por defecto, no hay restricción de tipo de archivo).</li>
						<li>Los archivos cargados se eliminarán automáticamente después de <strong>5 minutos</strong> (configuración de demostración).</li>
					</ul>
				</div>
			</div>

			<div class="panel-body">
				<div class="row fileupload-buttonbar">
					<div class="col-xl-7">
						<span class="btn btn-primary fileinput-button me-1">
							<i class="fa fa-fw fa-plus"></i>
							<span>Agregar archivos...</span>
							<input type="file" name="userfile" multiple>
						</span>
						<button type="submit" class="btn btn-primary start me-1">
							<i class="fa fa-fw fa-upload"></i>
							<span>Subir</span>
						</button>
						
							<!-- <button type="reset" class="btn btn-default cancel me-1">
								<i class="fa fa-fw fa-ban"></i>
								<span>Cancelar</span>
							</button> -->
						
						<button type="button" class="btn btn-default cancel me-1" onclick="window.history.back();">
							<i class="fa fa-fw fa-ban"></i>
							<span>Cancelar</span>
						</button>

						<!-- <button type="button" class="btn btn-default delete me-1">
							<i class="fa fa-fw fa-trash"></i>
							<span>Eliminar</span>
						</button> -->
						<span class="fileupload-process"></span>
					</div>

					<div class="col-xl-5 fileupload-progress fade d-none d-xl-block">

						<div class="progress progress-striped active">
							<div class="progress-bar progress-bar-success" style="width:0%;"></div>
						</div>

						<div class="progress-extended">&nbsp;</div>
					</div>
				</div>
			</div>


			<!-- <div class="table-responsive">
				<table class="table table-panel text-nowrap mb-0">
					<thead>
						<tr>
							<th width="10%">PREVISUALIZACIÓN</th>
							<th>INFO</th>
							<th>PROGRESO</th>
							<th width="1%"></th>
						</tr>
					</thead>
					<tbody class="files">
						<tr data-id="empty">
							<td colspan="4" class="text-center text-gray-500 py-30px">
								<div class="mb-10px"><i class="fa fa-file fa-3x"></i></div>
								<div class="fw-bold">No hay archivos seleccionados</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div> -->

		</div>

	</form>





<!-- VERIFICAR Q SECCION ES -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
</div>
<!-- VERIFICAR -->