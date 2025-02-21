
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Crudusers extends CI_Controller
{
	public function habilitados($rol)
	{
		
		$lista = $this->crudusers_model->habilitados($rol);
		$data['usuarios'] = $lista;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		if($rol==2)
		{
			$this->load->view('usuarioshabilitados1', $data);
		}
		else
		{
			$this->load->view('socioshabilitados', $data);
		}	
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function deshabilitados($rol)
	{
		$lista = $this->crudusers_model->deshabilitados($rol);
		$data['usuarios'] = $lista;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		if($rol==2)
		{
			$this->load->view('usuariosdeshabilitados1', $data);
		}
		else
		{
			$this->load->view('sociosdeshabilitados', $data);
		}
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function agregar($rol)
	{
		$data['rol']=$rol;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formagregaruser1',$data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function agregarbd()
	{
		$newdata['nickname'] = $_POST['nickname'];
		$newdata['email'] = $_POST['email'];
		$newdata['ci'] = strtoupper($_POST['ci']);

		$consulta = $this->crudusers_model->comprobarinsercion($newdata);
		
		if (!empty($consulta)) 
		{
			
			if (isset($consulta['email']) && isset($consulta['nickName']) && isset($consulta['ci'])) 
			{
				$this->session->set_flashdata('mensaje', 'ERROR: El E-mail , Nickname y CI ya está registrados en el sistema.');
				$this->session->set_flashdata('alert_type', 'error');
			}
			else 
			{
				if (isset($consulta['email'])&&isset($consulta['nickName'])) 
				{
					$this->session->set_flashdata('mensaje', 'ERROR: El E-mail y Nickname ya está registrados en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
				else
				{
					if (isset($consulta['email'])&&isset($consulta['ci'])) 
					{
						$this->session->set_flashdata('mensaje', 'ERROR: El E-mail y CI ya está registrados en el sistema.');
						$this->session->set_flashdata('alert_type', 'error');
					}
					else
					{
						if (isset($consulta['nickName'])&&isset($consulta['ci'])) 
						{
							$this->session->set_flashdata('mensaje', 'ERROR: El Nickname y CI ya está registrados en el sistema.');
							$this->session->set_flashdata('alert_type', 'error');
						}
						else
						{
							if (isset($consulta['nickName']))
							{
								$this->session->set_flashdata('mensaje', 'ERROR: El Nickname ya está registrado en el sistema.');
								$this->session->set_flashdata('alert_type', 'error');
							}
							else
							{
								if (isset($consulta['email']))
								{
									$this->session->set_flashdata('mensaje', 'ERROR: El E-mail ya está registrado en el sistema.');
									$this->session->set_flashdata('alert_type', 'error');
								}
								else
								{
									$this->session->set_flashdata('mensaje', 'ERROR: El CI ya está registrado en el sistema.');
									$this->session->set_flashdata('alert_type', 'error');
								}
							}
						}
					}
				}
			}
			//redirect('crudusers/agregar');
			redirect('crudusers/agregar/'. $_POST['rol']);			
		} 
		else 
		{
			$this->session->set_userdata('flag', false);
			$data['nickname'] = $_POST['nickname'];
			$data['nombre'] = strtoupper($_POST['nombre']);
			$data['primerApellido'] = strtoupper($_POST['primerapellido']);
			$data['segundoApellido'] = strtoupper($_POST['segundoapellido']);
			$data['ci'] = strtoupper($_POST['ci']);
			$data['email'] = $_POST['email'];
			$data['rol'] = $_POST['rol'];
			$data['fono'] = $_POST['fono'];
			$data['sexo'] = $_POST['genero'];
			//$data['idAutor']=$this->session->userdata('idUsuario');

			if($data['rol']==0)
			{
				$this->db->trans_start();

				$this->crudusers_model->agregar($data);
				$idUsuario=$this->db->insert_id();

				$codigoSocio= $this->usuario_model->getusercode($idUsuario)->row_array();

				$data2['idUsuario'] = $idUsuario;
				$data2['codigoSocio'] = 'S-'.substr($codigoSocio['primerApellido'], 0, 2) . substr($codigoSocio['nombre'], -1) . substr($codigoSocio['ci'],0,1) . substr($codigoSocio['ci'], -1);
				$this->db->insert('membresia',$data2);
				$idMembresia=$this->db->insert_id();

				$this->db->trans_complete();

				if($this->db->trans_status()===FALSE)
				{
					$this->session->set_flashdata('mensaje', 'Error al agregar un nuevo usuario, inténtelo nuevamente');
					$this->session->set_flashdata('alert_type', 'error');
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'Usuario registrado exitosamente');
					$this->session->set_flashdata('alert_type', 'success');
				}
			}
			else
			{
				$this->crudusers_model->agregar($data);
			}

			
			//$this->enviaremail($data);
			
			redirect('crudusers/agregar/'. $data['rol']);
		}
	}

	private function enviaremail($data)
	{
		// Cargar el autoloader de Composer
		require 'C:/xampp/htdocs/tercerAnio/sanalfonso/vendor/autoload.php';

		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'games.gonzalo.883@gmail.com';
			$mail->Password   = 'jsmrkomgwhphyoac';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port       = 587;

			//Recipients
			$mail->setFrom('games.gonzalo.883@gmail.com', 'AquaReadPRo');
			$mail->addAddress($data['email']);

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'prueba de envio';
			$body = $this->load->view('emailmessage', $data, TRUE);
			$mail->Body = $body;

			$mail->send();
			return true;
		} 
		catch (Exception $e) 
		{
			log_message('error', "Error al enviar el correo: {$mail->ErrorInfo}");
			return false;
		}
	}
	public function modificar()
	{

		$id = $this->input->post('id');

		$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		if ($this->session->userdata('form1') !== null && $id==null) 
		{
			$this->load->view('formmodificaruser1', $this->session->userdata('form1'));
		}
		else 
		{
			$this->load->view('formmodificaruser1', $data);
		}
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function modificarbd()
	{

		$id = $_POST['id'];

		$newdata['nickname'] = $_POST['nickname'];
		$newdata['email'] = $_POST['email'];

		//verificar el email y nickname
		$consulta = $this->crudusers_model->comprobarmodificacion($newdata, $id);
		$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();
		if (!empty($consulta)) 
		{
			$this->session->set_flashdata('contraseña', false);
			$this->session->set_userdata('form1', $data);
			if ((isset($consulta['email']) && isset($consulta['nickName']))) 
			{
				$this->session->set_flashdata('mensaje', 'El E-mail y Nickname ya están registrados en el sistema.');
				$this->session->set_flashdata('alert_type', 'error');
			} 
			else 
			{
				if (isset($consulta['email'])) 
				{
					$this->session->set_flashdata('mensaje', 'El E-mail ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
				if (isset($consulta['nickName'])) 
				{
					$this->session->set_flashdata('mensaje', 'El Nickname ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
			}

			// if($_POST['formeditperfil'])
			// {
			//  redirect('crudusers/editarperfil', 'refresh');
			// }
			// else
			// {
			// 	redirect('crudusers/modificar', 'refresh');
			// }

			if (isset($_POST['formeditperfil'])) {
				redirect('crudusers/editarperfil', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'ERROR al modificar el registro');
				$this->session->set_flashdata('alert_type', 'error');
				redirect('crudusers/modificar', 'refresh');
			}
		} 
		else 
		{

			$data =
			[
				'nickName' => $_POST['nickname'],
				'nombre' => strtoupper($_POST['nombre']),
				'primerApellido' => strtoupper($_POST['primerapellido']),
				'segundoApellido' => strtoupper($_POST['segundoapellido']),
				'email' => $_POST['email'],
				'rol' => (int)$_POST['rol'],
				'fono' => $_POST['fono'],
				'sexo' => $_POST['genero']
			];

			$this->crudusers_model->modificar($id, $data);
			$this->session->set_flashdata('mensaje', 'Modificación exitosa');
			$this->session->set_flashdata('alert_type', 'success');
			redirect('crudusers/habilitados/'.$data['rol']); //revisar
		}
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
