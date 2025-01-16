<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lectura extends CI_Controller 
{
    public function mostrarlectura()
    {
        // $data['lecturas'] = $this->lectura_model->habilitados();

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasactuales');
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    public function insertarnuevalectura()
    {
        $data['idMembresia'] = $this->input->post('idMembresia');
        $data['lecturaAnterior'] = $this->input->post('lecturaAnterior');
        $data['lecturaActual'] = $this->input->post('nuevaLectura');
        $data['idAutor'] = $this->session->userdata('idUsuario');
    
        // Verificar y registrar los datos recibidos
        log_message('debug', 'Datos recibidos en el controlador: ' . json_encode($data));
    
        // Validar datos requeridos
        if (empty($data['idMembresia']) || empty($data['lecturaAnterior']) || empty($data['lecturaActual']) || empty($data['idAutor'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos obligatorios.']);
            return;
        }
    
        // Procesar inserción
        $consulta = $this->lectura_model->insertarnuevalectura($data);
    
        if ($consulta) {
            echo json_encode(['status' => 'success', 'message' => 'Registro exitoso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al insertar en la base de datos.']);
        }
    }
    
    // public function obtenerLecturas()
    // {
    //     $lecturas = $this->lectura_model->habilitados();
    //     $contador = 1;
    //     foreach ($lecturas as &$lectura) {
    //         $lectura['numero'] = $contador++; // Agregar un índice
    //     }
    //     echo json_encode($lecturas);
    // }
    public function obtenerLecturas()
    {
        $lecturas = $this->lectura_model->habilitados();
        $contador = 1;
        $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];

        foreach ($lecturas as &$lectura) {
            $lectura['numero'] = $contador++; // Agregar un índice

            // Formatear la fecha de lectura
            if (!empty($lectura['fechaLectura'])) {
                $fecha = new DateTime($lectura['fechaLectura']);
                $dia = $fecha->format('d');
                $mes = $meses[(int)$fecha->format('m') - 1]; // Obtener el mes en letras
                $año = $fecha->format('Y');
                $lectura['fechaLectura'] = "$dia-$mes-$año"; // Formato final
            }
        }

        echo json_encode($lecturas);
    }
}
