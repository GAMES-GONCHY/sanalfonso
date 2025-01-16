<?php
require_once __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'mi_clave_secreta';
$payload = [
    'idUsuario' => 1,
    'nickname' => 'usuario_demo'
];

// Generar un token
$token = JWT::encode($payload, $key, 'HS256');
echo "Token generado: " . $token . "\n";

// Decodificar el token
$decoded = JWT::decode($token, new Key($key, 'HS256'));
print_r($decoded);
