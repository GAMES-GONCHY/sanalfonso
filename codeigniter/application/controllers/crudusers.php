
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudusers extends CI_Controller
{
	public function habilitados($rol)
	{
		log_message('error', '📌 Rol recibido en habilitados: ' . $rol); // 🔍 DEPURACIÓN
		$data['rol'] = $rol;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('usuarioshabilitados1', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser', $data);
	}
	// Método separado para obtener los datos en JSON
	public function obtener_habilitados($rol)
	{
		// Verificar que sea una petición AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
	
		// Obtener los datos desde el modelo
		$query = $this->crudusers_model->habilitados($rol);
		$usuarios = ($query instanceof CI_DB_result) ? $query->result_array() : [];
		
		// Formatear la fecha en cada usuario
		foreach ($usuarios as &$usuario)
		{
			$usuario['fechaRegistro'] = formatearFecha($usuario['fechaRegistro']);
		}
		// Devolver los datos en JSON
		//header('Content-Type: application/json');
		echo json_encode([
			'status' => 'success',
			'data' => $usuarios
		]);
		exit;
	}
	// 🚀 Nueva función para obtener administradores deshabilitados
    public function obtener_deshabilitados($rol)
	{
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $query = $this->crudusers_model->deshabilitados($rol);
        $usuarios = ($query instanceof CI_DB_result) ? $query->result_array() : [];

        foreach ($usuarios as &$usuario) {
            $usuario['fechaRegistro'] = formatearFecha($usuario['fechaRegistro']);
        }

        echo json_encode([
            'status' => 'success',
            'data' => $usuarios
        ]);
        exit;
    }
	public function agregar($rol)
	{
		$data['rol']=$rol;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formagregaruser1');
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser',$data);
	}
	// public function agregarbd()
	// {
	// 	// Validar que la solicitud sea AJAX
	// 	if (!$this->input->is_ajax_request()) {
	// 		show_404();
	// 	}
		
	// 	// Capturar datos del formulario
	// 	$data = [
	// 		'nickName'       => $this->input->post('nickname', true),
	// 		'nombre'         => strtoupper($this->input->post('nombre', true)),
	// 		'primerApellido' => strtoupper($this->input->post('primerApellido', true)),
	// 		'segundoApellido'=> strtoupper($this->input->post('segundoApellido', true)),
	// 		'ci'  			 => $this->input->post('ci', true),
	// 		'email'          => $this->input->post('email', true),
	// 		'rol'            => $this->input->post('rol', true),
	// 		'fono'           => $this->input->post('fono', true),
	// 		'sexo'           => $this->input->post('genero', true)
	// 	];

	// 	// Depuración: Registrar datos en logs
	// 	log_message('DEBUG', 'Datos recibidos en agregarbd: ' . json_encode($data));
	// 	// Verificar si ya existe el usuario (email o nickname)
	// 	$existeUsuario = $this->crudusers_model->comprobarinsercion([
	// 		'nickname' => $data['nickName'],
	// 		'ci' => $data['ci'],
	// 		'email'    => $data['email']
	// 	]);
	
	// 	if (!empty($existeUsuario)) {
	// 		echo json_encode([
	// 			'status'  => 'error',
	// 			'message' => 'El Nickname o el E-mail ya están registrados.'
	// 		]);
	// 		exit;
	// 	}
	
	// 	// Insertar en la base de datos
	// 	$this->crudusers_model->agregar($data);
	
	// 	echo json_encode([
	// 		'status'  => 'success',
	// 		'message' => 'Administrador agregado correctamente.'
	// 	]);
	// 	exit;
	// }
	public function agregarbd()
	{
		// Validar que la solicitud sea AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
		
		// Capturar y sanitizar datos del formulario
		$data = [
			'nickName'       => $this->input->post('nickname', true),
			'nombre'         => strtoupper($this->input->post('nombre', true)),
			'primerApellido' => strtoupper($this->input->post('primerApellido', true)),
			'segundoApellido'=> strtoupper($this->input->post('segundoApellido', true)),
			'ci'             => $this->input->post('ci', true),
			'email'          => $this->input->post('email', true),
			'rol'            => (int) $this->input->post('rol', true), // Convertimos el rol a entero
			'fono'           => $this->input->post('fono', true),
			'sexo'           => $this->input->post('genero', true)
		];
	
		// Registrar datos en logs para depuración
		log_message('DEBUG', 'Datos recibidos en agregarbd: ' . json_encode($data));
	
		// Verificar si ya existe el usuario (email, nickname o CI)
		if ($this->crudusers_model->comprobarinsercion($data['nickName'], $data['ci'], $data['email'])) {
			echo json_encode([
				'status'  => 'error',
				'message' => 'El Nickname, CI o el E-mail ya están registrados.'
			]);
			exit;
		}
	
		// Si el usuario es un SOCIO (rol = 0), usamos una transacción
		if ($data['rol'] === 0) {
			$this->db->trans_start(); // Iniciar transacción
	
			// Insertar usuario en la base de datos
			$this->crudusers_model->agregar($data);
			$idUsuario = $this->db->insert_id();
	
			// **Generar código de socio directamente desde los datos del POST**
			$codigoSocio = 'S-' . substr($data['primerApellido'], 0, 2) . 
									substr($data['nombre'], -1) . 
									substr($data['ci'], 0, 1) . 
									substr($data['ci'], -1);
	
			// Insertar en la tabla membresia a través del modelo
			$insertMembresia = $this->crudusers_model->agregarMembresia($idUsuario, $codigoSocio);
	
			$this->db->trans_complete(); // Finalizar transacción
	
			echo json_encode([
				'status'  => ($this->db->trans_status() && $insertMembresia) ? 'success' : 'error',
				'message' => ($this->db->trans_status() && $insertMembresia) ? 'Socio agregado correctamente.' : 'Error al agregar el socio.'
			]);
			exit;
		}
	
		// Si es un Administrador (rol = 2), solo insertamos en la tabla usuario
		$this->crudusers_model->agregar($data);
	
		echo json_encode([
			'status'  => 'success',
			'message' => 'Administrador agregado correctamente.'
		]);
		exit;
	}
	

	public function recuperarUsuario()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
	
		$id = $this->input->post('id', true);
		$usuario = $this->crudusers_model->recuperarusuario($id)->row_array();
	
		if ($usuario) {
			echo json_encode([
				'status' => 'success',
				'data'   => $usuario
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'Usuario no encontrado.'
			]);
		}
		exit;
	}
	
	public function modificarbd()
	{
		// Validar que la solicitud sea AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
	
		// Capturar el ID del usuario a modificar
		$idUsuario = $this->input->post('id', true);
		
		// Capturar datos del formulario
		$data = [
			'nickName'       => $this->input->post('nickname', true),
			'nombre'         => strtoupper($this->input->post('nombre', true)),
			'primerApellido' => strtoupper($this->input->post('primerApellido', true)),
			'segundoApellido'=> strtoupper($this->input->post('segundoApellido', true)),
			'ci'             => $this->input->post('ci', true),
			'email'          => $this->input->post('email', true),
			'fono'           => $this->input->post('fono', true),
			'sexo'           => $this->input->post('genero', true),
			'fechaActualizacion' => date('Y-m-d H:i:s') // Guardar fecha de modificación
		];
	
		// Depuración: Registrar datos en logs
		log_message('error', 'Datos recibidos en modificarbd: ' . json_encode($idUsuario));
	
		// Verificar si el usuario existe antes de modificar
		$existeUsuario = $this->crudusers_model->comprobarmodificacion($data, $idUsuario);
		
		if (!empty($existeUsuario)) {
			echo json_encode([
				'status'  => 'error',
				'message' => 'El Nickname o el E-mail ya están registrados en otro usuario.'
			]);
			exit;
		}
	
		// Actualizar en la base de datos
		$this->crudusers_model->modificar($idUsuario, $data);
	
		echo json_encode([
			'status'  => 'success',
			'message' => 'Administrador actualizado correctamente.'
		]);
		exit;
	}
	
	public function eliminarbd()
	{
		$id = $_POST['id'];
		$this->crudusers_model->eliminar($id);
		redirect('crudusers/habilitados', 'refresh');
	}
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;
		$rol=$_POST['rol'];
		$this->crudusers_model->deshabilitar($id, $data);
		redirect('crudusers/habilitados/'.$rol);
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$rol=$_POST['rol'];

		$this->crudusers_model->modificar($id, $data);
		redirect('crudusers/deshabilitados/' . $rol);
	}
	public function cambiarEstado()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
	
		// Capturar datos de la solicitud
		$idUsuario = $this->input->post('id', true);
		$nuevoEstado = $this->input->post('estado', true);
	
		// LOG: Datos recibidos
		log_message('DEBUG', '📌 [cambiarEstado] Datos recibidos: ' . json_encode($_POST));

		// Actualizar estado
		$resultado = $this->crudusers_model->actualizarEstado($idUsuario, $nuevoEstado);
		if (!$resultado) {
			echo json_encode([
				'status' => 'error',
				'message' => 'ERROR, Intente nuevamente.'
			]);
			exit;
		}
		// Mensaje de éxito
		echo json_encode([
			'status' => 'success',
			'message' => ($nuevoEstado == 1) ? 'Usuario restaurado correctamente.' : 'Usuario eliminado correctamente.'
		]);
		exit;
	}
	
	

	public function login()
	{
		$this->load->view('pagelogin');
	}
	public function subirfoto()
	{
		$data['id'] = $_POST['id'];
		$data['rol'] = $_POST['rol'];
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formsubir', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function subir()
	{
		$id = $_POST['id'];
		$rol = $_POST['rol'];
		$nombrearchivo = $id . ".jpg";

		//Ruta donde se guardan los archivos
		$config['upload_path'] = './uploads/usersphoto/';
		//nombre del archivo
		$config['file_name'] = $nombrearchivo;

		$direccion = "./uploads/usersphoto/" . $nombrearchivo;

		if (file_exists($direccion)) 
		{
			unlink($direccion);
		}
		$config['allowed_types'] = 'jpg|png|GIF';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) //sino realiza la carga 
		{
			$data = array(
				'error' => $this->upload->display_errors()
			);
		}
		else 
		{

			$upload_data = $this->upload->data();
			$data = array(
				'foto' => $nombrearchivo,

				'file_name' => $upload_data['file_name'],
				'file_size' => $upload_data['file_size']
			);
			
			$this->crudusers_model->modificar($id, array('foto' => $nombrearchivo));

		}
		redirect('crudusers/habilitados/'.$rol);
	}
	public function editarperfil()
	{
		$id = $this->session->userdata('idUsuario');
		$data['info']=$this->crudusers_model->recuperarusuario($id)->row_array();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formeditarperfil', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function cambiarpassword()
	{
		$id =$this->session->userdata('idUsuario');
		$curpass=$this->session->userdata('password');
		$data['password']=hash("sha256",$_POST['confirmpass']);

		if(($curpass==(hash("sha256",$_POST['curpass']))) && ($curpass!=$data['password']))
		{
			$this->crudusers_model->modificar($id, $data);
			$this->session->set_flashdata('mensaje', 'Contraseña modificada exitosamente');
			$this->session->set_flashdata('alert_type', 'success');
			redirect('usuario/panel', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('contraseña', true);
			if($curpass==$data['password'])
			{
				$this->session->set_flashdata('mensaje', 'Ha introducido la misma Contraseña');
				$this->session->set_flashdata('alert_type', 'error');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Contraseña actual incorrecta');
				$this->session->set_flashdata('alert_type', 'error');
			}
			redirect('crudusers/editarperfil', 'refresh');
		}
		
	}
}
