<!-- START CONTENT -->
<div id="content" class="app-content">
    <h1 class="page-header">Avisos de cobranza</h1>

    <div class="row">
        <div class="col-md-12">
			<div class="input-group input-group-lg mb-3">
				<!-- Campo de texto para búsqueda -->
				<input type="text" id="search-query" class="form-control input-white" placeholder="Buscar" />

				<!-- Botón para realizar la búsqueda -->
				<button type="button" id="search-button" class="btn btn-primary">
					<i class="fa fa-search fa-fw"></i> Buscar
				</button>

				<!-- Menú desplegable adicional -->
				<!-- <button type="button" class="btn btn-primary dropdown-toggle no-caret" data-bs-toggle="dropdown">
					<i class="fa fa-cog fa-fw"></i>
				</button> -->
				<!-- <div class="dropdown-menu dropdown-menu-end">
					<a href="javascript:;" class="dropdown-item">Action</a>
					<a href="javascript:;" class="dropdown-item">Another action</a>
					<a href="javascript:;" class="dropdown-item">Something else here</a>
					<div class="dropdown-divider"></div>
					<a href="javascript:;" class="dropdown-item">Separated link</a>
				</div> -->
			</div>


            <!-- <div class="d-block d-md-flex align-items-center mb-3">
                <div class="d-flex">
                    <div class="dropdown me-2">
                        <a href="#" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown">
                            Filters by <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-start" role="menu">
                            <a href="javascript:;" class="dropdown-item">Posted Date</a>
                            <a href="javascript:;" class="dropdown-item">View Count</a>
                            <a href="javascript:;" class="dropdown-item">Total View</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item">Location</a>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Contenedor dinámico para los avisos -->
            <div id="result-list" class="result-list">
                <!-- Los datos dinámicos serán cargados aquí -->
            </div>

            <!-- Contenedor para los botones de paginación -->
            <div id="pagination" class="d-flex mt-20px">
                <!-- Los botones de paginación se generarán dinámicamente aquí -->
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
