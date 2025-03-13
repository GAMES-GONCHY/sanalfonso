<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
    <h1 id="tituloPrincipal" class="page-header">Administradores</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading d-flex justify-content-between align-items-center">
                        <h4 id="subtituloPanel" class="panel-title">Gestionar Administradores</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <a href="#" id="btnVerDeshabilitados" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100"  data-rol="<?= $rol; ?>">
                                    VER DESHABILITADOS
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <!-- <button id="btnAbrirModalAgregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                                    Agregar
                                </button> -->
                                <button id="btnAbrirModalAgregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100" data-rol="<?= $rol; ?>">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <table id="datatable" class="table table-hover table-striped align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th width="1%" data-orderable="false">Perfil</th>
                                    <th>Nickname</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>CI</th>
                                    <th>E-mail</th>
                                    <th>Fono</th>
                                    <th>Creado</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se cargarán con AJAX -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th width="1%" data-orderable="false">Perfil</th>
                                    <th>Nickname</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>CI</th>
                                    <th>E-mail</th>
                                    <th>Fono</th>
                                    <th>Creado</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->