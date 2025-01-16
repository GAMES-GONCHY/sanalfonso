<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
	public function index()
	{
		if ($this->session->userdata('nickName')) 
		{
            // Si el usuario ya está logueado, redirige al panel
            redirect('usuario/panel', 'refresh');
        } 
		else 
		{
            // Si no está logueado, muestra la página de login
            $this->load->view('pagelogin2');
        }

	}

	public function validarusuario()
	{
		$nickname=$_POST['nickname'];
		$password=hash("sha256",$_POST['password']);

		$consulta=$this->usuario_model->validar($nickname,$password);
		if($consulta->num_rows()>0)
		{
			//usuario válido
			$row = $consulta->row();
			if($row->estado == 1 || $row->estado == 2)
			{
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('nickName',$row->nickName);
				$this->session->set_userdata('rol',$row->rol);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('primerApellido',$row->primerApellido);
				$this->session->set_userdata('segundoApellido',$row->segundoApellido);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('foto',$row->foto);
				$this->session->set_userdata('estado',$row->estado);
				$this->session->set_userdata('password',$row->password);
				//$this->session->set_userdata('idAutor',$row->idAutor);
				redirect('usuario/panel','refresh');
			}
			else
			{
				// Usuario tiene estado no permitido
				$this->session->set_flashdata('error', 'Tu cuenta no está activa comunícate con el administrador.');
				redirect('usuario/index', 'refresh');
			}
		}
		else
		{
			//usuario incorrecto - > volvemos al login
			$this->session->set_flashdata('error', 'Nickname o contraseña incorrectos');
			redirect('usuario/index','refresh');
		}
	}
	public function panel()
	{
		if($this->session->userdata('nickName'))
		{
			if(($this->session->userdata('estado'))==1)
			{
				if(($this->session->userdata('rol'))==2)
				{
					$data['consumo'] = $this->reporte_model->consumo_total_ultima_lectura();
					$this->load->view('incrustaciones/vistascoloradmin/headdashboard');
					$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
					$this->load->view('paneladmin.php',$data);
					$this->load->view('incrustaciones/vistascoloradmin/footerdashboard');
				}
				else
				{
					// $this->load->view('incrustaciones/vistascoloradmin/headsocio');
					// $this->load->view('incrustaciones/vistascoloradmin/menusocio');
					// $this->load->view('panelsocio1.php');
					// $this->load->view('incrustaciones/vistascoloradmin/footersocios');
					redirect('socio/pagaraviso');//verificar aqui cierre automatico de sesion
				}
				
			}
			else
			{
				$this->load->view('form_pass_change.php');
			}
		}
		else
		{
			redirect('usuario/index','refresh');
		}
	}
	public function logout() 
	{
        // Destruye la sesión
        $this->session->sess_destroy();

        // Redirige a la página de inicio de sesión
        redirect('usuario/index','refresh');
    }
	public function firstlogin() 
	{
		$id=$this->session->userdata('idUsuario');
		$data['password']=hash("sha256",$_POST['password1']);
		$data['estado']=1;

		if($data['password']!=($this->session->userdata('password'))&&$data['password']!=hash("sha256",123))
		{
			$this->crudusers_model->deshabilitar($id,$data);
			$this->session->set_userdata('estado',1);

			$this->session->set_flashdata('mensaje', 'Contraseña modificada exitosamente!');
			$this->session->set_flashdata('alert_type', 'success');
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Porfavor, modifique su contraseña.');
			$this->session->set_flashdata('alert_type', 'error');
		}
		redirect('usuario/panel','refresh');
	}
	public function obtenerPagosMensual()//funcion para obtener datos para el grafico pagos vs tiempo
	{
		// Verificar que el usuario esté autenticado y autorizado
		if ($this->session->userdata('nickName') && ($this->session->userdata('estado')) == 1 && ($this->session->userdata('rol')) == 2) {
			// Llama a la función que obtiene los datos
			$data = $this->reporte_model->obtener_consumo_x_tiempo();
			log_message('debug', 'consumo x mes: ' . print_r($data, true));
			// Envía los datos en formato JSON
			echo json_encode($data);
		}
		else
		{
			// Si no está autorizado, envía un error o redirige
			show_error('No autorizado', 403);
		}
	}
	public function obtenerConsumoMensual()//funcion para obtener datos para el grafico consumo vs tiempo
	{

		// Obtener los datos desde el modelo
		$data = $this->reporte_model->obtener_consumo_x_tiempo();

		// Devolver los datos como JSON
		echo json_encode($data);
	}
}
