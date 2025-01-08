<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>

<head>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary text-center" role="alert">
                    <h1 class="display-4">Bienvenido a AquaReadPrO</h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <p>Hola <?php echo $nombre; ?>!, tu solicitud de membresía fue aceptada!</p>
                        <p>Estos son tus credenciales de autentificación:</p>
                        <ul class="list-unstyled">
                            <li><strong>Nickname:</strong>  <?php echo $nickname; ?></li>
                            <li><strong>Password:</strong> 123 (Este es un password genérico) </li>
                        </ul>
                        <h4>Nota: por su seguridad, deberá cambiar su password en el primer inicio de sesión</h4>
                        <p>Saludos,<br>AquaReadPrO Team!</p>
                    </div>
                </div>

                <footer class="footer mt-4 text-center">
                    <p>&copy; ' . <?php echo date('Y'); ?> . ' AquaReadPrO. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>