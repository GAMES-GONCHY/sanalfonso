<!-- START CONTENT PAGE -->
<div id="content" class="app-content">
    <h1 class="page-header">Administradores</h1>

    <div class="container mt-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading d-flex justify-content-between align-items-center">
                        <h4 class="panel-title">Gestionar Administradores</h4>
                    </div>

                    <div class="panel-body">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <a href="#" id="btnVerDeshabilitados" class="btn btn-info btn-lg btn-block text-uppercase font-weight-bold w-100">
                                    VER DESHABILITADOS
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                            <button id="btnAbrirModalAgregar" class="btn btn-success btn-lg btn-block text-uppercase font-weight-bold w-100">
                                Agregar Administrador
                            </button>
                            </div>
                        </div>

                        <table id="datatable" class="table table-hover table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Perfil</th>
                                    <th>Nickname</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>CI</th>
                                    <th>E-mail</th>
                                    <th>Fono</th>
                                    <th>Género</th>
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
                                <!-- <th>Cargar</th> -->
                                <th>Nickname</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>CI</th>
                                <th>E-mail</th>
                                <th>Fono</th>
                                <th>Género</th>
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
</div>