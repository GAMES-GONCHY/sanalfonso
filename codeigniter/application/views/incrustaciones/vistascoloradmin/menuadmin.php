<div class="navbar-header">
    <a href="#" class="navbar-brand">
        <span class="navbar-logo"></span> <b>Aqua</b>ReadPro <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" alt="" width="50" />
    </a>
    
    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>


<div class="navbar-nav">
    <div class="navbar-item navbar-user dropdown">
        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
        <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';" width="50" height="50">
            <span>
                <span class="d-none d-md-inline"><?php echo $this->session->userdata('nickName'); ?></span>
                <b class="caret"></b>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end me-1">
            <a href="<?php echo base_url(); ?>index.php/crudusers/editarperfil" class="dropdown-item">Editar Perfil</a>
            <!-- <a href="javascript:;" class="dropdown-item"><span class="badge bg-danger float-end rounded-pill">3</span> Mensajes</a>
            <a href="javascript:;" class="dropdown-item">Calendario</a>
            <a href="javascript:;" class="dropdown-item">Configuraciones</a> -->
            <div class="dropdown-divider"></div>

            <a href="javascript:;" id="showAlert" data-bs-toggle="modal" data-bs-target="#modal-dialog" class="dropdown-item">Cerrar sesion</a>
        </div>
    </div>
    
    


</div>

</div>





<!-- MENU SIDEBAR -->
<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';">
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <?php echo ($this->session->userdata('nombre')) . " " . $this->session->userdata('primerApellido') . " " . $this->session->userdata('segundoApellido'); ?>
                            </div>
                            <div class="menu ms-auto"></div>
                        </div>
                        <small>
                            <?php if ($this->session->userdata('rol') == 0) : ?>
                                Socio
                            <?php elseif ($this->session->userdata('rol') == 1) : ?>
                                Auxiliar
                            <?php else : ?>
                                Administrador
                            <?php endif; ?>
                        </small>
                    </div>
                </a>
            </div>
            <!-- <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Configuraciones</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text">Enviar mensajes</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text">Ayuda</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div> -->

            <div class="menu-header">Menú de navegación</div>

            <!-- Reportes -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'usuario' || $this->uri->segment(1) === 'reporte') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-th-large"></i></div>
                    <div class="menu-text">Reportes</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <!-- Submenú de Dashboard para 'usuario/panel' -->
                    <div class="menu-item <?php echo ($this->uri->segment(1) === 'usuario' && $this->uri->segment(2) === 'panel') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/usuario/panel'); ?>" class="menu-link">
                            <div class="menu-text">Dashboard</div>
                        </a>
                    </div>

                    <!-- Submenú de Reportes para 'reporte/historialpagos' -->
                    <div class="menu-item <?php echo ($this->uri->segment(1) === 'reporte' && $this->uri->segment(2) === 'historialpagos') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/reporte/historialpagos'); ?>" class="menu-link">
                            <div class="menu-text">Generar Reportes</div>
                        </a>
                    </div>
                </div>
            </div>


           <!-- Usuarios -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'crudusers' && $this->uri->segment(2) === 'habilitados') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-users"></i></div>
                    <div class="menu-text">Usuarios</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <!-- Gestionar Administradores -->
                    <div class="menu-item <?php echo ($this->uri->segment(3) === '2') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/crudusers/habilitados/2'); ?>" class="menu-link">
                            <div class="menu-text">Gestionar Administradores</div>
                        </a>
                    </div>

                    <!-- Gestionar Socios -->
                    <div class="menu-item <?php echo ($this->uri->segment(3) === '0') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/crudusers/habilitados/0'); ?>" class="menu-link">
                            <div class="menu-text">Gestionar Socios</div>
                        </a>
                    </div>
                </div>
            </div>


            <!-- Geolocalización -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'geodatalogger') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-map-marker"></i></div>
                    <div class="menu-text">Geolocalización</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item <?php echo ($this->uri->segment(2) === 'visualizar') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/geodatalogger/visualizar'); ?>" class="menu-link">
                            <div class="menu-text">Vista general</div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Dispositivos -->
            <div class="menu-item <?php echo ($this->uri->segment(1) === 'datalogger' && $this->uri->segment(2) === 'habilitados') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('index.php/datalogger/habilitados'); ?>" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-microchip"></i></div>
                    <div class="menu-text">Datalogger</div>
                </a>
            </div>

            <div class="menu-item <?php echo ($this->uri->segment(1) === 'medidor' && $this->uri->segment(2) === 'habilitados') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('index.php/medidor/habilitados'); ?>" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-tachometer-alt"></i></div>

                    <div class="menu-text">Medidores</div>
                </a>
            </div>

            <!-- Tarifa -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'tarifa') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-dollar-sign"></i></div>


                    <div class="menu-text">Tarifas</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item <?php echo ($this->uri->segment(2) === 'habilitados') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/tarifa/habilitados'); ?>" class="menu-link">
                            <div class="menu-text">Historial de tarifas</div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Lecturas -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'lecturadl') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <!-- <div class="menu-icon"><i class="fa fa-list-ol"></i></div> -->
                    <div class="menu-icon"><i class="fa fa-broadcast-tower"></i></div>
                    <div class="menu-text">Lecturas</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <!-- Opción Ver en Tiempo Real -->
                    <div class="menu-item <?php echo ($this->uri->segment(2) === 'actualizarlecturas') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/lecturadl/actualizarlecturas/0'); ?>" class="menu-link">
                            <div class="menu-text">Monitoreo en tiempo real</div>
                        </a>
                    </div>

                    <!-- Opción Ver Último Registro -->
                    <div class="menu-item <?php echo ($this->uri->segment(2) === 'mostrarlectura') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/lecturadl/mostrarlectura'); ?>" class="menu-link">
                            <div class="menu-text">Historial</div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Avisos de Cobranza -->
            <div class="menu-item has-sub <?php echo ($this->uri->segment(1) === 'avisocobranza') ? 'active' : ''; ?>">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-file-invoice"></i></div>

                    <div class="menu-text">Avisos de cobranza</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item <?php echo ($this->uri->segment(2) === 'gestion') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('index.php/avisocobranza/gestion'); ?>" class="menu-link">
                            <div class="menu-text">Gestionar Avisos</div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>
    </div>
</div>

<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END MENU SIDEBAR -->