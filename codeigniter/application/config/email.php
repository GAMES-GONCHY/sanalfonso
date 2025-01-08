<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587, // Puerto para TLS
    'smtp_user' => 'games.gonzalo.883@gmail.com',
    'smtp_pass' => 'urgr covl shiq tlse', // Tu contraseña de aplicación si estás usando autenticación de dos factores
    'mailtype'  => 'html', // Tipo de contenido del correo (html o text)
    'charset'   => 'utf8', // Codificación de caracteres
    'wordwrap'  => TRUE, // Ajuste automático de texto
    'smtp_crypto' => 'tls', // Agrega esta línea para habilitar STARTTLS
);
