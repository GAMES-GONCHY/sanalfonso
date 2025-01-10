<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura_model extends CI_Model
{
    public function obtenerLecturas()
    {
        $this->db->select('l.*, m.codigoMedidor, d.puerto, d.codigoDatalogger, CONCAT(u.nombre, " ", u.primerApellido, " ", IFNULL(u.segundoApellido,"")) AS nombreSocio, mb.codigoSocio');
        $this->db->from('lectura l');
        $this->db->join('medidor m', 'm.idMedidor = l.idMedidor', 'inner');
        $this->db->join('datalogger d', 'd.idDatalogger = m.idDatalogger', 'inner');
        $this->db->join('membresia mb', 'mb.idMembresia = m.idMembresia', 'inner');
        $this->db->join('usuario u', 'u.idUsuario = mb.idUsuario', 'inner');
        $this->db->where('l.estado', 1);
        $this->db->order_by('l.fechaLectura', 'DESC'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insertarLectura($dataLectura)
    {
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $this->db->insert('lectura', $dataLectura);
    }
    public function insertarLecturaTemporal($dataLectura)
    {
        $this->db->insert('lectura_temp', $dataLectura);
    }
    public function obtenerUltimaLectura($idMedidor)
    {
        $this->db->select('lecturaActual');
        $this->db->from('lectura');
        $this->db->where('idMedidor', $idMedidor);
        $this->db->order_by('fechaLectura', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
            return $query->row()->lecturaActual;
        }
        else 
        {
            return 0; // Si no hay lecturas previas, devolver 0
        }
    }
    public function deshabilitados()
    {
        $this->db->select('l.*, m.codigoMedidor, d.puerto, d.codigoDatalogger');
        $this->db->from('lectura l');
        $this->db->join('medidor m', 'm.idMedidor = l.idMedidor', 'inner');
        $this->db->join('datalogger d', 'd.idDatalogger = m.idDatalogger', 'inner');
        $this->db->where('l.estado', 0);
        $this->db->order_by('l.fechaLectura', 'DESC'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    public function lecturastiemporeal()
    {
        $query = $this->db->get('lectura_temp'); 
    
        return $query->result_array();
    }
    public function truncarLecturasTemporales() 
    {
        $this->db->truncate('lectura_temp');
    }
    
    public function modificar($id, $data) 
    {
        $data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaActualizacion']=date('Y-m-d H:i:s');
		$this->db->where('idLectura', $id);
		$this->db->update('lectura', $data);
    }
    public function verificarFechaLectura($idMedidor) 
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('lectura');
        $this->db->where('idMedidor', $idMedidor);
        $this->db->where('MONTH(fechaLectura) = MONTH(CURDATE())', null, false);  // Comparar el mes
        $this->db->where('YEAR(fechaLectura) = YEAR(CURDATE())', null, false);
        $query = $this->db->get();

        return ($query->row()->total==0);
    }
    
}