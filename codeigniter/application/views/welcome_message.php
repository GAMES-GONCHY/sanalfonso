<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">

	<h1>Lista de estudiantes</h1>
<div align="center">
	<table border="1">
		<thead>
			<th>No.</th>
			<th>Nombre</th>
			<th>Primer Apellido</th>
			<th>Segundo Apellido</th>
			<th>Nota</th>
		</thead>
		<tbody>
			<?php
			$contador=1;
			foreach($alumnos->result() as $row)
			{
			?>
			<tr>
				<td><?php echo $contador ?></td>
				<td><?php echo $row->nombre ?></td>
				<td> <?php echo $row->primerApellido ?> </td>
				<td><?php echo $row->segundoApellido ?></td>
				<td><?php echo $row->nota ?></td>
			</tr>
			<?php
			$contador++;
			}
			?>
		</tbody>
	</table>
</div>

	<?php 
		foreach($alumnos->result() as $row)
		{
			echo $row->idEstudiante." ";
			echo $row->nombre." ";
			echo $row->primerApellido." ";
			echo $row->segundoApellido." -> ";
			echo $row->nota."<br>";
		}
	?>

	<h1>Welcome to CodeIgniter!</h1>
	<h1>Ruta Base:</h1>
	<!-- aqui imprimimos la direccion URL BASE -->
	<h1><?php echo base_url(); ?></h1>
	<!-- LA DIRECCION BASE SE MUESTRA EN LA PAGINA COMO (http://[::1]/terceranio/mvcNew/codeigniter/) -->
	<!-- pero se debe copiar de esta manera en el (http://localhost/terceranio/mvcNew/codeigniter/) -->

	<img src="<?php echo base_url();?>img/tablero.jpg">
	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>