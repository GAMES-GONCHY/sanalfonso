<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public function index()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['alumnos']=$lista;
		$this->load->view('welcome_message',$data);
	}

	public function pruebabd()
	{
		$query=$this->db->get('estudiantes');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
	public function curso()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['alumnos']=$lista;//"alumnos" es la posicion del array
		//$data['users']=$usuarios;//users es la posicion del array
		//$data['notificaciones']=$notific;

		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('welcome_message',$data);
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');

		
	}
}
