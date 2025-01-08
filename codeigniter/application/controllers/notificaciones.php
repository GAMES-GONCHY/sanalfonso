<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificaciones extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Para las URLs de QR
        // Cargar librería para correos y generación de QR (suponiendo que la tienes)
    }
	public function enviarnotificaciones() {
        // Obtener todos los avisos pendientes
        $avisosPendientes = $this->Avisos_model->obtener_avisos_pendientes();
        
        foreach ($avisosPendientes as $aviso) {
            $usuarioId = $aviso['idUsuario'];
            
            // Generar un código QR para el pago
            $codigoQR = $this->generar_codigo_qr($aviso['idAviso']);
            
            // Actualizar el campo codigoQR en la base de datos
            $this->Avisos_model->actualizar_codigo_qr($aviso['idAviso'], $codigoQR);
            
            // Enviar notificación al usuario
            $this->enviar_correo($usuarioId, "Tu factura de agua está lista", "Puedes pagar utilizando el siguiente QR: <img src='" . base_url($codigoQR) . "' />");
        }

        echo "Notificaciones enviadas con éxito.";
    }
    // Método para generar el código QR (ajústalo según la librería que utilices)
    // public function generar_codigo_qr($idAviso) {
    //     $this->load->library('ciqrcode'); // Ejemplo de una librería de QR en CodeIgniter
    //     $qrData = base_url('pagar.php?idAviso=' . $idAviso);
	// 	$qrFilePath = FCPATH . 'uploads/qr_codes/aviso_' . $idAviso . '.png';			

    //     // Configuración de la librería
    //     $params['data'] = $qrData;
    //     $params['level'] = 'H';
    //     $params['size'] = 10;
    //     $params['savename'] = FCPATH . $qrFilePath;
    //     $this->ciqrcode->generate($params);
        
    //     return $qrFilePath;
    // }
	private function generar_codigo_qr($idAviso) {
		$qrData = base_url('pagar.php?idAviso=' . $idAviso);
		$qrFilePath = FCPATH . 'uploads/qr_codes/aviso_' . $idAviso . '.png';
		
		// Mensaje de depuración: Mostrar datos de QR y ruta de archivo
		echo "Generando QR para: " . $qrData . "<br>";
		echo "Guardando en: " . $qrFilePath . "<br>";
		
		try {
			// Crear un nuevo objeto QrCode
			$qrCode = new \Endroid\QrCode\QrCode($qrData);
			$qrCode->setSize(300);
			$qrCode->setErrorCorrectionLevel(\Endroid\QrCode\ErrorCorrectionLevel::HIGH);
	
			// Guardar el QR generado en la ruta especificada
			$qrCode->writeFile($qrFilePath);
			
			// Mensaje de depuración: Éxito al guardar
			echo "QR guardado correctamente.<br>";
	
			return 'uploads/qr_codes/aviso_' . $idAviso . '.png'; // Ruta relativa para almacenar en la base de datos
		} catch (Exception $e) {
			// Capturar errores y mostrarlos
			echo "Error al generar el QR: " . $e->getMessage() . "<br>";
			return null;
		}
	}
	
    // Método para enviar correos (ajústalo según tu configuración)
    public function enviar_correo($idUsuario, $subject, $message) {
        // Obtener el email del usuario
        $this->db->where('idUsuario', $idUsuario);
        $query = $this->db->get('usuario');
        $usuario = $query->row();
        
        // Configuración de correo (ajusta esto según tu servidor de correo)
        $this->load->library('phpmailer');
        $this->email->from('games.gonzalo.883@gmail.com', 'AquaReadPro');
        $this->email->to($usuario->email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
}
