<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalogger_model extends CI_Model
{
	public function habilitados()
    {
        $this->db->select('D.codigoDatalogger, M.codigoMedidor, ME.codigoSocio,
                        CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,""))  AS nombreSocio,
                        D.IP AS IP, D.puerto AS puerto, D.fechaRegistro, D.idDatalogger');
        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = ME.idUsuario', 'inner');
        $this->db->where('D.estado <>', 0);
        $this->db->where('M.estado', 1);
        $this->db->order_by('D.fechaRegistro', 'DESC');

        $query = $this->db->get();
        return $query;
    }
    public function nuevos_y_habilitados()
    { 
        $this->db->where_in('estado', [1,2]);
        $query = $this->db->get('datalogger');
        return $query;
    }
    public function deshabilitados()
    {
        $this->db->select('D.codigoDatalogger, M.codigoMedidor, ME.codigoSocio,
                        CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,""))  AS nombreSocio,
                        D.IP AS IP, D.puerto AS puerto, D.fechaRegistro, D.idDatalogger');
        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = ME.idUsuario', 'inner');
        $this->db->where('D.estado', 0);
        $this->db->where('M.estado', 1);
        $this->db->order_by('D.fechaActualizacion', 'DESC');

        $query = $this->db->get();
        return $query;
    }
	public function agregar($data)
	{
		$this->db->insert('datalogger', $data);
        return $this->db->insert_id();
	}
    public function modificar($idDatalogger,$data)
	{
		$this->db->where('idDatalogger', $idDatalogger);
        $this->db->update('datalogger',$data);

        return $this->db->affected_rows() > 0;
	}
    public function recuperaridmax()
	{
		$this->db->select_max('idDatalogger');
        $this->db->where('estado', 1); 
        $query = $this->db->get('datalogger');
        //return $query->row()->idDatalogger;
        return $query;
	}
    public function contardl()
	{
		$query = $this->db->count_all('datalogger');
        return $query;
	}
    
    public function obtenerip()
	{
        $this->db->distinct();
        $this->db->select('M.idMembresia, ME.codigoSocio, D.codigoDatalogger, 
                        D.IP, D.puerto, M.codigoMedidor, M.idMedidor,
                        CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,""))  AS nombreSocio');
        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = ME.idUsuario', 'inner');
        $this->db->where('D.estado', 1);
        $this->db->where('M.estado', 1);
        $this->db->where('D.IP <>', '0.0.0.0');
        $this->db->where('D.IP IS NOT NULL', null, false);
        $this->db->where('D.puerto IS NOT NULL', null, false);
        $query = $this->db->get();

        
        if ($query->num_rows() > 0) 
        {
            log_message('debug', 'Dataloggers encontrados: ' . json_encode($query->result_array()));
            return $query->result_array();
        }
        else 
        {
            log_message('debug', 'No se encontraron dataloggers activos.');
            return []; // Retorna un arreglo vacío si no hay resultados
        }
    }
    public function recuperarinfousuario($idDatalogger)
    {
        $this->db->select('D.IP, M.idMembresia');
        $this->db->from('datalogger D');
        $this->db->join('medidor M', 'D.idDatalogger = M.idDatalogger', 'inner');
        $this->db->where('M.estado', 1);
        $this->db->where('D.estado', 1);
        $this->db->where('D.idDatalogger', $idDatalogger);
        $query = $this->db->get();
        return $query->row();
    }


    public function configurar($idDatalogger, $data)
    {
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $data['estado'] = 1;
        // Condición para la actualización
        $this->db->where('idDatalogger', $idDatalogger);
        return $this->db->update('datalogger', $data);
    }
    public function eliminarDatalogger($idDatalogger)
    {
        // Actualizar el campo `estado` a 0 para marcarlo como eliminado lógicamente
        $data['estado'] = 0;
        $data['fechaActualizacion'] = date('Y-m-d H:i:s');
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $this->db->where('idDatalogger', $idDatalogger);
        return $this->db->update('datalogger', $data); // Cambia 'estado' a 'eliminado' si usas otro nombre
    }
    public function restaurarDatalogger($id)
    {
        $data['estado'] = 1;
        $data['fechaActualizacion'] = date('Y-m-d H:i:s');
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $data['IP'] = '0.0.0.0';
        $this->db->where('idDatalogger', $id);
        return $this->db->update('datalogger', $data); // Cambia 'estado' a 'eliminado' si usas otro nombre
    }

}
