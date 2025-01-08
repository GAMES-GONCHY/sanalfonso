<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function historialpagos()
    {
        // Llamada a la función `ufcPorcentajeAvisos` en MySQL
        $data['porcentaje'] = $this->reporte_model->porcentaje_vencidos_rechazados();
        log_message('debug', 'porcentaje: ' . print_r($data['porcentaje'], true));

        $data['top1'] = $this->reporte_model->obtener_top1();

        $data['consumo'] = $this->reporte_model->consumo_total_ultima_lectura();
        log_message('debug', 'consumo-pago erratico: ' . print_r($data['consumo'], true));
        // Establece el locale en español
        setlocale(LC_TIME, 'es_ES.UTF-8');

        // Verifica si hay una fecha en $data['top1']
        if ($data['top1'] && isset($data['top1']['fechaLectura'])) {
            $fecha = new DateTime($data['top1']['fechaLectura']);
            
            // Usa IntlDateFormatter para obtener el mes en español
            $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
            $mesEnMinuscula = $formatter->format($fecha);

            // Capitaliza la primera letra del mes
            $data['top1']['fechaLectura'] = ucfirst($mesEnMinuscula);
        }

        log_message('debug', 'top 1: ' . print_r($data['top1'], true));


        


        //$data['historial'] = $this->reporte_model->get_pagos();
        $this->load->view('incrustaciones/vistascoloradmin/headreportes');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('historialreportes', $data);
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
            $historialPagos = $this->reporte_model->obtener_datos_historicos($data);

            if (!empty($historialPagos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($pago, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $pago['fechaLectura'], // Ejemplo: "Mayo 2024"
                        $pago['totalPagado'], // Ejemplo: "80.00"
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
            $response['headers'] = ["No.", "Socio", "Código", "Mes", "Total [Bs]", "Saldo [Bs]", "Estado"];
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
                        $aviso['saldo'], // Saldo pendiente
                        $aviso['estado'], // Estado del aviso
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
        $socio = $this->input->post('socio');
        
        // Llamar al modelo para obtener el historial de pagos
        $pagos = $this->reporte_model->obtener_datos_historicos($data);
    
        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('P', 'mm', 'Letter');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();
        
        // Encabezado principal
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 16);
    
        // Calcular el ancho disponible para la celda
        $pageWidth = $pdf->GetPageWidth();
        $margenIzquierdo = 45; // Ajuste para desplazar la tabla más hacia la derecha
        $margenDerecho = 30;
        $anchoDisponible = $pageWidth - $margenIzquierdo - $margenDerecho;
    
        // Centrar el texto usando el ancho disponible
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell($anchoDisponible, 15, utf8_decode('Historial de Pagos'), 0, 1, 'C', true);
        $pdf->Ln(5);
    
        // Subtítulo "AquaReadPro"
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->Cell(50, 10, 'AquaReadPro', 0, 1, 'L');
        $pdf->Ln(5);
    
        // Detalles del socio y periodo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(50);
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Código: ') . $data['codigoSocio'], 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Socio: ') . $socio, 0, 1, 'L');

        // Formateo de fechas con día, mes en literal y año en español
        $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmt->setPattern("d MMMM y");

        $fechaInicioFormateada = ucfirst($fmt->format(new DateTime($data['fechaInicio'])));
        $fechaFinFormateada = ucfirst($fmt->format(new DateTime($data['fechaFin'])));




        // Imprimir el periodo en el formato deseado
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, 'Periodo: ' .$fechaInicioFormateada. ' a ' . $fechaFinFormateada, 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);
    
        // Configuración de la tabla y centrado horizontal
        $tableStartX = $margenIzquierdo; // Usar el mismo margen para la tabla
    
        // Encabezado de la tabla
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, '#', 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Avisos pagados', 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Total Pagado [Bs.]', 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Fecha Pago', 0, 1, 'C', true);
    
        // Datos de la tabla
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $totalPagado = 0;
        $contador = 1;
    
        $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    
        foreach ($pagos as $pago) {
            $pdf->SetX($tableStartX);
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill);
    
            $fechaLectura = strtotime($pago['fechaLectura']);
            $mesLiteral = $meses[date('n', $fechaLectura) - 1];
            $anio = date('Y', $fechaLectura);
    
            $pdf->Cell(40, 10, ucfirst($mesLiteral) . ' ' . $anio, 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, number_format($pago['totalPagado'], 2), 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, date('d/m/Y', strtotime($pago['fechaPago'])), 0, 1, 'C', $fill);
            $totalPagado += $pago['totalPagado'];
            $fill = !$fill;
        }
    
        // Fila de Totales
        $pdf->SetX($tableStartX);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(10, 8, '', 0, 0, 'C', true);
        $pdf->Cell(40, 8, 'Totales:', 0, 0, 'L', true);
        $pdf->Cell(40, 8, number_format($totalPagado, 2), 0, 0, 'C', true);
        $pdf->Cell(40, 8, '', 0, 1, 'C', true);
        
        // Establecer el título del PDF
        $pdf->SetTitle('Historial_Pagos_' . $socio);
        // Salida del PDF
        $pdf->Output('Historial_Pagos_' . $data['codigoSocio'] . '.pdf', 'I');
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
        $socio = $this->input->post('socio');
        
        // Llamar al modelo para obtener el historial de consumos
        $consumos = $this->reporte_model->historial_consumo($data);
        
        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('P', 'mm', 'Letter');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();
        
        // Encabezado principal
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 16);
        
        // Calcular el ancho disponible para la celda
        $pageWidth = $pdf->GetPageWidth();
        $margenIzquierdo = 45;
        $margenDerecho = 30;
        $anchoDisponible = $pageWidth - $margenIzquierdo - $margenDerecho;
        
        // Título del reporte
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell($anchoDisponible, 15, utf8_decode('Historial de Consumos'), 0, 1, 'C', true);
        $pdf->Ln(5);
        
        // Subtítulo "AquaReadPro"
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->Cell(50, 10, 'AquaReadPro', 0, 1, 'L');
        $pdf->Ln(5);
        
        // Detalles del socio y periodo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(50);
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Código: ') . $data['codigoSocio'], 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Socio: ') . $socio, 0, 1, 'L');
        
        // Formateo de fechas con día, mes en literal y año en español
        $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmt->setPattern("d MMMM y");

        $fechaInicioFormateada = ucfirst($fmt->format(new DateTime($data['fechaInicio'])));
        $fechaFinFormateada = ucfirst($fmt->format(new DateTime($data['fechaFin'])));

        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, 'Periodo: ' . $fechaInicioFormateada . ' a ' . $fechaFinFormateada, 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);
        
        // Configuración de la tabla de consumos
        $tableStartX = $margenIzquierdo;
        
        // Encabezado de la tabla
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, '#', 0, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Mes - Año'), 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Consumo [m3]', 0, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Observación'), 0, 1, 'C', true);
        
        // Datos de la tabla de consumos
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $contador = 1;
        $totalConsumo = 0;  // Variable para almacenar el total de consumo
        
        foreach ($consumos as $consumo) {
            $pdf->SetX($tableStartX);
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill);
        
            $fechaLectura = strtotime($consumo['fechaLectura']);
            $mesLiteral = $fmt->format(new DateTime($consumo['fechaLectura']));
            
            $pdf->Cell(40, 10, ucfirst($mesLiteral), 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, number_format($consumo['consumo'], 2), 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, utf8_decode($consumo['observacion']), 0, 1, 'C', $fill);
            
            $totalConsumo += $consumo['consumo'];  // Sumar el consumo al total
            $fill = !$fill;
        }
        
        // Agregar fila de totales
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);  // Color de fondo para la fila de totales
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, '', 0, 0, 'C', true);                // Columna de número vacía
        $pdf->Cell(40, 10, 'Total', 0, 0, 'C', true);           // Etiqueta de total
        $pdf->Cell(40, 10, number_format($totalConsumo, 2), 0, 0, 'C', true);  // Total de consumo
        $pdf->Cell(40, 10, '', 0, 1, 'C', true);                // Columna de observación vacía
        
        // Establecer el título del PDF
        $pdf->SetTitle('Historial_Consumo_' . $socio);

        // Salida del PDF
        $pdf->Output('Historial_Consumo_' . $socio . '.pdf', 'I');
    }
    
    public function generar_pdf_avisos()
    {
        // Obtener los parámetros desde la solicitud
        if (!empty($this->input->post('codigoSocio')) && !empty($this->input->post('idMembresia')))
        {
            $data['codigoSocio'] = $this->input->post('codigoSocio');
            $data['idMembresia'] = $this->input->post('idMembresia');
            $socio = $this->input->post('socio');
        }
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        
        // Llamar al modelo para obtener el historial de avisos
        $avisos = $this->reporte_model->historial_avisos($data);
    
        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('P', 'mm', 'Letter');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();
    
        // Encabezado principal
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 16);
    
        // Calcular el ancho disponible para la celda
        $pageWidth = $pdf->GetPageWidth();
        $margenIzquierdo = 45;
        $margenDerecho = 30;
        $anchoDisponible = $pageWidth - $margenIzquierdo - $margenDerecho;
    
        // Título del reporte
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell($anchoDisponible, 15, utf8_decode('Historial de Avisos Vencidos'), 0, 1, 'C', true);
        $pdf->Ln(5);
    
        // Subtítulo "AquaReadPro"
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->Cell(50, 10, 'AquaReadPro', 0, 1, 'L');
        $pdf->Ln(5);
    
        // Detalles del socio y periodo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(50);
    
        // Validar y mostrar el código del socio solo si está definido
        if (!empty($data['codigoSocio'])) {
            $pdf->SetX($margenIzquierdo - 20);
            $pdf->Cell(0, 5, utf8_decode('Código: ') . $data['codigoSocio'], 0, 1, 'L');
        }
    
        // Validar y mostrar el nombre del socio solo si está definido
        if (!empty($socio)) {
            $pdf->SetX($margenIzquierdo - 20);
            $pdf->Cell(0, 5, utf8_decode('Socio: ') . $socio, 0, 1, 'L');
        }
    

        // Formateo de fechas con día, mes en literal y año en español
        $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmt->setPattern("d MMMM y");

        $fechaInicioFormateada = ucfirst($fmt->format(new DateTime($data['fechaInicio'])));
        $fechaFinFormateada = ucfirst($fmt->format(new DateTime($data['fechaFin'])));

        $pdf->SetX($margenIzquierdo - 20);
        $pdf->Cell(0, 5, 'Periodo: ' . $fechaInicioFormateada . ' a ' . $fechaFinFormateada, 0, 1, 'L');
        $pdf->SetX($margenIzquierdo - 20);
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);
    
        // Configuración de la tabla de avisos
        $tableStartX = $margenIzquierdo - 20;
    
        // Encabezado de la tabla para avisos
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, '#', 0, 0, 'C', true);
        $pdf->Cell(20, 10, utf8_decode('Código'), 0, 0, 'C', true); // Columna para Código
        $pdf->Cell(60, 10, utf8_decode('Socio'), 0, 0, 'L', true); // Columna para Socio
        $pdf->Cell(20, 10, utf8_decode('Mes'), 0, 0, 'R', true);
        $pdf->Cell(20, 10, 'Total [Bs]', 0, 0, 'C', true);
        $pdf->Cell(20, 10, 'Saldo [Bs]', 0, 0, 'C', true);
        $pdf->Cell(20, 10, 'Estado', 0, 1, 'R', true);
    
        // Datos de la tabla de avisos
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $contador = 1;
        $totalTotal = 0;
        $totalSaldo = 0;
    
        // Crear un formateador solo para el mes en literal
        $fmtMesLiteral = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmtMesLiteral->setPattern("MMMM");
    
        foreach ($avisos as $aviso) {
            $pdf->SetX($tableStartX);
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill);
    
            // Agregar el valor de `codigoSocio`
            $pdf->Cell(20, 10, $aviso['codigoSocio'], 0, 0, 'C', $fill);
    
            // Agregar el valor de `socio`
            $pdf->Cell(60, 10, utf8_decode($aviso['socio']), 0, 0, 'L', $fill);
    
            // Convertir la fecha a solo el mes en texto literal usando el nuevo formateador
            $mesLiteral = $fmtMesLiteral->format(new DateTime($aviso['fechaLectura']));
            
            $pdf->Cell(20, 10, ucfirst($mesLiteral), 0, 0, 'R', $fill);
            $pdf->Cell(20, 10, number_format($aviso['total'], 2), 0, 0, 'C', $fill);
            $pdf->Cell(20, 10, number_format($aviso['saldo'], 2), 0, 0, 'C', $fill);
            $pdf->Cell(20, 10, ucfirst(utf8_decode($aviso['estado'])), 0, 1, 'R', $fill);
    
            // Sumar los totales
            $totalTotal += $aviso['total'];
            $totalSaldo += $aviso['saldo'];
    
            // Alternar el color de fondo
            $fill = !$fill;
        }
    
        // Fila de totales
        $pdf->SetX($tableStartX);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(10, 10, '', 0, 0, 'C', true);
        $pdf->Cell(20, 10, 'Totales', 0, 0, 'C', true);
        $pdf->Cell(60, 10, '', 0, 0, 'C', true);
        $pdf->Cell(20, 10, '', 0, 0, 'C', true);
        $pdf->Cell(20, 10, number_format($totalTotal, 2), 0, 0, 'C', true);// Total en columna 'Saldo [Bs]'
        $pdf->Cell(20, 10, number_format($totalSaldo, 2), 0, 0, 'C', true); // Total en columna 'Total [Bs]'
        $pdf->Cell(20, 10, '', 0, 0, 'C', true); 
        
        // Salida del PDF
        $codigoSocio = !empty($data['codigoSocio']) ? $data['codigoSocio'] : 'General';
        $pdf->Output('Historial_Avisos_' . $codigoSocio . '.pdf', 'I');
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
            // $data['mes'] = null;
        } else { // GLOBAL
            $data['mes'] = null;
            $data['anio'] = null;
        }
        
        $meses = [
            "1" => 'Enero', 
            "2" => 'Febrero', 
            "3" => 'Marzo', 
            "4" => 'Abril', 
            "5" => 'Mayo', 
            "6" => 'Junio', 
            "7" => 'Julio', 
            "8" => 'Agosto', 
            "9" => 'Septiembre', 
            "10" => 'Octubre', 
            "11" => 'Noviembre', 
            "12" => 'Diciembre'
        ];
        

        // Llamar al modelo para obtener el top 10 de consumidores
        $rankingConsumo = $this->reporte_model->obtener_top_consumidores($data);

        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('P', 'mm', 'Letter');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();

        // Encabezado principal
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 16);

        // Calcular el ancho disponible para la celda
        $pageWidth = $pdf->GetPageWidth();
        $margenIzquierdo = 45;
        $margenDerecho = 30;
        $anchoDisponible = $pageWidth - $margenIzquierdo - $margenDerecho;

        // Título del reporte
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell($anchoDisponible, 15, utf8_decode('Top 5 Consumidores'), 0, 1, 'C', true);
        $pdf->Ln(5);

        // Subtítulo "AquaReadPro"
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->Cell(50, 10, 'AquaReadPro', 0, 1, 'L');
        $pdf->Ln(5);

        // Detalles del periodo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(50);

        // Verificar si mes y año están definidos
        if ($data['opcionRanking']=="GLOBAL")
        {
            $periodo = 'Global';
        }
        else
        {
            if ($data['opcionRanking']=="MENSUAL")
            {
                // Convertir el mes a literal
                $mesLiteral = isset($meses[$data['mes']]) ? $meses[$data['mes']] : 'Mes desconocido';
                $periodo = $mesLiteral . ' de ' . $data['anio'];
            }
            else
            {
                $periodo = $data['anio'];
            }
        }

        $pdf->SetX($margenIzquierdo - 20);
        $pdf->Cell(0, 5, 'Periodo: ' . $periodo, 0, 1, 'L');
        $pdf->SetX($margenIzquierdo - 20);
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);

        // Configuración de la tabla de ranking
        $tableStartX = $margenIzquierdo - 20;

        // Encabezado de la tabla para ranking
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, 'No.', 0, 0, 'C', true);
        $pdf->Cell(20, 10, utf8_decode('Código'), 0, 0, 'C', true);
        $pdf->Cell(60, 10, utf8_decode('Socio'), 0, 0, 'L', true);
        $pdf->Cell(30, 10, 'Consumo [m3]', 0, 0, 'C', true);
        $pdf->Cell(30, 10, 'Total [Bs]', 0, 1, 'C', true);

        // Datos de la tabla de ranking
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $contador = 1;
        $totalConsumo = 0;
        $totalBs = 0;

        foreach ($rankingConsumo as $consumidor) {
            $pdf->SetX($tableStartX);
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill);

            // Agregar el valor de `codigo`
            $pdf->Cell(20, 10, $consumidor['codigo'], 0, 0, 'C', $fill);

            // Agregar el valor de `socio`
            $pdf->Cell(60, 10, utf8_decode($consumidor['socio']), 0, 0, 'L', $fill);

            // Agregar el valor de `consumo` formateado con 2 decimales
            $pdf->Cell(30, 10, number_format($consumidor['consumo'], 2), 0, 0, 'C', $fill);

            // Agregar el valor de `total` formateado con 2 decimales
            $pdf->Cell(30, 10, number_format($consumidor['total'], 2), 0, 1, 'C', $fill);

            // Sumar los totales
            $totalConsumo += $consumidor['consumo'];
            $totalBs += $consumidor['total'];

            // Alternar el color de fondo
            $fill = !$fill;
        }

        // Fila de totales
        $pdf->SetX($tableStartX);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(10, 10, '', 0, 0, 'C', true);
        $pdf->Cell(20, 10, 'Totales:', 0, 0, 'C', true);
        $pdf->Cell(60, 10, '', 0, 0, 'C', true);
        $pdf->Cell(30, 10, number_format($totalConsumo, 2), 0, 0, 'C', true); // Total en columna 'Consumo [m3]'
        $pdf->Cell(30, 10, number_format($totalBs, 2), 0, 1, 'C', true); // Total en columna 'Total [Bs]'

        // Salida del PDF
        $pdf->Output('Ranking_Consumidores.pdf', 'I');
    }
    public function obtener_avisos_vencidos_rechazados()
    {
        $total = $this->reporte_model->total_vencidos();
        
        echo json_encode(['cantidad' => $total]);
    }

}
