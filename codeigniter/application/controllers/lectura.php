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
    
    
        // Procesar inserción
        $consulta = $this->lectura_model->insertarnuevalectura($data);
    
        if ($consulta) {
            echo json_encode(['status' => 'success', 'message' => 'Registro exitoso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al insertar en la base de datos.']);
        }
    }
    
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
            else
            {
                $lectura['fechaLectura'] = "Sin fecha";
            }
        }

        echo json_encode($lecturas);
    }
    public function modificarLectura()
    {
        // Capturar los datos enviados desde el frontend
        $idLectura = $this->input->post('idLectura');
        $lecturaActual = $this->input->post('lectuActual');
        

         // Depuración: Verifica los datos recibidos
        log_message('debug', 'Datos recibidos en modificarLectura: ' . json_encode(['idLectura' => $idLectura, 'lecturaActual' => $lecturaActual]));

        // Validar que los datos no estén vacíos
        if (empty($idLectura) || empty($lecturaActual)) {
            echo json_encode(['status' => 'error', 'message' => 'Datos incompletos.']);
            return;
        }


        // Llamar al método del modelo para actualizar la lectura
        $resultado = $this->lectura_model->modificarLecturabd($idLectura, $lecturaActual);

        // Responder al frontend según el resultado
        if ($resultado) {
            echo json_encode(['status' => 'success', 'message' => 'Lectura modificada correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al modificar la lectura.']);
        }
    }
}
