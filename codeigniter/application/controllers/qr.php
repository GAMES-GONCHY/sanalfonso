<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qr extends CI_Controller
{
	// Función para manejar la inserción del registro QR y la carga de la imagen
    public function upload() 
	{
        // Obtener la fecha de vencimiento del formulario
        $fechaVencimiento = $this->input->post('fechaVencimiento');

        // Preparar los datos para la inserción inicial, dejando otros campos como nulos
        $data = array(
            'fechaVencimiento' => $fechaVencimiento,
        );

        // Insertar el registro en la tabla 'qr' usando el modelo y obtener el ID del nuevo registro
        $inserted_id = $this->qr_model->insert_qr($data);

        // Verificar si la inserción fue exitosa y si se seleccionó una imagen para cargar
        if ($inserted_id && !empty($_FILES['qrImage']['name'])) {
            $upload_status = $this->upload_image($inserted_id); // Cargar la imagen con el ID como nombre

            if ($upload_status) {
                $this->session->set_flashdata('success', 'Registro QR insertado y la imagen cargada con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Registro QR insertado, pero hubo un error al cargar la imagen.');
            }
        } else {
            $this->session->set_flashdata('success', 'Registro QR insertado sin imagen.');
        }

        // Redirigir de vuelta a la página de configuración del QR
        redirect('avisocobranza/gestion');
    }

    // Función para cargar la imagen y renombrarla con el ID del registro
    private function upload_image($id) 
	{
        $config['upload_path'] = './uploads/qr/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id; // Usar el ID como nombre base del archivo
        $config['overwrite'] = true; // Sobrescribir si existe un archivo con el mismo nombre
        $config['max_size'] = 2048; // Tamaño máximo en KB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('qrImage')) 
		{
            return false; // Devolver false si la carga falla
        }
		else
		{
            $upload_data = $this->upload->data();
            $file_extension = $upload_data['file_ext']; // Obtener la extensión del archivo (por ejemplo, .jpg)
            $new_file_name = $id . $file_extension; // Renombrar la imagen con el ID del registro y su extensión

            // Mover el archivo a la ubicación con el nuevo nombre
            rename($upload_data['full_path'], $upload_data['file_path'] . $new_file_name);

            // Actualizar el campo 'img' en la tabla 'qr' con el nuevo nombre del archivo
            $this->qr_model->update_qr_image($id, $new_file_name);
            return true; // Devolver true si la carga y actualización fueron exitosas
        }
    }
}
