<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Api extends RestController {
public function prueba_get() {
		$nombre = $this->get('nombre');
		$this->response(['saludo' => "Hola, $nombre"], 200);
	}
	
	 /*public function buscar_socio()
{
   // Verificar si el método es GET
    if ($this->input->method() === 'get') {
        $codigo = $this->input->get('codigo');
        $nombre = $this->input->get('nombre');

        // Llamar al modelo para buscar los socios
        $this->load->model('Crudusers_model');
        $result = $this->Crudusers_model->buscar_socios($codigo, $nombre);

        // Enviar respuesta en JSON
        if (!empty($result)) {
            echo json_encode(['status' => true, 'data' => $result]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No se encontraron resultados']);
        }
    } else {
        echo json_encode(['status' => false, 'error' => 'Método desconocido']);
    }
}*/



}
