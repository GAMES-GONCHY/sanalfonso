<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro_model extends CI_Model
{
	public function listalibros()
	{
		$this->db->select('*');
		$this->db->from('libros');
		$this->db->where('habilitado',1);
		return $this->db->get();//retorna el resultado
	}
	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('libros');
		$this->db->where('habilitado',0);
		return $this->db->get();//retorna el resultado
	}
	public function agregarlibro($data)
	{
		$this->db->insert('libros',$data);
	}
	public function eliminarlibro($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('libros');
	}
	public function recuperarlibro($id)
	{
		$this->db->select('*');
		$this->db->from('libros');
		$this->db->where('id',$id);
		return $this->db->get();//retorna el resultado
	}
	public function modificarlibro($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('libros',$data);
	}
}
