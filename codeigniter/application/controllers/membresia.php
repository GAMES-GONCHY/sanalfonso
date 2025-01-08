
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Membresia extends CI_Controller
{
	public function recuperarmembresia()
	{
		$idsocio = $this->input->post('id');  // Asegúrate de que este ID es correcto
		$idMembresia = $this->membresia_model->membresia($idsocio);

		$this->session->set_userdata('idMembresia', $idMembresia);
		$idDatalogger;
		if($this->datalogger_model->contardl()<1)
		{
			$idDatalogger = 1;
		}
		else
		{
			if($this->datalogger_model->recuperaridmax()->num_rows()>0)
			{
				$idDatalogger=$this->datalogger_model->recuperaridmax()->row()->idDatalogger;
			}
		}
		// $idDatalogger=$this->datalogger_model->recuperaridmax()->row()->idDatalogger;
		$this->session->set_userdata('idDatalogger', $idDatalogger);
		redirect('geodatalogger/geolocalizar');
	}
	public function verificarAsociacionesMembresia($idMembresia) 
	{
		// Verificar si la membresía tiene un datalogger asociado a través de la tabla 'medidor'
		$this->db->select('idDatalogger');
		$this->db->from('medidor');
		$this->db->where('idMembresia', $idMembresia);
		$this->db->where('estado', 1); // Verificar dataloggers activos
		$queryDatalogger = $this->db->get();
		$tieneDatalogger = ($queryDatalogger->num_rows() > 0);
	
		// Verificar si la membresía tiene un medidor asociado
		$this->db->select('idMedidor');
		$this->db->from('medidor');
		$this->db->where('idMembresia', $idMembresia);
		$this->db->where('estado', 1); // Verificar medidores activos
		$queryMedidor = $this->db->get();
		$tieneMedidor = ($queryMedidor->num_rows() > 0);
	
		// Retornar el resultado como JSON
		echo json_encode([
			'tieneDatalogger' => $tieneDatalogger,
			'tieneMedidor' => $tieneMedidor
		]);
	}
}
