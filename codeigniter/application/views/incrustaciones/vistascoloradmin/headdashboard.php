<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Managed Tables - Extension Combination</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    
    
    <!-- Vendor CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />

    <!-- App CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />





    
    <!-- Dashboard / Apecharts -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/orange.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/lime.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/teal.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/cyan.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/red.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/pink.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/yellow.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/green.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/purple.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/indigo.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/black.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/blue.min.css"> -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />

  

    
    
    <!-- ESTILOS PARA EL POPOVER -->
    <style>
    .popover-body
    {
        color: black; /* Cambia el color del texto dentro del popover a negro */
    }
    .popover-header
    {
        color: black; /* Cambia el color del texto del encabezado a negro */
    }
    </style>

    	<!-- Estilo para cambiar de backgroud -->
	<style>
		.app-cover.new-background 
		{
			background: 
			linear-gradient(rgba(0.5, 0.5, 0.5, 0), rgba(0, 0, 0, 0.7)), /* Capa de oscurecimiento */
			url('<?php echo base_url(); ?>coloradmin/assets/img/login-bg/agua2.png'); /* Nueva imagen */
			background-size: cover; /* Ajusta la imagen al contenedor */
			background-position: center; /* Centra la imagen */
		}
	</style>



</head>

<body>

    <div class="app-cover new-background"></div>


    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>

<!-- START APP HEADER -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed">

        <div id="header" class="app-header">