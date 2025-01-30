<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza_model extends CI_Model
{
    public function cargaravisosbd($limit, $offset, $busqueda = '', $estado = '')
    {
        $this->db->select('CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido, "")) AS nombreSocio, 
                        M.idMembresia, M.codigoSocio, L.lecturaAnterior, L.lecturaActual, L.fechaLectura, A.fechaVencimiento, 
                        A.estado, A.idAviso, T.tarifaMinima, T.tarifaVigente', FALSE);
        $this->db->from('usuario U');
        $this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'M.idMembresia = L.idMembresia', 'inner');
        $this->db->join('avisocobranza A', 'L.idLectura = A.idLectura', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
    
        $this->db->where('U.estado', 1);
        $this->db->where('U.rol', 0);
    
        // Filtro de búsqueda
        if (!empty($busqueda)) {
            $this->db->group_start();
            $this->db->like('U.nombre', $busqueda);
            $this->db->or_like('U.primerApellido', $busqueda);
            $this->db->or_like('U.segundoApellido', $busqueda);
            $this->db->or_like('M.codigoSocio', $busqueda);
            $this->db->group_end();
        }
    
        // Filtro de estado
        if (!empty($estado)) {
            $this->db->where('A.estado', $estado); // Aplica el filtro de estado
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
    public function obtenerAvisoPorId($idAviso)
    {
        $this->db->select('A.*, 
                        CONCAT_WS(" ",U.nombre, U.primerApellido, IFNULL(U.segundoApellido,"")) as nombreSocio, 
                        M.codigoSocio,
                        L.fechaLectura,
                        L.lecturaActual,
                        L.lecturaAnterior,
                        T.tarifaVigente, 
                        T.tarifaMinima');
        $this->db->from('avisocobranza A');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->join('membresia M', 'L.idMembresia = M.idMembresia', 'inner');
        $this->db->join('usuario U', 'M.idUsuario = U.idUsuario', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
        $this->db->where('A.idAviso', $idAviso);

        $query = $this->db->get();

        // Retornar el resultado como fila única
        return $query->row_array();
    }
    public function evoluConsumo($idMembresia, $fechaLectura)
    {
        $this->db->select('L.fechaLectura,
                        L.lecturaActual,
                        L.lecturaAnterior,
                        A.estado,
                        T.tarifaVigente, 
                        T.tarifaMinima');
        $this->db->from('avisocobranza A');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->join('membresia M', 'L.idMembresia = M.idMembresia', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
        $this->db->where('L.idMembresia', $idMembresia);
        $this->db->where('L.fechaLectura >=', "DATE_SUB('$fechaLectura', INTERVAL 3 MONTH)", false);
        $this->db->where('L.fechaLectura <=', $fechaLectura);
    
        $query = $this->db->get();
    
        // Retornar el resultado como fila única
        return $query->result_array();
    }
    public function actualizarEstado($idAviso, $data)
    {
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $data['fechaActualizacion'] = date('Y-m-d H:i:s');
    
        // Obtener la fecha actual con hora 00:00:00
        $fechaActual = date('Y-m-d') . ' 00:00:00';
    
        // Validaciones de estado
        if ($data['estado'] === 'PAGADO') {
            $data['fechaPago'] = date('Y-m-d H:i:s');
        } elseif (($data['estado'] === 'VENCIDO' && $data['fechaVencimiento'] > $fechaActual) || ($data['estado'] === 'ENVIADO' && $data['fechaVencimiento'] <= $fechaActual))
        {
            return false;
        } else {
            $data['fechaPago'] = null;
        }
    
        // Actualizar en la base de datos
        return $this->db->where('idAviso', $idAviso)->update('avisocobranza', $data);
    }
}


