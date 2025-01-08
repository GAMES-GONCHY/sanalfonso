<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller 
{
	public function mostrarpaises()
	{
		$listapaises=$this->pais_model->listapaises();
		$data['paises']=$listapaises;//"alumnos" es la posicion del array
		//$data['users']=$usuarios;//users es la posicion del array
		//$data['notificaciones']=$notific;

		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('listapaises',$data);
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
		
	}
	public function agregarpais()
	{
		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('formagregarpais');
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function agregarpaisbd()
	{
		$data['pais']=strtoupper($_POST['pais']);
		$data['superficie']=$_POST['superficie'];
		$data['poblacion']=$_POST['poblacion'];
		$this->pais_model->agregarpais($data);
		redirect('pais/mostrarpaises','refresh');
	}
	public function eliminarpaisbd()
	{
		$idpais=$_POST['idpais'];
		$this->pais_model->eliminarpais($idpais);
		redirect('pais/mostrarpaises','refresh');
	}
	public function modificarpais()
	{
		$idpais=$_POST['idpais'];
		$data['infopais']=$this->pais_model->recuperarpais($idpais);

		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('formmodificarpais',$data);
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function modificarpaisbd()
	{
		$idpais=$_POST['idpais'];
		$data['pais']=strtoupper($_POST['pais']);
		$data['superficie']=$_POST['superficie'];
		$data['poblacion']=$_POST['poblacion'];
		$this->pais_model->modificarpais($idpais,$data);
		redirect('pais/mostrarpaises','refresh');
	}
}
