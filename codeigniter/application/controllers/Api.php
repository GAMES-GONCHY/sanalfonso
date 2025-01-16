<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Api extends RestController {
    

    public function prueba_get() {
        $nombre = $this->get('nombre') ?? 'Usuario';
        $this->response([
            'status' => true,
            'message' => "Hola, $nombre. La conexión es exitosa."
        ], 200);
    }
    


}
