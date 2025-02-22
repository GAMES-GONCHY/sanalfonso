<?php
function check_session() {
    $CI =& get_instance();
    $CI->load->library('session');

    // Obtén la clase y método actuales
    $current_class = $CI->router->fetch_class();
    $current_method = $CI->router->fetch_method();

    // Define las rutas públicas que no necesitan verificación de sesión
    $public_routes = [
        'usuario/index',
        'usuario/validarusuario',
        'usuario/logout',
    ];

    // Construye la ruta actual
    $current_route = $current_class . '/' . $current_method;

    // Si la ruta está en las públicas, no verificamos la sesión
    if (in_array($current_route, $public_routes)) {
        return;
    }

    // Verifica si la sesión sigue activa
    if (!$CI->session->userdata('idUsuario')) {
        // Si la sesión no está activa, redirige al login
        redirect('usuario/index');
        exit;
    }
}
