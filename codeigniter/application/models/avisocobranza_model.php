<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza_model extends CI_Model
{
    public function cargaravisosbd($limit, $offset, $busqueda = '')
    {
        $this->db->select('
            CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido, "")) AS nombreSocio,
            M.codigoSocio,
            L.lecturaAnterior,
            L.lecturaActual,
            L.fechaLectura,
            A.fechaVencimiento,
            A.estado,
            T.tarifaMinima,
            T.tarifaVigente
        ', FALSE);
    
        $this->db->from('usuario U');
        $this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMembresia = L.idMembresia', 'inner');
        $this->db->join('avisocobranza A', 'L.idLectura = A.idLectura', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
    
        $this->db->where('U.estado', 1);
        $this->db->where('U.rol', 0);
    
        if (!empty($busqueda)) {
            $this->db->group_start();
            $this->db->like('U.nombre', $busqueda);
            $this->db->or_like('U.primerApellido', $busqueda);
            $this->db->or_like('U.segundoApellido', $busqueda);
            $this->db->or_like('M.codigoSocio', $busqueda);
            $this->db->group_end();
        }
    
        $this->db->order_by('L.fechaLectura', 'DESC');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function contarAvisos($busqueda = '')
    {
        $this->db->from('usuario U');
        $this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMembresia = L.idMembresia', 'inner');
        $this->db->join('avisocobranza A', 'L.idLectura = A.idLectura', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
    
        $this->db->where('U.estado', 1);
        $this->db->where('U.rol', 0);
    
        if (!empty($busqueda)) {
            $this->db->group_start();
            $this->db->like('U.nombre', $busqueda);
            $this->db->or_like('U.primerApellido', $busqueda);
            $this->db->or_like('U.segundoApellido', $busqueda);
            $this->db->or_like('M.codigoSocio', $busqueda);
            $this->db->group_end();
        }
    
        return $this->db->count_all_results();
    }
    
}


