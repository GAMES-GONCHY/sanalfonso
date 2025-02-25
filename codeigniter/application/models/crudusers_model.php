<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudusers_model extends CI_Model
{
	public function habilitados($rol)
	{
		$this->db->select('U.*, COALESCE(M.codigoSocio, "") AS codigo');
		$this->db->from('usuario U');
		$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'left');
		$this->db->where('U.estado', 1);
		$this->db->where('U.rol', $rol);
		if($rol==2)
		{
			$this->db->order_by('fechaRegistro', 'DESC');
		}
		elseif($rol==0)
		{
			$this->db->order_by('fechaActualizacion', 'DESC');
		}
		$query = $this->db->get(); // Devuelve un objeto de consulta
	
		return $query; // No convertimos a array aquí
	}
    public function deshabilitados($rol)
	{
		$this->db->select('U.*, COALESCE(M.codigoSocio, "") AS codigo');
		$this->db->from('usuario U');
		$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'left');
		$this->db->where('U.rol', $rol);
        $this->db->where_in('U.estado', [0, 2]);
        return $this->db->get();
    }
	public function agregar($data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
		$this->db->insert('usuario', $data);
	}
	public function modificar($id, $data)
	{
		$data['idAutor'] = $this->session->userdata('idUsuario'); // Capturar usuario que modifica
		$data['fechaActualizacion'] = date('Y-m-d H:i:s'); // Agregar fecha de modificación

		$this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data);
	}

	public function actualizarEstado($idUsuario, $nuevoEstado)
	{
		$data['estado'] = $nuevoEstado;
		$data['idAutor'] = $this->session->userdata('idUsuario');
		$data['fechaActualizacion'] = date('Y-m-d H:i:s');
		$this->db->where('idUsuario', $idUsuario);
		return $this->db->update('usuario', $data);
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

		$this->db->where('ci', $newdata['ci']);
		$query = $this->db->get('usuario');

		if ($query->num_rows() > 0) 
		{
			$duplicate['ci'] = true;
		}

		return $duplicate;
	}
	public function comprobarmodificacion($newdata, $id)
	{
		log_message('error', 'Verificando duplicados para el ID: ' . $id);
		log_message('error', 'Datos a validar: ' . json_encode($newdata));
	
		// Obtener los datos actuales del usuario
		$usuarioActual = $this->db->select('email, nickName')
								  ->from('usuario')
								  ->where('idUsuario', $id)
								  ->get()
								  ->row_array();
	
		log_message('error', 'Datos actuales del usuario: ' . json_encode($usuarioActual));
	
		$this->db->select('idUsuario, email, nickName')
				 ->from('usuario')
				 ->group_start()
					->where('email', $newdata['email'])
					->or_where('nickName', $newdata['nickName'])
				 ->group_end()
				 ->where('idUsuario !=', $id); // Excluir al usuario actual de la búsqueda
	
		$query = $this->db->get();
		log_message('error', 'Consulta ejecutada: ' . $this->db->last_query());
	
		$duplicates = [];
		foreach ($query->result() as $row) {
			log_message('error', 'Usuario encontrado con email/nick duplicado: ' . json_encode($row));
			
			if ($row->email == $newdata['email'] && $usuarioActual['email'] != $newdata['email']) {
				$duplicates['email'] = true;
			}
			if ($row->nickName == $newdata['nickName'] && $usuarioActual['nickName'] != $newdata['nickName']) {
				$duplicates['nickName'] = true;
			}
		}
	
		log_message('error', 'Resultado de duplicados: ' . json_encode($duplicates));
		return $duplicates;
	}
	



}
