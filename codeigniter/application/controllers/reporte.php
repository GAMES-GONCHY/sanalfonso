<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function historialpagos()
    {
        // Llamada a la función `ufcPorcentajeAvisos` en MySQL
        // $data['porcentaje'] = $this->reporte_model->porcentaje_vencidos_rechazados();
        // log_message('debug', 'porcentaje: ' . print_r($data['porcentaje'], true));

        // $data['top1'] = $this->reporte_model->obtener_top1();

        // $data['consumo'] = $this->reporte_model->consumo_total_ultima_lectura();
        // log_message('debug', 'consumo-pago erratico: ' . print_r($data['consumo'], true));
        // // Establece el locale en español
        // setlocale(LC_TIME, 'es_ES.UTF-8');

        // // Verifica si hay una fecha en $data['top1']
        // if ($data['top1'] && isset($data['top1']['fechaLectura'])) {
        //     $fecha = new DateTime($data['top1']['fechaLectura']);
            
        //     // Usa IntlDateFormatter para obtener el mes en español
        //     $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
        //     $mesEnMinuscula = $formatter->format($fecha);

        //     // Capitaliza la primera letra del mes
        //     $data['top1']['fechaLectura'] = ucfirst($mesEnMinuscula);
        // }

        // log_message('debug', 'top 1: ' . print_r($data['top1'], true));


        


        //$data['historial'] = $this->reporte_model->get_pagos();
        $this->load->view('incrustaciones/vistascoloradmin/headreportes');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('historialreportes');
        $this->load->view('incrustaciones/vistascoloradmin/footerreportes');

    }
    public function buscar_socio() 
    {
        // Recibir el código del socio desde la petición AJAX
        $criterio = $this->input->post('criterio');  // Cambiado a $criterio
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');
        
        // Buscar al socio en la base de datos
        $socio = $this->reporte_model->obtener_socio_por_criterio($criterio);
        
        // Registrar el contenido de $socio en el log para depuración
        log_message('info', 'Contenido de socio: ' . print_r($socio, true));

        if ($socio)
        {
            echo json_encode($socio);  // Retornar el socio encontrado en formato JSON
        }
        else 
        {
            echo 'false';  // Si no se encuentran resultados
        }
    }
    public function historial_pagos()//VERIFICAR USO
    {
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');

        $historialPagos = $this->reporte_model->obtener_historial_pagos($data);
        
        // Retorna los datos como JSON
        echo json_encode($historialPagos);
    }
    public function obtener_reporte() 
    {
        $tipoReporte = $this->input->post('tipoReporte');
        if($tipoReporte!='ranking')
        {
            $data['codigoSocio'] = $this->input->post('codigoSocio');
            $data['idMembresia'] = trim($this->input->post('idMembresia') ?? '');
            $data['fechaInicio'] = $this->input->post('fechaInicio');
            $data['fechaFin'] = $this->input->post('fechaFin');
        }
        else
        {
            $data['mes'] = $this->input->post('mes');
            $data['anio'] = $this->input->post('anio');
        }
        
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        $response = [];
        log_message('debug', 'Datos recibidos para ranking: ' . print_r($data, true));

        if ($tipoReporte == 'pagos')
        {
            // Definir encabezados para "pagos"
            $response['headers'] = ["No.", "Mes - Año", "Total [Bs.]", "Fecha pago"];

            // Obtener datos del modelo
            $historialPagos = $this->reporte_model->historial_pagos($data);

            if (!empty($historialPagos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($pago, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $pago['periodo'], // Ejemplo: "Mayo 2024"
                        $pago['monto'], // Ejemplo: "80.00"
                        $pago['fechaPago'] // Ejemplo: "25/10/2024"
                    ];
                }, $historialPagos, array_keys($historialPagos));
            } 
            else
            {
                $response['data'] = []; // Si no hay datos, devolvemos un arreglo vacío
            }
        }
        elseif ($tipoReporte == 'consumos')
        {
            // Definir encabezados para "consumos"
            $response['headers'] = ["No.", "Mes - Año", "Consumo [m3]", "Observación"];

             // Obtener datos del modelo
            $historialConsumos = $this->reporte_model->historial_consumo($data);

            if (!empty($historialConsumos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($consumo, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $consumo['fechaLectura'], // Ejemplo: "Mayo 2024"
                        $consumo['consumo'], // Ejemplo: "180.00"
                        $consumo['observacion']
                    ];
                }, $historialConsumos, array_keys($historialConsumos));
            }
            else
            {
                $response['data'] = [];
            }
        }
        elseif($tipoReporte == 'avisos')
        {
            $response['headers'] = ["No.", "Socio", "Código", "Mes-Año", "Total [Bs]", "Estado"];
             // Obtener datos del modelo
            $historialAvisos = $this->reporte_model->historial_avisos($data);
            log_message('debug', 'Datos de historial_avisos: ' . print_r($historialAvisos, true)); // Verifica si saldo aparece en todos los registros
            if (!empty($historialAvisos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($aviso, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $aviso['socio'],
                        $aviso['codigoSocio'],
                        $aviso['fechaLectura'],// Ejemplo: "Mayo"
                        $aviso['total'],
                        // $aviso['saldo'], // Saldo pendiente
                        $aviso['estado'] // Estado del aviso
                    ];
                }, $historialAvisos, array_keys($historialAvisos));
            } 
            else
            {
                $response['data'] = [];
            }
        }
        elseif ($tipoReporte == 'ranking') 
        {

             // Validar año en el backend
            if ($data['anio'] > date('Y')) {
                $response['data'] = [];
                $response['message'] = 'El año seleccionado no es válido.';
                echo json_encode($response);
                return;
            }

            // Definir encabezados para "ranking"
            $response['headers'] = ["Top", "Código", "Socio", "Consumo [m3]", "Total [Bs]"]; 

            // Obtener datos del modelo para el ranking
            $rankingConsumo = $this->reporte_model->obtener_top_consumidores($data);
            
            if (!empty($rankingConsumo))
            {
                // Formatear los datos para el Top 5 de consumidores
                $response['data'] = array_map(function($consumidor, $index) {
                    return [
                        $index + 1, // Número de ranking (1 a 10)
                        $consumidor['codigo'], // Código del socio
                        $consumidor['socio'], // Nombre del socio
                        $consumidor['consumo'], // Consumo total con 2 decimales
                        $consumidor['total'] // Total con 2 decimales
                    ];
                }, $rankingConsumo, array_keys($rankingConsumo));
            }
            else
            {
                $response['data'] = [];
                $response['message'] = 'No se encontraron registros para el reporte ranking.';
            }
        }               
        // Retornar los datos como JSON con headers y data
        echo json_encode($response);
    }
    public function generar_pdf_pago()
    {
        // Obtener los parámetros desde la solicitud
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        log_message('info', 'Tipo de reporte recibido en controlador: ' . $data['tipoReporte']);
        $data['socio'] = $this->input->post('socio');
    
        // Obtener el historial de pagos
        $data['pagos'] = $this->reporte_model->historial_pagos($data);
    
        // Verificar si hay datos disponibles
        if (empty($data['pagos'])) {
            show_error('No hay datos disponibles para generar el reporte.', 500);
        }
    
        // Formatear las fechas en español
        $data['fechaInicioFormateada'] = formatearFecha($data['fechaInicio']);
        $data['fechaFinFormateada'] = formatearFecha($data['fechaFin']);
    
        // 🔹 **Carga del Logo desde el Controlador**
        $logoPath = FCPATH . 'uploads/img/sanalfonso.png';
        if (file_exists($logoPath)) {
            // Convertir la imagen a Base64 para asegurar compatibilidad con Dompdf
            $data['logo'] = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $data['logo'] = ''; // En caso de que no exista el logo
        }
    
        // Añadir pie de página con paginación
        $data['footer_script'] = '<script type="text/php">
                                    if (isset($pdf)) { 
                                        $pdf->page_script(\'if ($PAGE_COUNT > 1) { 
                                            $pdf->text(500, 780, "Página " . $PAGE_NUM . " de " . $PAGE_COUNT, "Arial", 10);
                                        }\');
                                    }
                                </script>';
    
        // Cargar la vista con los datos y convertirla en HTML
        $html = $this->load->view('pdf/historial_pagos_pdf', $data, true);
    
        // Generar el PDF en tamaño carta y abrirlo en el navegador
        $this->dompdf_lib->generar_pdf($html, "Historial_Pagos_{$data['socio']}.pdf", false, 'Letter', 'portrait');
    }
    
    public function generar_pdf_consumo()
    {
        // Obtener los parámetros desde la solicitud
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        log_message('info', 'Tipo de reporte recibido en controlador: ' . $data['tipoReporte']);
        $data['socio'] = $this->input->post('socio');
    
        // Obtener el historial de consumos
        $data['consumos'] = $this->reporte_model->historial_consumo($data);
    
        // Verificar si hay consumos disponibles
        if (empty($data['consumos'])) {
            show_error('No hay datos disponibles para generar el reporte.', 500);
        }
    
        // Formateo de fechas con mes y año en español
        // $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        // $fmt->setPattern("d MMMM y");
    
        $data['fechaInicioFormateada'] = formatearFecha($data['fechaInicio']);
        $data['fechaFinFormateada'] = formatearFecha($data['fechaFin']);
    
        // 🔹 **Carga del Logo desde el Controlador**
        $logoPath = FCPATH . 'uploads/img/sanalfonso.png';
        if (file_exists($logoPath)) {
            // Convertir la imagen a Base64 para asegurar compatibilidad con Dompdf
            $data['logo'] = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $data['logo'] = ''; // En caso de que no exista el logo
        }
        

        // Añadir pie de página con paginación
        $data['footer_script'] = '<script type="text/php">
                                    if (isset($pdf)) { 
                                        $pdf->page_script(\'if ($PAGE_COUNT > 1) { 
                                            $pdf->text(500, 780, "Página " . $PAGE_NUM . " de " . $PAGE_COUNT, "Arial", 10);
                                        }\');
                                    }
                                </script>';

        // Cargar la vista con los datos y convertirla en HTML
        $html = $this->load->view('pdf/historial_consumo_pdf', $data, true);
    
        // Generar el PDF en tamaño carta y abrirlo en el navegador
        $this->dompdf_lib->generar_pdf($html, "Historial_Consumo_{$data['socio']}.pdf", false, 'Letter', 'portrait');
    }
    public function generar_pdf_avisos()
    {
        // Obtener los parámetros desde la solicitud
        if (!empty($this->input->post('codigoSocio')) && !empty($this->input->post('idMembresia')))
        {
            $data['codigoSocio'] = $this->input->post('codigoSocio');
            $data['idMembresia'] = $this->input->post('idMembresia');
            $data['socio'] = $this->input->post('socio');
        }
    
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
    
        // Llamar al modelo para obtener el historial de avisos vencidos
        $data['avisos'] = $this->reporte_model->historial_avisos($data);
    
        // Verificar si hay datos disponibles
        if (empty($data['avisos'])) {
            show_error('No hay datos disponibles para generar el reporte.', 500);
        }
    
        // Formatear las fechas en español
        $data['fechaInicioFormateada'] = formatearFecha($data['fechaInicio']);
        $data['fechaFinFormateada'] = formatearFecha($data['fechaFin']);
    
        // Cargar el logo en formato base64
        $logoPath = FCPATH . 'uploads/img/sanalfonso.png';
        if (file_exists($logoPath)) {
            $data['logo'] = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $data['logo'] = '';
        }
    
        // Pie de página con paginación
        $data['footer_script'] = '<script type="text/php">
                                    if (isset($pdf)) { 
                                        $pdf->page_script(\'if ($PAGE_COUNT > 1) { 
                                            $pdf->text(500, 780, "Página " . $PAGE_NUM . " de " . $PAGE_COUNT, "Arial", 10);
                                        }\');
                                    }
                                </script>';
    
        // Cargar la vista con los datos y convertirla en HTML
        $html = $this->load->view('pdf/historial_avisos_pdf', $data, true);
    
        // Generar el PDF en tamaño carta y abrirlo en el navegador
        $this->dompdf_lib->generar_pdf($html, "Historial_Avisos_Vencidos.pdf", false, 'Letter', 'portrait');
    }
    
    public function generar_pdf_ranking()
    {
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        $data['opcionRanking'] = $this->input->post('opcionRanking');

        // Obtener los parámetros desde la solicitud
        if ($data['opcionRanking'] === 'MENSUAL') {
            $data['mes'] = $this->input->post('mes');
            $data['anio'] = $this->input->post('anio');
        } elseif ($data['opcionRanking'] === 'ANUAL') {
            $data['anio'] = $this->input->post('anio');
        } else { // GLOBAL
            $data['mes'] = null;
            $data['anio'] = null;
        }

        $meses = [
            "1" => 'Enero', "2" => 'Febrero', "3" => 'Marzo', "4" => 'Abril',
            "5" => 'Mayo', "6" => 'Junio', "7" => 'Julio', "8" => 'Agosto',
            "9" => 'Septiembre', "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre'
        ];

        // Obtener el ranking de consumidores
        $data['ranking'] = $this->reporte_model->obtener_top_consumidores($data);

        // Verificar si hay datos disponibles
        if (empty($data['ranking'])) {
            show_error('No hay datos disponibles para generar el reporte.', 500);
        }

        // Determinar el periodo del reporte
        if ($data['opcionRanking'] == "GLOBAL") {
            $data['periodo'] = 'Global';
        } elseif ($data['opcionRanking'] == "MENSUAL") {
            $mesLiteral = isset($meses[$data['mes']]) ? $meses[$data['mes']] : 'Mes desconocido';
            $data['periodo'] = $mesLiteral . ' de ' . $data['anio'];
        } else {
            $data['periodo'] = $data['anio'];
        }

        // Cargar el logo en formato base64
        $logoPath = FCPATH . 'uploads/img/sanalfonso.png';
        if (file_exists($logoPath)) {
            $data['logo'] = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        } else {
            $data['logo'] = '';
        }

        // Pie de página con paginación
        $data['footer_script'] = '<script type="text/php">
                                    if (isset($pdf)) { 
                                        $pdf->page_script(\'if ($PAGE_COUNT > 1) { 
                                            $pdf->text(500, 780, "Página " . $PAGE_NUM . " de " . $PAGE_COUNT, "Arial", 10);
                                        }\');
                                    }
                                </script>';

        // Cargar la vista con los datos y convertirla en HTML
        $html = $this->load->view('pdf/historial_ranking_pdf', $data, true);

        // Generar el PDF en tamaño carta y abrirlo en el navegador
        $this->dompdf_lib->generar_pdf($html, "Ranking_Consumidores.pdf", false, 'Letter', 'portrait');
    }

    public function obtener_avisos_vencidos_rechazados()
    {
        $total = $this->reporte_model->total_vencidos();
        
        echo json_encode(['cantidad' => $total]);
    }

}
