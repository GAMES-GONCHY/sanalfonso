<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function avisos()
    {
        $this->load->view('incrustaciones/vistascoloradmin/headavisos');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisos'); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function cargaravisos()
    {
        $pagina = $this->input->get('pagina') ?? 1; // Página actual
        $busqueda = $this->input->get('busqueda') ?? ''; // Texto de búsqueda
        $limit = 10; // Registros por página
        $offset = ($pagina - 1) * $limit; // Calcular offset
    
        // Obtener los avisos de la página actual y con filtro de búsqueda
        $avisos = $this->avisocobranza_model->cargaravisosbd($limit, $offset, $busqueda);
    
        // Obtener el total de registros que coincidan con la búsqueda
        $total_registros = $this->avisocobranza_model->contarAvisos($busqueda);
    
        // Calcular el total de páginas
        $total_paginas = ceil($total_registros / $limit);
    
        // Devolver datos y total de páginas como JSON
        echo json_encode([
            'avisos' => $avisos,
            'total_paginas' => $total_paginas
        ]);
    }
    
}
