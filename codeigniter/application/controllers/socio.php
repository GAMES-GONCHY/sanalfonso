<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socio extends CI_Controller
{
    public function pagaraviso()
    {
        $idUsuario = $this->session->userdata('idUsuario');
        $data['avisos'] = $this->avisocobranza_model->avisos_por_estado_id('enviado',$idUsuario);
        $data['qrmax'] = $this->avisocobranza_model->obtener_qr_max();
        $this->load->view('incrustaciones/vistascoloradmin/headsocio');
        $this->load->view('incrustaciones/vistascoloradmin/menusocio');
        $this->load->view('veravisos',$data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footersocios');
    }
    public function get_avisos() 
    {
        // Obtener el estado desde la solicitud AJAX
        $estado = (array) $this->input->post('estado');
        if($estado[0]=='enviado')
        {
            $estado[] = 'rechazado';
            $estado[] = 'vencido';
        }
        $idUsuario = $this->session->userdata('idUsuario');
        // Llamar al modelo para obtener los avisos filtrados por estado
        $avisos = $this->avisocobranza_model->avisos_por_estado_id($estado,$idUsuario);
        $data['qrmax'] = $this->avisocobranza_model->obtener_qr_max();
    
        // Solo cargar el contenido de avisos (dentro de #avisos-container)
        $this->load->view('veravisos_parcial', ['avisos' => $avisos, 'qrmax' => $data['qrmax']]);

    }
    public function subir() 
    {
        // Obtener el mes, año, codigoSocio y idAviso desde el formulario
        $mes = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $codigoSocio = $this->input->post('codigoSocio');
        //quitar los espacios en blanco al inicio y al final
        $codigoSocio = trim($codigoSocio);

        $idAviso = $this->input->post('idAviso');

        //Configuración de la ruta base para el socio
        $rutaSocio = './uploads/comprobantes/' . $codigoSocio;

        //Verificar si la carpeta del socio existe, si no, crearla
        if (!file_exists($rutaSocio)) 
        {
            mkdir($rutaSocio, 0777, true);  // Crear la carpeta con permisos 0755
        }
        

        //Configuración para la subida del archivo
        $config['upload_path'] = $rutaSocio;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;  // Tamaño máximo del archivo: 2MB

        // Cargar la librería de subida de archivos con la configuración
        $this->load->library('upload', $config);

        // Intentar subir el archivo
        if (!$this->upload->do_upload('comprobantePago')) 
        {
            // Si ocurre un error al subir el archivo
            $error = $this->upload->display_errors();
            echo $error;  // Puedes mostrar un mensaje de error personalizado
        }
        else 
        {
            // Si la subida es exitosa, obtener los datos del archivo
            $data = $this->upload->data();

            // Obtener la extensión del archivo subido
            $extension = $data['file_ext'];

            // Renombrar el archivo usando el mes y año
            $nombreArchivo = $mes . '_' . $anio . $extension;

            // Ruta completa para el archivo renombrado
            $rutaCompleta = $rutaSocio . '/' . $nombreArchivo;

            // Renombrar el archivo subido
            rename($data['full_path'], $rutaCompleta);

            // Obtener la fecha y hora actual del servidor
            
            // Preparar los datos para la actualización de la base de datos
            $datosActualizacion = array(
                'comprobante' => $nombreArchivo  // Guardar el nombre del archivo subido
            );

             // Actualizar en la base de datos
            $actualizacion = $this->avisocobranza_model->sociopagaraviso($idAviso, $datosActualizacion);

            // Verificar si la actualización fue exitosa
            if ($actualizacion) 
            {
                // Redirigir a la ruta socio/pagaraviso si fue exitoso
                redirect('socio/pagaraviso');
            }
            else
            {
                // Manejo de errores si la actualización falla
                echo "Error al actualizar la base de datos.";
            }
        }
    }
    public function generarPdfAviso()
    {
        $codigoSocio = $this->input->post('codigoSocio');
        $nombreSocio = $this->input->post('nombreSocio');
        $codigoMedidor = $this->input->post('codigoMedidor');
        
        $codigoDatalogger = $this->input->post('codigoDatalogger');
        $lecturaActual = $this->input->post('lecturaActual');
        $lecturaAnterior = $this->input->post('lecturaAnterior');
        $fechaLectura = $this->input->post('fechaLectura');
        $fechaLecturaAnterior = $this->input->post('fechaLecturaAnterior');

        $tarifaVigente = $this->input->post('tarifaVigente');
        $tarifaMinima = $this->input->post('tarifaMinima');
        $fechaVencimiento = $this->input->post('fechaVencimiento');

        $estado = $this->input->post('estado');
        $fechaPago = $this->input->post('fechaPago');
        $saldo = $this->input->post('saldo');

    
        // if (!$idUsuario || !$estado) {
        //     show_error('Datos incompletos.', 400);
        //     return;
        // }
    
        // $avisos = $this->avisocobranza_model->avisos_por_estado_id($estado, $idUsuario);
    
        // if (empty($avisos)) {
        //     show_error('No se encontraron avisos.', 404);
        //     return;
        // }
    
        require_once APPPATH . 'third_party/FPDF_Extended.php';
    
        // Determinar el texto del título según el estado
        $tituloDocumento = ($estado == 'revision') ? utf8_decode('Aviso de Cobranza - en Revisión') :
        (($estado == 'vencido') ? 'Aviso de Cobranza - Vencido' :
        (($estado == 'rechazado') ? 'Aviso de Cobranza - Rechazado' :
        (($estado == 'pagado') ? 'Recibo' : 'Aviso de Cobranza')));
    
        // Calcular el período
        $fechaLectura = strtotime($fechaLectura);
        $mes = date('F', $fechaLectura);
        $mesEspañol = [
            'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo',
            'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio',
            'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre',
            'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
        ];
        $mesFormateado = $mesEspañol[$mes];
        $año = date('Y', $fechaLectura);
        $periodo = "Periodo: $mesFormateado - $año";
    
        // Calcular el consumo
        $consumo = ($lecturaActual - $lecturaAnterior)/100;
    
        // Clasificar el consumo
        if ($consumo < 10) {
            $clasificacionConsumo = utf8_decode("Consumo Mínimo");
            $totalPagar = $tarifaMinima;
        } elseif ($consumo < 20) {
            $clasificacionConsumo = utf8_decode("Consumo Moderado");
            $totalPagar = $consumo * $tarifaVigente;
        } elseif ($consumo < 30) {
            $clasificacionConsumo = utf8_decode("Consumo Estándar");
            $totalPagar = $consumo * $tarifaVigente;
        } elseif ($consumo < 40) {
            $clasificacionConsumo = "Consumo Elevado";
            $totalPagar = $consumo * $tarifaVigente;
        } else {
            $clasificacionConsumo = "Consumo Muy Elevado";
            $totalPagar = $consumo * $tarifaVigente;
        }
    
        // Crear el PDF
        $pdf = new FPDF_Extended('P', 'mm', array(148, 150)); // Tamaño A5
        $pdf->AddPage();
        $pdf->SetMargins(8, 8, 8);
    
        // Dibujar la franja roja diagonal
        $pdf->SetFillColor(255, 0, 0); // Rojo
        $pdf->Polygon([440, 450, 280, 450, 440, 350], 'F');
    
        // Texto dentro de la franja
        $pdf->SetTextColor(255, 255, 255); // Texto blanco
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetXY(130, 2);
        $pdf->Cell(10, 10, strtoupper($estado), 0, 1, 'C');
    
        // Restaurar colores para el resto del contenido
        $pdf->SetTextColor(0, 0, 0);
    
        // Título
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 5,$tituloDocumento, 0, 1, 'C');
        $pdf->Ln(3);
    
        // Agregar el período
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->Cell(0, 5, $periodo, 0, 1, 'C');
        $pdf->Ln(3);
    
        // Línea superior
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(10, 20, 138, 20);
    
        // Datos del cliente
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(30, 4, 'NOMBRE:', 0, 0);
        $pdf->Cell(60, 4, $nombreSocio, 0, 1);

        $pdf->Cell(30, 4, utf8_decode('COD. SOCIO:'), 0, 0);
        $pdf->Cell(60, 4, $codigoSocio, 0, 1);
    
        $pdf->Cell(30, 4, 'COD. MEDIDOR:', 0, 0);
        $pdf->Cell(60, 4, $codigoMedidor, 0, 1);

        $pdf->Cell(30, 4, 'COD. DATALOGGER:', 0, 0);
        $pdf->Cell(60, 4, $codigoDatalogger, 0, 1);
        $pdf->Ln(3);
    
        // Lectura Actual y Fecha
        $pdf->Cell(40, 4, 'Lectura Actual:', 0, 0);
        $pdf->Cell(30, 4, $lecturaActual, 0, 0);
        $pdf->Cell(40, 4, 'Fecha Lectura Act:', 0, 0);
        $pdf->Cell(30, 4, date('d-m-Y', $fechaLectura), 0, 1);
    
        // Lectura Anterior y Fecha Anterior
        $pdf->Cell(40, 4, 'Lectura Anterior:', 0, 0);
        $pdf->Cell(30, 4, $lecturaAnterior, 0, 0);
        $pdf->Cell(40, 4, 'Fecha Lectura Ant:', 0, 0);
        $pdf->Cell(30, 4, date('d-m-Y', strtotime($fechaLecturaAnterior)), 0, 1);
        $pdf->Ln(3);
    
        // Consumo y Clasificación
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(40, 4, 'Consumo:', 0, 0);
        $pdf->Cell(50, 4, number_format($consumo, 2) . utf8_decode(' m³') . ' (' . $clasificacionConsumo . ')', 0, 1);
        $pdf->Ln(3);
    
        // Tarifas
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(40, 4, 'Tarifa Vigente:', 0, 0);
        $pdf->Cell(30, 4, 'Bs. ' . number_format($tarifaVigente, 2), 0, 0);
        $pdf->Cell(40, 4, 'Tarifa Minima:', 0, 0);
        $pdf->Cell(30, 4, 'Bs. ' . number_format($tarifaMinima, 2), 0, 1);
        $pdf->Ln(2);
    
        // Tipos de Clasificación
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Ln(3);

        // Totales con Fecha de Pago o Vencimiento
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(40, 4, 'TOTAL:', 0, 0);
        $pdf->Cell(30, 4, 'Bs. ' . number_format($totalPagar, 2), 0, 0);
        if ($estado == 'pagado') {
            $pdf->Cell(40, 4, 'Fecha de Pago:', 0, 0);
            $pdf->Cell(30, 4, date('d-m-Y', strtotime($fechaPago)), 0, 1);
        } else {
            $pdf->Cell(40, 4, 'Fecha de Vencimiento:', 0, 0);
            $pdf->Cell(30, 4, date('d-m-Y', strtotime($fechaVencimiento)), 0, 1);
        }
        // Agregar saldo si el estado es 'rechazado' y el saldo no es null o 0
        if ($estado == 'rechazado' && (!is_null($saldo) || $saldo != 0)) {
            $pdf->Cell(40, 4, 'Saldo:', 0, 0);
            $pdf->Cell(30, 4, 'Bs. ' . number_format($saldo, 2), 0, 1);
        }
        $pdf->Ln(5);

        $pdf->SetFont('Arial', '', 8);
        // Imprimir cada línea con alineación controlada
        $pdf->Cell(0, 4, utf8_decode('- Consumo Mínimo: Menor a 10 m³ -> Tarifa mínima'), 0, 1, 'L');
        $pdf->Cell(0, 4, utf8_decode('- Consumo Moderado: Menor a 20 m³ -> Tarifa vigente'), 0, 1, 'L');
        $pdf->Cell(0, 4, utf8_decode('- Consumo Estándar: Menor a 30 m³ -> Tarifa vigente'), 0, 1, 'L');
        $pdf->Cell(0, 4, utf8_decode('- Consumo Elevado: Menor a 40 m³ -> Tarifa vigente'), 0, 1, 'L');
        $pdf->Cell(0, 4, utf8_decode('- Consumo Muy Elevado: Mayor o igual a 40 m³ -> Tarifa vigente'), 0, 1, 'L');

        $pdf->Ln(7);
    
        // Nota al cliente
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->MultiCell(0, 4, 'Estimad@ Socio: Se le recomienda pagar sus avisos pendientes antes de la fecha de vencimiento.');
        $pdf->Ln(3);
    
        // Pie de página
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 8, 'AquaReadPro.', 0, 1, 'C');
    
        // Enviar el PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="Aviso_Cobranza.pdf"');
        $pdf->Output('I');
    }
    
}
