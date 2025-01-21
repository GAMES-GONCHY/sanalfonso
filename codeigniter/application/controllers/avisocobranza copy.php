<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function gestion()
    {
        //GENERACION DE AVISOS MEDIANTE EL PROCEDIMIENTO (DESACTIVADO)
        //$this->avisocobranza_model->generar_avisos();
        // Obtener los avisos por estado
        $data['enviados'] = $this->avisocobranza_model->avisos_por_estado('enviado');
        $data['qrmax'] = $this->avisocobranza_model->obtener_qr_max();
        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function pagados()
    {
        // Obtener los avisos por estado
        
        $data['pagados'] = $this->avisocobranza_model->avisos_por_estado('pagado');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisospagados', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function vencidos()
    {
        // Obtener los avisos por estado
        $data['vencidos'] = $this->avisocobranza_model->avisos_por_estado('vencido');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisosvencidos', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function revision()
    {
        // Obtener los avisos por estado
        $data['revisados'] = $this->avisocobranza_model->avisos_por_estado('revision');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisosrevision', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function rechazados()
    {
        // Obtener los avisos por estado
        $data['rechazados'] = $this->avisocobranza_model->avisos_por_estado('rechazado');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisosrechazados', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function deshabilitados()
	{
		// Obtener los avisos por estado
        $data['deshabilitados'] = $this->avisocobranza_model->avisos_por_estado('deshabilitado');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisosdeshabilitados', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
		
	}
    public function revisarbd()
	{
		$id = $this->input->post('id');
		$data['estado'] = $this->input->post('estado');
        $tab = $this->input->post('tab');
        $idAutor = $this->session->userdata('idUsuario');

        //VARIABLE SETEADA PARA BDD trigger CREADOR DE REPORTES HISTORIAL DE PAGOS
        $this->db->query("SET @idAutor = '{$idAutor}'");

		$this->avisocobranza_model->modificar($id, $data);
        redirect('avisocobranza/' . $tab);
    }
    public function notificarsaldo()
	{
        $idAviso = $this->input->post('idAviso');
        $data['saldo'] = $this->input->post('saldoPendiente');
        $tab = $_POST['tab'];
        $this->avisocobranza_model->notificar_saldo($idAviso, $data);
        redirect('avisocobranza/' . $tab);
    }
    // public function deshabilitarbd()
	// {
	// 	$id = $_POST['id'];
	// 	$data['estado'] = 'deshabilitado';
	// 	$tab=$_POST['tab'];
	// 	$this->crudusers_model->deshabilitar($id, $data);
	// 	redirect('avisocobranza/' . $tab);
	// }
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$rol=$_POST['rol'];

		$this->crudusers_model->modificar($id, $data);
		redirect('crudusers/deshabilitados/' . $rol);
	}
    public function pagaraviso()
	{
        // $this->load->view('incrustaciones/vistascoloradmin/head');
        // $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        // $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas y datos
        // $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
	}

}
