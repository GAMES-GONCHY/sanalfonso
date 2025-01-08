<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller 
{
	public function habilitados()
	{
		$lista=$this->estudiante_model->habilitados();
		$data['alumnos']=$lista;//"alumnos" es la posicion del array
		//$data['users']=$usuarios;//users es la posicion del array
		//$data['notificaciones']=$notific;

		$this->load->view('incrustaciones/vistaslte/head');
		$this->load->view('incrustaciones/vistaslte/menu');
		$this->load->view('esthabilitados',$data);
		$this->load->view('incrustaciones/vistaslte/footer');
		
	}
	public function deshabilitados()
	{
		$lista=$this->estudiante_model->deshabilitados();
		$data['alumnos']=$lista;//"alumnos" es la posicion del array

		$this->load->view('incrustaciones/vistaslte/head');
		$this->load->view('incrustaciones/vistaslte/menu');
		$this->load->view('estdeshabilitados',$data);
		$this->load->view('incrustaciones/vistaslte/footer');
	}
	public function agregar()
	{
		$this->load->view('incrustaciones/vistaslte/head');
		$this->load->view('incrustaciones/vistaslte/menu');
		$this->load->view('formagregarest');
		$this->load->view('incrustaciones/vistaslte/footer');
	}
	public function agregarbd()
	{
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['primerApellido']=strtoupper($_POST['apellido1']);
		$data['segundoApellido']=strtoupper($_POST['apellido2']);
		$data['nota']=$_POST['nota'];
		$data['login']=strtolower($_POST['login']);
		$data['password']=sha1($_POST['password']);
		$this->estudiante_model->agregar($data);

		redirect('estudiante/habilitados','refresh');//Aqui se refresca la vista para incluir el registro agregado
	}
	public function modificar()
	{
		$id=$_POST['id'];
		$data['info']=$this->estudiante_model->recuperarestudiante($id);

		$this->load->view('incrustaciones/vistaslte/head');
		$this->load->view('incrustaciones/vistaslte/menu');
		$this->load->view('formmodificarest',$data);
		$this->load->view('incrustaciones/vistaslte/footer');
	}
	public function modificarbd()
	{
		$id=$_POST['id'];
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['primerApellido']=strtoupper($_POST['apellido1']);
		$data['segundoApellido']=strtoupper($_POST['apellido2']);
		$data['nota']=$_POST['nota'];
		
		$this->estudiante_model->modificar($id,$data);
		redirect('estudiante/habilitados','refresh');
	}
	public function eliminarbd()
	{
		$id=$_POST['id'];
		$this->estudiante_model->eliminar($id);
		redirect('estudiante/habilitados','refresh');
	}
	public function deshabilitarbd()
	{
		$id=$_POST['id'];
		$data['estado']=0;

		$this->estudiante_model->deshabilitar($id,$data);
		redirect('estudiante/habilitados','refresh');
	}
	public function habilitarbd()
	{
		$id=$_POST['id'];
		$data['estado']=1;

		$this->estudiante_model->modificar($id,$data);
		redirect('estudiante/deshabilitados','refresh');
	}
}
