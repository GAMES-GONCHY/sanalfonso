<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

   
    public function prueba_get() {
        /*$this->response([
            'status' => true,
            'message' => 'La API REST está funcionando correctamente'
        ], 200);*/
		$array = array("hola", "mundo","cinthia");
		$this->response($array);
    }
}
