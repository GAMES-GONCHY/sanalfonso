<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Bienvenido</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />

</head>

<body>

	<div class="app-cover"></div>


	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>


	<div id="app" class="app app-header-fixed app-sidebar-fixed app-without-sidebar">

		<div id="header" class="app-header">




			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b class="me-1">Color</b>
					Admin</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>


			<div class="navbar-nav">
				<!-- <div class="navbar-item navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div> -->
				<!-- <div class="navbar-item dropdown">
					<a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
						<i class="fa fa-bell"></i>
						<span class="badge">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-end">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i
										class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted fs-10px">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">John Smith</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="<?php echo base_url(); ?>uploads/usersphoto/perfil.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Olivia</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-plus media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New User Registered</h6>
								<div class="text-muted fs-10px">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-envelope media-object bg-gray-500"></i>
								<i class="fab fa-google text-warning media-object-icon fs-14px"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New Email From John</h6>
								<div class="text-muted fs-10px">2 hour ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;" class="text-decoration-none">View more</a>
						</div>
					</div>
				</div> -->
				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<img src="<?php echo base_url(); ?>uploads/usersphoto/perfil.jpg" alt="" />
						<span>
							<span class="d-none d-md-inline"><?php echo $this->session->userdata('nickName'); ?></span>
							<b class="caret"></b>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<!-- <a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span
								class="badge bg-danger float-end rounded-pill">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a> -->
						<div class="dropdown-divider"></div>
						<a href="javascript:;" id="showAlert" data-bs-toggle="modal" data-bs-target="#modal-dialog" class="dropdown-item">Cerrar sesion</a>
					</div>
				</div>
			</div>

		</div>


		<div id="content" class="app-content">
			<div class="text-center mb-4">
        		<h1 class="page-header">...</h1>
    		</div>
			<div class="row justify-content-center">
				<div class="col-xl-6">

					<div class="panel panel-inverse" data-sortable-id="form-stuff-11">

						<div class="panel-heading">
							<h4 class="panel-title">Usted ha iniciado sesión por primera vez, favor cambiar su contraseña</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
										class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
										class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
										class="fa fa-minus"></i></a>
							</div>
						</div>


						<div class="panel-body">
							<form action="<?php echo base_url(); ?>index.php/usuario/firstlogin" data-parsley-validate="true" method="POST" >
								<fieldset>
									<div class="text-center mb-4">
										<legend class="mb-3">AquaReadPro</legend>	
									</div>
									<div class="row mb-3">
										<label class="form-label col-form-label col-md-3">Contraseña * :</label>
										<div class="col-md-9">
											<input type="password" id="pass1" name="password1" class="form-control" data-parsley-required="true" minlength="5" maxlength="20" placeholder="Contraseña" />
										</div>
									</div>
									<div class="row mb-3">
										<label class="form-label col-form-label col-md-3">Confirmar contraseña * :</label>
										<div class="col-md-9">
											<input type="password" data-parsley-equalto="#pass1" id="pass2" name="password2" class="form-control" data-parsley-required="true" minlength="5" maxlength="20" placeholder="Confirmar contraseña" />
										</div>
									</div>
									<div class="row">
										<div class="col-md-7 offset-md-3">
											<button type="submit" class="btn btn-primary w-100px me-5px">Guardar</button>
											<button type="submit" class="btn btn-default w-100px ">Cancelar</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>

					</div>

				</div>

			</div>


			<!-- boton de regreso -->
			<!-- <p>
				<a href="javascript:history.back(-1);" class="btn btn-success">
					<i class="fa fa-arrow-circle-left"></i> Back to previous page
				</a>
			</p> -->
		</div>

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top"
			data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

	</div>

	<!-- jQuery primero -->
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/jquery.min.js"></script>

	<!-- Scripts principales -->
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

	<!-- Forms validation -->
	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
  	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/messages.es.js"></script>

	<!-- Sweets alerts/Modals scripts -->
	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  	<script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>


	<!-- Forms validation -->
	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
  	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/parsley.es.min.js"></script>
  	<script>
        // Configura Parsley para usar el idioma español
        Parsley.addMessages('es', {
            defaultMessage: "Este valor parece ser inválido.",
            type: {
                email:        "Este valor debe ser una dirección de correo electrónico válida.",
                url:          "Este valor debe ser una URL válida.",
                number:       "Este valor debe ser un número válido.",
                integer:      "Este valor debe ser un número entero válido.",
                digits:       "Este valor debe ser un número entero.",
                alphanum:     "Este valor debe ser alfanumérico."
            },
            notblank:       "Este valor no debe estar en blanco.",
            required:       "Este campo es obligatorio.",
            pattern:        "Este valor es incorrecto.",
            min:            "Este valor debe ser mayor o igual a %s.",
            max:            "Este valor debe ser menor o igual a %s.",
            range:          "Este valor debe estar entre %s y %s.",
            minlength:      "Este valor es demasiado corto. Debe contener al menos %s caracteres.",
            maxlength:      "Este valor es demasiado largo. Debe contener %s caracteres o menos.",
            length:         "Este valor debe tener entre %s y %s caracteres.",
            mincheck:       "Debes seleccionar al menos %s opción.",
            maxcheck:       "No puedes seleccionar más de %s opciones.",
            check:          "Debes seleccionar entre %s y %s opciones.",
            equalto:        "Este valor debe ser idéntico."
        });

        Parsley.setLocale('es');
    </script>

	<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>

	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');
	</script>

	<!-- Sweet alart cierre de sesión -->
	<script>
    $(document).ready(function() {
      $('#showAlert').on('click', function() {
        swal({
          title: '¿Está seguro de salir?',
          icon: 'success',
          buttons: {
            cancel: {
              text: 'Cancelar',
              value: null,
              visible: true,
              className: 'btn btn-success',
              closeModal: true,
            },
            confirm: {
              text: 'Confirmar',
              value: true,
              visible: true,
              className: 'btn btn-danger',
              closeModal: true
            }
          }
        }).then((result) => {
          if (result) {
            // Acción a realizar cuando el usuario confirma
            swal({
              title: 'Has confirmado salir',
              icon: 'success',
              buttons: false, // Oculta el botón de confirmación
              timer: 2000 // Duración en milisegundos
            });
            window.location.href = '<?php echo base_url(); ?>index.php/usuario/logout';
          }
        });
      });
    });
  </script>




	<!-- <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
		data-cf-settings="f16c081c8d85661a9325d769-|49" defer=""></script> -->
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js"
		data-cf-beacon='{"rayId":"66b2298e982c21bb","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>


<!-- sweet alert agragar usuario -->
<script>
  $(document).ready(function() {
      <?php if ($this->session->flashdata('mensaje')): ?>
          var alertType = '<?php echo $this->session->flashdata('alert_type'); ?>';
          var mensaje = '<?php echo $this->session->flashdata('mensaje'); ?>';
          
          swal({
              title: alertType === 'success' ? 'Éxito' : 'Error',
              icon: alertType === 'success' ? 'success': 'error',
              text: mensaje,
              type: alertType, // 'success', 'error', 'warning'
              buttons: false,
              timer: 2000,
              showConfirmButton: true
          }).then(function() {
              <?php if ($this->session->flashdata('alert_type') === 'success'): ?>
                  //window.location.href = '<?php echo base_url(); ?>index.php/crudusers/agregar';
              <?php endif; ?>
          });
      <?php endif; ?>
  });
</script>

</body>

</html>