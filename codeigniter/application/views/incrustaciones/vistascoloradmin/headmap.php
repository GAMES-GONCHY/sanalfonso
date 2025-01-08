<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Color Admin | Google Map</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />
	<style>
	.modal-backdrop {
		background-color: rgba(0, 0, 0, 0.1); /* Ajusta el último valor para mayor o menor opacidad */
		z-index: 1040;
		pointer-events: none;
	}
	#google-map-default {
		width: 100%;
		height: 100vh; /* Establece la altura para llenar la ventana */
		min-height: 400px; /* Tamaño mínimo para evitar problemas de renderización */
	}
	</style>
	<!-- estilo para cambiar el color de letra de formularios de agragar usuarios -->
	<style>
	form#form-add-user label {
		color: white !important;
	}
	</style>
</head>

<body>

	<div class="aapp-cover new-background "></div>


	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>


	<div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">

		<div id="header" class="app-header app-header-show-bg">