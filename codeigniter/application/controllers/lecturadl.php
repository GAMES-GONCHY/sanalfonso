<?php
defined('BASEPATH') or exit('No direct script access allowed');

use ModbusTcpClient\Network\BinaryStreamConnection;
use ModbusTcpClient\Packet\ModbusFunction\ReadHoldingRegistersRequest;

class Lecturadl extends CI_Controller 
{
    public function mostrarlectura() 
    {   
        //$data['lecturas'] = $this->recuperarIp(); // Realiza la lectura de los dataloggers

        $lecturasExistentes = $this->lectura_model->obtenerLecturas();
        
        if(empty($lecturasExistentes))
        {
            $clave = 0;
            //log_message('debug', 'No hay lecturas existentes, intentando recuperar IP de los dataloggers.');
            //$data['lecturas'] = $this->recuperarIp($clave);
            $this->recuperarIp($clave);
            $data['lecturas'] = $this->lectura_model->lecturastiemporeal();
        }
        else
        {
            //log_message('debug', 'Lecturas existentes encontradas: ' . json_encode($lecturasExistentes));
            $data['lecturas'] = $lecturasExistentes;
        }
        //Verifica si hay lecturas
        // if (!empty($data['lecturas'])) {  
        //     echo json_encode(['status' => 'success', 1]); 
        // } else {
        //     log_message('error', 'No se encontraron lecturas en la recuperación.');
        //     echo json_encode(['status' => 'error', 'message' => 0]);
        // }


        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasactuales', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    

    public function recuperarIp($clave)//clave = 1 -> registrar lecturas en BDD, clave = 0 ->actualizar lecturas en tiempo real sin registro en bdd
    {
        // Obtener los dataloggers activos y conectados
        $ipDataloggers = $this->datalogger_model->obtenerip();
        // if (!empty($ipDataloggers))
        // {
        //     log_message('debug', ' ips de Dataloggers encontrados: ' . json_encode($ipDataloggers));
        // }
        // else
        // {
        //     log_message('debug', ' no se encontraron ips de dataloggers: ');
        // }


        if (!empty($ipDataloggers))
        {
            //log_message('debug', 'Dataloggers encontrados: ' . json_encode($ipDataloggers));
            $this->actualizaryregistrar($ipDataloggers,$clave);

            
            // if (!empty($lecturas)) {
            //     log_message('debug', 'Lecturas recuperadas exitosamente: ' . json_encode($lecturas));
            // } else {
            //     log_message('error', 'No se encontraron lecturas después de recuperar IP de los dataloggers.');
            // }
            //return $lecturas;
        } 
        else 
        {
            log_message('error', 'No se encontraron dataloggers activos.');
            // Si no hay dataloggers disponibles, retornar una tabla vacía
            // $this->session->set_flashdata('mensaje', 'No se encontraron medidores activos');
			// $this->session->set_flashdata('alert_type', 'error');
            return [];

        }
    }

    public function actualizaryregistrar($ipDataloggers,$clave) 
    {
        $lecturas = [];
        $lecturasfallidas = [];
        foreach ($ipDataloggers as $datalogger) 
        {
            $ip = $datalogger['IP'];
            $puerto = $datalogger['puerto'];
            $codigoMedidor = $datalogger['codigoMedidor'];
            $idMedidor = $datalogger['idMedidor'];
            $codigoDatalogger = $datalogger['codigoDatalogger'];
            $lecturaAnterior = $this->obtenerLecturaAnterior($idMedidor);
            $socio = $datalogger['nombreSocio'];
            $codigoSocio = $datalogger['codigoSocio'];

            // Crear conexión TCP con el datalogger
            $connection = BinaryStreamConnection::getBuilder()
                ->setHost($ip)
                ->setPort(502)
                ->setConnectTimeoutSec(2)
                ->build();

            try 
            {
                // Conectar al datalogger
                $connection->connect();

                // Leer el registro del puerto
                $request = new ReadHoldingRegistersRequest($puerto, 1);
                $response = $connection->sendAndReceive($request);
                // Decodificar la respuesta
                $pulsos = unpack('n', substr($response, 9, 2))[1];
                
                if($clave==1)
                {
                    if($this->lectura_model->verificarFechaLectura($idMedidor))
                    {
                        // Insertar la lectura en la tabla 'lectura'
                        $dataLectura = [
                            'lecturaAnterior' => $lecturaAnterior,
                            'lecturaActual' => ($pulsos+117),
                            'idMedidor' => $idMedidor
                        ];
                        $this->lectura_model->insertarLectura($dataLectura); // Insertar la lectura en la base de datos
                    }
                }
                else
                {
                    // Almacenar la lectura actual
                    $lecturaTemporal = [
                        'lecturaAnterior' => $lecturaAnterior,
                        'lecturaActual' => ($pulsos+117),
                        'fechaLectura' => date('Y-m-d H:i:s'),
                        'codigoMedidor' => $codigoMedidor,
                        'codigoDatalogger' => $codigoDatalogger,
                        'codigoSocio' => $codigoSocio,
                        'nombreSocio' => $socio
                    ];
                    $this->lectura_model->insertarLecturaTemporal($lecturaTemporal);
                }
                //$lecturas[] = $lecturaTemporal;
            }
            catch (Exception $e) 
            {
                log_message('error', 'Error al leer los datos del datalogger ' . $ip . ': ' . $e->getMessage());
                $lecturasfallidas[] = [
                    'IP' => $ip,
                    'puerto' => $puerto,
                    'idMedidor' => $idMedidor,
                    'codigoMedidor' => $codigoMedidor,
                    'codigoDatalogger' => $codigoDatalogger,
                    'codigoSocio' => $codigoSocio,
                    'socio' => $socio
                ];
            }
            finally 
            {
                // Cerrar la conexión en el bloque finally
                if ($connection) 
                {
                    $connection->close();
                }
            }
        }

        if (!empty($lecturasfallidas)) 
        {
            $this->session->set_userdata('lecturasfallidas', $lecturasfallidas);
        }
        //return $lecturas;
    }
    public function deshabilitados() 
    {   
        $data['lecdeshabilitados'] = $this->lectura_model->deshabilitados();

        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasdeshabilitadas', $data); // Mostrar las lecturas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    // Función auxiliar para obtener la última lectura registrada de un medidor
    public function obtenerLecturaAnterior($idMedidor)
    {
        return $this->lectura_model->obtenerUltimaLectura($idMedidor);
    }
    public function realizarlectura($clave) 
    {
        //$data['lecturas'] = $this->recuperarIp($clave); // Realiza la lectura de los dataloggers
        $this->recuperarIp($clave);

        // $this->session->set_flashdata('mensaje', 'Lectura exitosa');
        // $this->session->set_flashdata('alert_type', 'success');

        redirect('lecturadl/mostrarlectura');
    }
    public function mostrarlecturasfallidas()
    {
        $data['fallidas'] = $this->session->userdata('lecturasfallidas')?? [];
        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasfallidas', $data); // Mostrar las lecturas fallidas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    public function actualizarlecturas($clave)//clave = 0 ->actualizar lecturas en tiempo real
    {
        $this->lectura_model->truncarLecturasTemporales();
        $this->recuperarIp($clave);
        $data['lecturas']=$this->lectura_model->lecturastiemporeal();
        //$this->lectura_model->truncarLecturasTemporales();
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturastiemporeal', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    
    public function deshabilitarbd()
    {
        $id = $_POST['id'];
		$data['estado'] = 0;
		$this->lectura_model->modificar($id, $data);
		redirect('lecturadl/mostrarlectura');
    }
    public function habilitarbd()
    {
        $id = $_POST['id'];
		$data['estado'] = 1;
		$this->lectura_model->modificar($id, $data);
		redirect('lecturadl/deshabilitados');
    }
}
