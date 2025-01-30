<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use RestServer\Libraries\REST_Controller;

class Api extends REST_Controller {

   
    public function login_post()
{
    // Verificar que el método sea POST
    if ($this->input->server('REQUEST_METHOD') !== 'POST') {
        $this->response([
            'status' => false,
            'message' => 'Método no permitido.'
        ], REST_Controller::HTTP_METHOD_NOT_ALLOWED);
        return;
    }

    // Decodificar datos recibidos en JSON
    $data = json_decode($this->input->raw_input_stream, true);

    // Validar campos requeridos
    if (!isset($data['nickname']) || !isset($data['password'])) {
        $this->response([
            'status' => false,
            'error' => 'Faltan datos requeridos.'
        ], REST_Controller::HTTP_BAD_REQUEST);
        return;
    }

    // Llamar al modelo para validar credenciales (sin encriptación)
    $query = $this->usuario_model->validar($data['nickname'], $data['password'], false);

    if ($query->num_rows() > 0) {
        // Credenciales válidas
        $usuario = $query->row_array();

        $this->response([
            'status' => true,
            'message' => 'Inicio de sesión exitoso.',
            'usuario' => $usuario
        ], REST_Controller::HTTP_OK);
    } else {
        // Credenciales inválidas
        $this->response([
            'status' => false,
            'error' => 'Credenciales incorrectas.'
        ], REST_Controller::HTTP_UNAUTHORIZED);
    }
}



public function buscarSocio() {
    $codigo = $this->input->get('codigo');  // Puedes usar 'ci' dependiendo del parámetro que desees buscar
    $this->load->model('lectura_model');
    $data = $this->lectura_model->obtenerDatosSocio($codigo);
    echo json_encode($data);
}


    public function prueba_get() {
        $nombre = $this->get('nombre') ?? 'Usuario';
        $this->response([
            'status' => true,
            'message' => "Hola, $nombre. La conexión es exitosa."
        ], REST_Controller::HTTP_OK); // Corrección de namespace
    }

    public function test_post() {
        $this->response([
            'status' => true,
            'message' => 'Método POST recibido correctamente',
            'data' => $this->post()
        ], REST_Controller::HTTP_OK); // Corrección de namespace
    }

    

}
