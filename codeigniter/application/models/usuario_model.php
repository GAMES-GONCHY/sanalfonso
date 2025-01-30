<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	/*public function validar($nickname,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nickName',$nickname);
		$this->db->where('password',$password);
		return $this->db->get();
		
	}*/
	public function validar($nickname, $password, $isEncrypted = true)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nickName', $nickname);

		if ($isEncrypted) {
			// Contraseña ya encriptada (por ejemplo, para el sistema web)
			$this->db->where('password', $password);
		} else {
			// Contraseña en texto plano (para la API)
			$this->db->where('password', hash('sha256', $password));
		}

		return $this->db->get();
	}
		

	public function getusercode($idUsuario)
	{
		$this->db->select('nombre, primerApellido, ci');
		$this->db->from('usuario');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get();
	}


	public function validar_api($nickname, $password)
	{
		// Aplica SHA-256 al password recibido
		$encrypted_password = hash("sha256", $password);

		// Busca en la base de datos al usuario con el nickname y la contraseña encriptada
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nickName', $nickname);
		$this->db->where('password', $encrypted_password);
		$query = $this->db->get();

		// Si encuentra al usuario, lo retorna
		if ($query->num_rows() === 1) {
			return $query->row();
		}

		// Si no coincide, devuelve false
		return false;
	}

}
