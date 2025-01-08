<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalogger extends CI_Controller
{
	public function habilitados()
	{
		$data['datalogger'] = $this->datalogger_model->habilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('dataloggershabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
    public function deshabilitados()
	{
		$data['datalogger'] = $this->datalogger_model->deshabilitados();

		$this->medidor_model->deshabilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('dataloggersdeshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$this->datalogger_model->modificar($id, $data);
		redirect('datalogger/deshabilitados', 'refresh');
	}
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;

		$this->datalogger_model->modificar($id, $data);
		redirect('datalogger/habilitados', 'refresh');
	}
	public function eliminar_datalogger()
	{
		// Obtener el ID del datalogger desde la solicitud POST
		$idDatalogger = $this->input->post('idDatalogger');

		// Comprobar que el ID no esté vacío
		if (!$idDatalogger) {
			echo json_encode(['status' => 'error', 'message' => 'ID de datalogger no proporcionado.']);
			return;
		}
	
		// Intentar eliminar el datalogger
		if ($this->datalogger_model->eliminarDatalogger($idDatalogger)) {
			// Responder con éxito
			echo json_encode(['status' => 'success', 'message' => 'Datalogger eliminado exitosamente.']);
		} else {
			// Responder con error si hubo un problema al eliminar
			echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el datalogger.']);
		}
	}
	public function restaurar_datalogger()
	{
		$id = $this->input->post('id');
		// Procesa la restauración con el ID recibido
		if ($this->datalogger_model->restaurarDatalogger($id))
		{
			echo json_encode(["status" => "success"]);
		} else {
			echo json_encode(["status" => "error"]);
		}
	}
	// public function agregar()
	// {
	// 	$this->load->view('incrustaciones/vistascoloradmin/head');
	// 	$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
	// 	$this->load->view('formagregardatalogger');
	// 	$this->load->view('incrustaciones/vistascoloradmin/footer');
	// }
	// public function agregarbd()
	// {
	// 	$data['latitud'] = $_POST['latitud'];
	// 	$data['longitud'] = $_POST['longitud'];
	// 	$data['idAutor']=$this->session->userdata('idUsuario');
	// 	$data['idUsuario'] = $_POST['codsocio'];

	// 	$lastId=$this->datalogger_model->agregar($data);

	// 	redirect('datalogger/agregar');
	// }
	public function configurar_datalogger()
	{
		// Obtener los valores enviados por AJAX
		$idDatalogger = $this->input->post('idDatalogger');
		$data['IP'] = $this->input->post('IP');
		$data['puerto'] = $this->input->post('puerto');
	
		// Llamar a la función del modelo para actualizar la base de datos
		$resultado = $this->datalogger_model->configurar($idDatalogger, $data);
	
		// Enviar respuesta
		if ($resultado) {
			echo json_encode(['status' => 'success', 'message' => 'Configuración exitosa.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Error de configuración.']);
		}
	}
	
}
