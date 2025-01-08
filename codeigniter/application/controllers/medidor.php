<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medidor extends CI_Controller
{
	public function habilitados()
	{
		$data['medidor'] = $this->medidor_model->en_servicio();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('medidoreshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
    public function deshabilitados()
	{
		$data['medidor'] = $this->medidor_model->deshabilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('medidoresdeshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	// public function habilitarbd()
	// {
	// 	$id = $_POST['id'];
	// 	$data['estado'] = 1;

	// 	$this->medidor_model->modificar($id, $data);
	// 	redirect('medidor/deshabilitados', 'refresh');
	// }
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;

		$this->medidor_model->modificar($id, $data);
		redirect('medidor/habilitados', 'refresh');
	}
	public function deshabilitar_medidor()
	{
		$idMedidor = $this->input->post('idMedidor');

			// Comprobar que el ID no esté vacío
		if (!$idMedidor)
		{
			echo json_encode(['status' => 'error', 'message' => 'Medidor no identificado.']);
			return;
		}
		// Llamamos al modelo para realizar la eliminación lógica
		$result = $this->medidor_model->deshabilitar($idMedidor);


		if ($result)
		{
			echo json_encode(['status' => 'success', 'message' => 'Medidor deshabilitado exitosamente.']);
		}
		else
		{
			echo json_encode(['status' => 'error', 'message' => 'Error al deshabilitar el medidor.']);
		}
	}
	public function habilitar_medidor()
	{
		$idMedidor = $this->input->post('id');

			// Comprobar que el ID no esté vacío
		if (!$idMedidor)
		{
			echo json_encode(['status' => 'error', 'message' => 'Medidor no identificado.']);
			return;
		}
		// Llamamos al modelo para realizar la eliminación lógica
		$result = $this->medidor_model->habilitar($idMedidor);

		if ($result)
		{
			echo json_encode(['status' => 'success', 'message' => 'Medidor habilitado exitosamente.']);
		}
		else
		{
			echo json_encode(['status' => 'error', 'message' => 'Error al habilitar el medidor.']);
		}
	}
}
