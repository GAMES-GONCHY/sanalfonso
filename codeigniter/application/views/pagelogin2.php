<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>AquaReadPrO</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />


	<link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />
	<style>
  .image-hover-combined 
  {
    transition: transform 0.8s ease, opacity 0.7s ease;
  }

  .image-hover-combined:hover 
  {
    transform: scale(1.3);
    opacity: 0.4;
  }
</style>
</head>

<body class='pace-top'>

	<div class="app-cover"></div>


	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>


	<div id="app" class="">

		<div class="login login-v2 fw-bold">

			<div class="login-cover">
				<div class="login-cover-img" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-13.jpg)"
					data-id="login-cover-image"></div>
				<div class="login-cover-bg"></div>
			</div>


			<div class="login-container">

				<div class="login-header">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span> <b>Aqua</b> ReadPrO
						</div>
						<h6> Telemetría inteligente para control preciso del agua</h6>
					</div>
					<div class="icon">
						<span><img src="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/logo13.png" alt="Imagen con efecto hover combinado" class="image-hover-combined" height="108"></span>
					</div>
				</div>


				<div class="login-content">

					<?php
					echo form_open_multipart("usuario/validarusuario");
					?>
					<?php if ($error = $this->session->flashdata('error')) : ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>
					<div class="form-floating mb-20px">
						<input type="text" class="form-control fs-13px h-45px border-0" name="nickname" placeholder="Nickname" id="nickName" autocomplete="off" />
						<label for="nickName" class="d-flex align-items-center text-gray-300 fs-13px">Nickname</label>
					</div>
					<div class="form-floating mb-20px">
						<input type="password" name="password" class="form-control fs-13px h-45px border-0" placeholder="Password" autocomplete="new-password" />
						<label for="password" name="password" class="d-flex align-items-center text-gray-300 fs-13px">Contraseña</label>
					</div>
					<!-- <div class="form-check mb-20px">
						<input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe" />
						<label class="form-check-label fs-13px text-gray-500" for="rememberMe">
							Recordar
						</label>
					</div> -->
					<div class="mb-20px">
						<button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Iniciar sesión</button>
					</div>
					<!-- <div class="text-gray-400">
						<h7>No tienes una cuenta aún? Solicita una</h7> <a href="https://mail.google.com/mail/u/0/#inbox:;" class="text-white">aqui.</a>
					</div> -->
					<?php
					echo form_close();
					?>
				</div>

			</div>

		</div>


		<div class="login-bg-list clearfix">
			<div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-13.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-13.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/coming-soon.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/coming-soon.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-16.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-16.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-15.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-15.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-14.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-14.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-12.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-12.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-3-thumb.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-3-thumb.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-11.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-11.jpg)"></a></div>
			<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-1-thumb.jpg" style="background-image: url(<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-1-thumb.jpg)"></a></div>
		</div>

		



		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

	</div>

	<script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

	<script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/login-v2.demo.js"></script>

	<script type="b59459780534ecad3c37b6ce-text/javascript">
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
	<!-- <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="b59459780534ecad3c37b6ce-|49" defer=""></script> --> -->
	<!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66b229bb1b4421bb","version":"2021.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script> -->

	 <!-- Script para anular el comportamiento del scroll -->
	 <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.style.overflow = 'hidden'; // Desactiva el scroll en todo el cuerpo
    });
</script>
</body>

</html>