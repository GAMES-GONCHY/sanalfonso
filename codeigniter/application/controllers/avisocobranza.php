<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function avisos()
    {
        $this->load->view('incrustaciones/vistascoloradmin/headavisos');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisos'); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function cargaravisos()
    {
        $pagina = $this->input->get('pagina') ?? 1; // Recoge la página desde el frontend
        $busqueda = $this->input->get('busqueda') ?? ''; // Recoge la búsqueda desde el frontend
        $estado = $this->input->get('filtro') ?? ''; // Recoge el estado desde el frontend (filtro seleccionado)
    
        $limit = 10; // Registros por página
        $offset = ($pagina - 1) * $limit; // Calcula desde dónde empezar
    
        // Obtener los avisos filtrados desde el modelo
        $avisos = $this->avisocobranza_model->cargaravisosbd($limit, $offset, $busqueda, $estado);
        $total_paginas = ceil($this->avisocobranza_model->contarAvisos($busqueda, $estado) / $limit);
        
        // Respuesta JSON
        echo json_encode([
            'avisos' => $avisos,
            'total_paginas' => $total_paginas,
        ]);
    }
    
    public function generarPDFAviso($idAviso, $idMembresia)
    {
        // Cargar los datos del aviso desde el modelo
        $data['aviso'] = $this->avisocobranza_model->obtenerAvisoPorId($idAviso);
        $data['evolucionConsumo'] = $this->avisocobranza_model->evoluConsumo($idMembresia, $data['aviso']['fechaLectura']);

        if (!empty($data['evolucionConsumo']) && is_array($data['evolucionConsumo'])) {
            foreach ($data['evolucionConsumo'] as &$consumo) {
                if (isset($consumo['fechaLectura'])) {
                    // Formatear las fechas para la salida
                    $consumo['fechaLectura'] = fechaSoloMesAnio($consumo['fechaLectura']);
                }
            }
        }
        // log_message('debug', 'Datos recibidos en el controlador: ' . json_encode($data['evolucionConsumo']));
        // Verificar si el aviso existe
        if (empty($data['aviso'])) {
            show_404(); // Si el aviso no existe, muestra error 404
        }
    
        // Ruta absoluta del logo
        $logoPath = FCPATH . 'uploads/img/sanalfonso.png';
        if (file_exists($logoPath)) {
            // Convertir la imagen a Base64 para asegurarse de que Dompdf pueda procesarla
            $data['logo'] = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $data['logo'] = ''; // Si no existe, dejar vacío
        }
        
        if (isset($data['aviso']['fechaLectura']) && isset($data['aviso']['fechaVencimiento'])) {
            // Usar la fecha original para operaciones de DateTime
            $fechaOriginal = $data['aviso']['fechaLectura']; // Fecha original sin formatear
        
            // Formatear las fechas para la salida
            $data['aviso']['fechaLectura'] = fechaSoloMesAnio($fechaOriginal);
            $data['aviso']['fechaVencimiento'] = formatearFecha($data['aviso']['fechaVencimiento']);
        
            if($data['aviso']['lecturaAnterior']!=0 && $data['aviso']['lecturaActual']!=0)
            {
                // Restar un mes usando DateTime y la fecha original
                $fecha = new DateTime($fechaOriginal); // Usar fecha sin formatear
                $fecha->modify('-1 month'); // Restar un mes
            
                // Formatear la fecha ajustada
                $data['aviso']['fechaAnterior'] = formatearFecha($fecha->format('Y-m-d')); // Ajustar formato final
            }
            else
            {
                $data['aviso']['fechaAnterior'] = "Sin fecha";
            }
        }

        
        
        // Cargar la vista para generar el contenido del PDF
        $html = $this->load->view('pdf/aviso_detalle', $data, true);
    
        // Inicializar Dompdf con opciones para habilitar URLs remotas
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
    
        // Configurar el tamaño y orientación del papel
        $customPaper = array(0, 0, 595.28, 500); // Ancho y alto en puntos
        $dompdf->setPaper($customPaper, 'portrait');
    
        // Renderizar el PDF
        $dompdf->render();
    
        // Generar el archivo PDF para abrir en el navegador
        $dompdf->stream("aviso_cobranza_$idAviso.pdf", array("Attachment" => 0)); // Attachment = 0 lo abre en nueva pestaña
    }
    public function cambiarEstadoAviso()
    {
        // Recibir los datos enviados por AJAX
        $input = json_decode(file_get_contents('php://input'), true);
    
        // Validar que se recibió el idAviso y el nuevoEstado
        if (!isset($input['idAviso']) || !isset($input['nuevoEstado']) || !isset($input['fechaVencimiento'])) {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
            return;
        }
    
        $idAviso = $input['idAviso'];
        $data['estado'] = $input['nuevoEstado'];
        $data['fechaVencimiento'] = $input['fechaVencimiento'];
    
        // Actualizar el estado en la base de datos
        $resultado = $this->avisocobranza_model->actualizarEstado($idAviso, $data);
    
        if ($resultado) {
            // Éxito: devolver respuesta positiva
            echo json_encode(['success' => true, 'message' => 'Estado actualizado correctamente.']);
        } else {
            // Error: devolver respuesta negativa
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el estado.']);
        }
    }
    
    
}
