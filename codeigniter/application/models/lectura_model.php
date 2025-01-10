<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura_model extends CI_Model
{
    public function habilitados() 
    {
        $this->db->select('M.codigoSocio, CONCAT_WS(" ", U.nombre, U.primerApellido, IFNULL(U.segundoApellido,"")) AS nombreSocio,
                            U.ci, L.lecturaActual, L.lecturaAnterior, L.fechaLectura');
        $this->db->from('usuario U');
        $this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMembresia = L.idMembresia', 'inner');
        $this->db->where('U.estado', 1);
        $this->db->order_by('M.codigoSocio', 'ASC'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    
}