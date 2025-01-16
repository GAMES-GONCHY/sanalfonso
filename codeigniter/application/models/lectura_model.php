<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura_model extends CI_Model
{
    public function habilitados() 
    {
        $this->db->select('M.codigoSocio, M.idMembresia, CONCAT_WS(" ", U.nombre, U.primerApellido, IFNULL(U.segundoApellido,"")) AS nombreSocio,
                            U.ci, IFNULL(L.lecturaActual,0) AS lecturaActual, IFNULL(L.lecturaAnterior,0) AS lecturaAnterior, L.fechaLectura, L.idLectura');
        $this->db->from('usuario U');
        $this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMembresia = L.idMembresia', 'left');
        $this->db->where('U.estado', 1);
        $this->db->where('L.estado = 1 OR L.estado IS NULL');
        $this->db->order_by('L.fechaLectura', 'DESC'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insertarnuevalectura($data) 
    {
        $data['idAutor']=$this->session->userdata('idUsuario');
		$this->db->insert('lectura', $data);
        // Retornar true si la operación fue exitosa, false en caso contrario
        return $this->db->affected_rows() > 0;

    }
    public function modificarLecturabd($idLectura, $lecturaActual)
    {
        // Actualizar la lectura en la base de datos
        $this->db->set('lecturaActual', $lecturaActual);
        $this->db->where('idLectura', $idLectura);
        return $this->db->update('lectura'); // Retorna true si la actualización fue exitosa
    }
}