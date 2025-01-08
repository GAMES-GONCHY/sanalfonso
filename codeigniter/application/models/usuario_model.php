<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function validar($nickname,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nickName',$nickname);
		$this->db->where('password',$password);
		return $this->db->get();
		
	}
	public function getusercode($idUsuario)
	{
		$this->db->select('nombre, primerApellido');
		$this->db->from('usuario');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get();
	}
}
