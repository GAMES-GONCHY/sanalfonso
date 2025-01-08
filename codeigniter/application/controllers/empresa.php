<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller 
{
	public function index()
	{
		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('inicio');
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function catalogo()
	{
		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('productos');
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function contactos()
	{
		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('contactos');
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function nuestraempresa()
	{
		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('nuestraempresa');
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function integracion()
	{
		$this->load->view('base');
	}
}
