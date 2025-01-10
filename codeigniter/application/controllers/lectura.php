<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lectura extends CI_Controller 
{
    public function mostrarlectura()
    {
        $data['lecturas'] = $this->lectura_model->habilitados();

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasactuales', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
		
    }
}
