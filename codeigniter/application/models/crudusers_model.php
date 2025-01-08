<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudusers_model extends CI_Model
{
	public function habilitados($rol)
	{
		if($rol==2)
		{
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where('estado', 1);
			$this->db->where('rol', $rol);
			$this->db->order_by('fechaRegistro', 'DESC');
		}
		else
		{
			$this->db->select('usuario.*, membresia.idMembresia, membresia.codigoSocio');
			$this->db->from('usuario');
			$this->db->join('membresia', 'membresia.idUsuario = usuario.idUsuario', 'inner');
			$this->db->where('usuario.estado', 1);
			$this->db->where('usuario.rol', $rol);
			$this->db->order_by('usuario.fechaRegistro', 'DESC');
		}
		return $this->db->get();

	}
	public function deshabilitados($rol)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where_in('estado', [0, 2]);
		$this->db->where('rol', $rol);
		return $this->db->get();
	}
	public function agregar($data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
		$this->db->insert('usuario', $data);
	}
	public function modificar($id, $data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaActualizacion']=date('Y-m-d H:i:s');
		$this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data);
	}
	public function eliminar($id)
	{
		$this->db->where('idUsuario', $id);
		$this->db->delete('usuario');
	}
	public function recuperarusuario($id)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idUsuario', $id);
		return $this->db->get();
	}
	public function deshabilitar($id, $data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaActualizacion']=date('Y-m-d H:i:s');
		$this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data);
	}
	public function comprobaremail($email)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->num_rows() > 0;
	}
	public function comprobarinsercion($newdata)
	{
		$duplicate = [];
		$this->db->where('email', $newdata['email']);
		$query = $this->db->get('usuario');

		if ($query->num_rows() > 0)
		{
			$duplicate['email'] = true;
		}
		
		$this->db->where('nickName', $newdata['nickname']);
		$query = $this->db->get('usuario');

		if ($query->num_rows() > 0) 
		{
			$duplicate['nickName'] = true;
		}

		return $duplicate;
	}
	public function comprobarmodificacion($newdata, $id)
	{
		$this->db->group_start()
			->where('email', $newdata['email'])
			->or_where('nickName', $newdata['nickname'])
			->group_end();

		$this->db->where('idUsuario !=', $id);
		$query = $this->db->get('usuario');
		$duplicates = [];
		foreach ($query->result() as $row) 
		{
			if ($row->email == $newdata['email']) 
			{
				$duplicates['email'] = true;
			}
			if ($row->nickName == $newdata['nickname']) 
			{
				$duplicates['nickName'] = true;
			}
		}
		return $duplicates;
	}
}
