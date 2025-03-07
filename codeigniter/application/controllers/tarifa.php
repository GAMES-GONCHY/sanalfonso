<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa extends CI_Controller 
{
	public function habilitados()
	{
		$lista=$this->tarifa_model->habilitados();
	
		$data['tarifas']=$lista;

		$this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('tarifashabilitadas', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footertarifas');
		
	}
	public function deshabilitados()
	{
		$lista=$this->tarifa_model->deshabilitados();
		$data['tarifas']=$lista;

		$this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('tarifasdeshabilitadas', $data); // Mostrar las lecturas fallidas
        $this->load->view('incrustaciones/vistascoloradmin/footertarifas');
		
	}
	public function agregar()
	{
		
		 // Validar que la solicitud sea AJAX
		 if (!$this->input->is_ajax_request()) {
			show_404();
		}
		// Capturar datos del formulario con sanitización
		$data = [
			'tarifaMinima'  => $this->input->post('tarifaMinima', true),
			'tarifaVigente' => $this->input->post('tarifaVigente', true),
			
		];
		 // Depuración: Registrar datos en logs
		 log_message('error', 'Datos recibidos en agregar: ' . json_encode($data));
		 // Insertar en la base de datos
		 $nuevo_id = $this->tarifa_model->agregar($data);

		 if ($nuevo_id) {
			 echo json_encode([
				 'status'  => 'success',
				 'message' => 'Tarifa agregada correctamente.',
				 'id'      => $nuevo_id
			 ]);
		 } else {
			 echo json_encode([
				 'status'  => 'error',
				 'message' => 'Error al agregar la tarifa.'
			 ]);
		 }
		 exit;
	 }
	public function deshabilitar()
	{
		$id = $this->input->post('id');
		$this->tarifa_model->deshabilitar($id);
		redirect('tarifa/habilitados');
	}
	public function habilitar()
	{
		$id = $this->input->post('id');
		$this->tarifa_model->habilitar($id);
		redirect('tarifa/deshabilitados');
	}
	public function modificar()
	{
		// Validar que la solicitud sea AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		// Recibir los datos del formulario con sanitización
		$idTarifa = $this->input->post('idTarifa', true);
		$data = [
			'tarifaMinima'  => $this->input->post('tarifaMinima', true),
			'tarifaVigente' => $this->input->post('tarifaVigente', true)
		];

		// Verificar si existen registros de lectura asociados a la tarifa
		if ($this->tarifa_model->consultarregistrosdelectura($idTarifa)) {
			echo json_encode([
				'status'  => 'error',
				'message' => 'Ya existen avisos de cobranza asociados. Favor crear una nueva tarifa.'
			]);
			exit;
		}

		// Intentar modificar los datos de la tarifa
		if ($this->tarifa_model->modificar($idTarifa, $data)) {
			echo json_encode([
				'status'  => 'success',
				'message' => 'Tarifa modificada correctamente.'
			]);
		} else {
			echo json_encode([
				'status'  => 'error',
				'message' => 'Error al modificar la tarifa. Intente otra vez.'
			]);
		}
		exit;
	}
	public function getTarifasEliminadas()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$tarifas = $this->tarifa_model->obtenerTarifasEliminadas();

		if (!empty($tarifas)) {
			echo json_encode(['status' => 'success', 'data' => $tarifas]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No hay tarifas eliminadas.']);
		}
	}
	
	public function getTarifasHabilitadas()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$query = $this->tarifa_model->habilitados(); // Obtener tarifas vigentes
		$tarifas = $query->result();

		if ($tarifas) {
			echo json_encode(['status' => 'success', 'data' => $tarifas]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No hay tarifas habilitadas.']);
		}
	}


}
