<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Color Admin | Search Results</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />


  <!-- Vendor CSS -->
  <link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />

  <!-- App CSS -->
  <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />


    <!-- Estilo para cambiar de backgroud -->
    <style>
        .app-cover.new-background 
        {
            background: 
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)), /* Capa de oscurecimiento */
            url('<?php echo base_url(); ?>coloradmin/assets/img/login-bg/fondo3.jpg'); /* Nueva imagen */
            background-size: cover; /* Ajusta la imagen al contenedor */
            background-position: center; /* Centra la imagen */
        }
    </style>

<!-- stilos para modal -->
<style>
.modal-body {
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #212529; /* Color de texto principal oscuro */
}

.modal-title {
    font-size: 22px;
    font-weight: bold;
    color: #2c3e50; /* Un color oscuro y consistente para el título */
}

.table-borderless td {
    padding: 12px 15px;
    vertical-align: middle;
    color: #212529; /* Color oscuro para todo el texto */
}

.table-borderless td:first-child {
    font-weight: bold;
    color: #000; /* Negro para los títulos */
}

.text-secondary {
    color: #495057; /* Un gris más oscuro para los detalles */
}

.fw-bold {
    font-weight: bold;
}

.text-dark {
    color: #343a40;
}

.text-danger {
    color: #dc3545; /* Resalta fechas de vencimiento en rojo */
}

.bg-success {
    background-color: #28a745 !important; /* Color verde para el estado */
    color: white; /* Asegurar que el texto sea blanco en el badge */
    padding: 5px 10px;
    border-radius: 4px;
}

.btn {
    border-radius: 4px;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}
</style>

<!-- colores de fondo para los estados en la vista de avisos de cobranza del socio -->
<style>
.estado {
    color: white; /* Texto blanco por defecto */
    display: inline; /* Fondo ajustado únicamente al texto */
    padding: 2px 4px; /* Espaciado preciso */
    border-radius: 3px; /* Bordes ligeramente redondeados */
    font-weight: bold; /* Texto en negrita */
    line-height: 1; /* Alineación perfecta con el texto */
}

.estado-pagado {
    background-color: #28a745; /* Verde para pagado */
    color: white;
}

.estado-revision {
    background-color: #ffc107; /* Amarillo para revisión */
    color: #343a40;
}

.estado-rechazado {
    background-color: #dc3545; /* Rojo para rechazado */
    color: white;
}

.estado-vencido {
    background-color: #343a40; /* Gris más oscuro */
    color: white;
}

.estado-enviado {
    background-color: #28a745; /* Verde */
    color: white;
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