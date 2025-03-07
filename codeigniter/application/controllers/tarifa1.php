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
		$data['tarifaMinima'] = $_POST['tarifaMinima1'];
		$data['tarifaVigente'] = $_POST['tarifaVigente1'];
		// $data['fechaInicioVigencia'] = $_POST['fechaInicioVigencia1'];

		$this->tarifa_model->agregar($data);
		redirect('tarifa/habilitados');
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
		// Recibir los datos del formulario
		$id = $_POST['idTarifa'];

		$data['tarifaMinima'] = $_POST['tarifaMinima'];
		$data['tarifaVigente'] = $_POST['tarifaVigente'];
		// $data['fechaInicioVigencia'] = $_POST['fechaInicioVigencia'];
		// Llamar al modelo para modificar los datos

		if($this->tarifa_model->consultarregistrosdelectura($id))
		{
			// Establecer un mensaje de error en caso de que existan lecturas
			$this->session->set_flashdata('error', 'Ya existen avisos de cobranza asociados. Favor crear una nueva tarifa');
		}
		else
		{
			// Intentar modificar los datos de la tarifa
			if($this->tarifa_model->modificar($id, $data))
			{
				$this->session->set_flashdata('success', 'Tarifa modificada correctamente.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error al modificar la tarifa. Intente otra vez');
			}
		}

		// Redirigir después de modificar, mostrando mensajes de éxito o error
		redirect('tarifa/habilitados');
	}


}
