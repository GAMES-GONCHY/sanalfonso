<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_model extends CI_Model
{
	public function insert_qr($data) 
    {
        $this->db->insert('qr', $data);
        return $this->db->insert_id(); // Devolver el ID del registro insertado
    }

    // Función para actualizar el campo 'img' con el nombre de la imagen
    public function update_qr_image($id, $image_name) 
    {
        $this->db->set('img', $image_name);
        $this->db->where('idQr', $id);
        return $this->db->update('qr');
    }
}
