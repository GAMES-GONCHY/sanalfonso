<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro extends CI_Controller 
{
	public function demo()
	{
		$listalibros=$this->libro_model->listalibros();
		$data['libros']=$listalibros;//"alumnos" es la posicion del array
		$this->load->view('incrustaciones/vistaslte/head');
		$this->load->view('incrustaciones/vistaslte/menu');
		$this->load->view('incrustaciones/vistaslte/test',$data);
		$this->load->view('incrustaciones/vistaslte/footer');
	}
	public function demo1()
	{
		$listalibros=$this->libro_model->listalibros();
		$data['libros']=$listalibros;//"alumnos" es la posicion del array
		$this->load->view('incrustaciones/vistasmetrica/head');
		$this->load->view('incrustaciones/vistasmetrica/menu');
		$this->load->view('test',$data);
		$this->load->view('incrustaciones/vistasmetrica/footer');
	}
	public function mostrarlibros()
	{
		$listalibros=$this->libro_model->listalibros();
		$data['libros']=$listalibros;//"alumnos" es la posicion del array

		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('listalibros',$data);
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
		
	}
	public function deshabilitados()
	{
		$listalibros=$this->libro_model->listadeshabilitados();
		$data['libros']=$listalibros;//"alumnos" es la posicion del array

		$this->load->view('incrustaciones/head');
		$this->load->view('incrustaciones/menu');
		$this->load->view('librosdeshabilitados',$data);
		$this->load->view('incrustaciones/footer');
		$this->load->view('incrustaciones/pie');
	}
	public function agregarlibro()
	{
		$this->load->view('incrustaciones/vistasmetrica/head');
		$this->load->view('incrustaciones/vistasmetrica/menu');
		$this->load->view('formagregarlibro');
		$this->load->view('incrustaciones/vistasmetrica/footer');
		//$this->load->view('incrustaciones/pie');
	}
	public function agregarlibrobd()
	{
		$data['titulo']=strtoupper($_POST['titulo']);
		$data['autor']=strtoupper($_POST['autor']);
		$data['genero']=strtoupper($_POST['genero']);
		$data['publicado']=$_POST['publicado'];
		$data['isbn']=strtoupper($_POST['isbn']);

		$this->libro_model->agregarlibro($data);
		redirect('libro/demo','refresh');
	}
	public function eliminarlibrobd()
	{
		$id=$_POST['id'];
		$this->libro_model->eliminarlibro($id);
		redirect('libro/demo','refresh');
	}
	public function modificarlibro()
	{
		$id=$_POST['id'];
		$data['infolibro']=$this->libro_model->recuperarlibro($id);

		$this->load->view('incrustaciones/vistasmetrica/head');
		$this->load->view('incrustaciones/vistasmetrica/menu');
		$this->load->view('formmodificarlibro',$data);
		$this->load->view('incrustaciones/vistasmetrica/footer');
		//$this->load->view('incrustaciones/pie');
	}
	public function modificarlibrobd()
	{
		$id=$_POST['id'];
		$data['titulo']=strtoupper($_POST['titulo']);
		$data['autor']=strtoupper($_POST['autor']);
		$data['genero']=strtoupper($_POST['genero']);
		$data['publicado']=$_POST['publicado'];
		$data['isbn']=strtoupper($_POST['isbn']);

		$this->libro_model->modificarlibro($id,$data);
		redirect('libro/demo','refresh');
	}
	public function deshabilitarbd()
	{
		$id=$_POST['id'];
		$data['habilitado']=0;

		$this->libro_model->modificarlibro($id,$data);
		redirect('libro/mostrarlibros','refresh');
	}
	public function habilitarbd()
	{
		$id=$_POST['id'];
		$data['habilitado']=1;

		$this->libro_model->modificarlibro($id,$data);
		redirect('libro/deshabilitados','refresh');
	}
}
