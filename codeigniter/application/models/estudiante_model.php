<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model
{
	public function habilitados()
	{
		$this->db->select('*');
		$this->db->from('estudiantes');
		$this->db->where('estado',1);
		return $this->db->get();//retorna el resultado
	}
	public function deshabilitados()
	{
		$this->db->select('*');
		$this->db->from('estudiantes');
		$this->db->where('estado',0);
		return $this->db->get();//retorna el resultado
	}
	public function agregar($data)
	{
		$this->db->insert('estudiantes',$data);
	}
	public function modificar($id,$data)
	{
		$this->db->where('idEstudiante',$id);
		$this->db->update('estudiantes',$data);
	}
	public function eliminar($id)
	{
		$this->db->where('idEstudiante',$id);
		$this->db->delete('estudiantes');
	}
	public function recuperarestudiante($id)
	{
		$this->db->select('*');
		$this->db->from('estudiantes');
		$this->db->where('idEstudiante',$id);
		return $this->db->get();
	}
	public function deshabilitar($id,$data)
	{
		$this->db->where('idEstudiante',$id);
		$this->db->update('estudiantes',$data);
	}
}
