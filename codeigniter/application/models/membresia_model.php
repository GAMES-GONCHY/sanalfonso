<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membresia_model extends CI_Model
{
	public function membresia($idsocio)
    {
        $this->db->select('idMembresia');
		$this->db->from('membresia');
		$this->db->where('idUsuario', $idsocio);
		$query =$this->db->get();

        if ($query->num_rows() > 0) {
            // Retorna la fila como un objeto y acceder a 'idMembresia'
            return $query->row()->idMembresia;
        } else {
            // Si no se encuentra la membresía, retornar null o manejar el error
            return null;
        }
    }
    public function contarmembresias()
    {
        $this->db->select('idMembresia');
		$this->db->from('membresia');
		$this->db->where('idUsuario', $idsocio);
		$query =$this->db->get();

        return $query->row()->idMembresia;
    }
}
