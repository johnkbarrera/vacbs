<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("/administrador/Usuario_model");
	}


	public function index(){	

		if ($this->session->userdata("login") AND $this->session->userdata("perfil") == 'ADMINISTRADOR'){

				##PARA EL PRODUCTOR
				$data = array(
					'usuarios' => $this->Usuario_model->getUsuarioLista(),     // nombre array para vista
				);

				$this->load->view('layouts/header');
				$this->load->view('users/administrador/mantenimiento_usuario/listar',$data);
				$this->load->view('layouts/footer');
				$this->load->view('users/administrador/scripts_administrador');
		
		}
		else{
			redirect(base_url()."home");
		}
	}

	public function crear(){

		if ($this->session->userdata("login") AND $this->session->userdata("perfil") == 'ADMINISTRADOR'){

				$data = array(
					'usuarios' => $this->Usuario_model->getUsuarioLista(),     // nombre array para vista
				);

				$this->load->view('layouts/header');
				$this->load->view('users/administrador/mantenimiento_usuario/crear');
				$this->load->view('layouts/footer');
				$this->load->view('users/administrador/scripts_administrador');
		
		}
		else{
			redirect(base_url()."home");
		}
	}

	public function crear_action(){

		if ($this->session->userdata("login") AND $this->session->userdata("perfil") == 'ADMINISTRADOR'){

			$nombres = $this->input->POST('nombres');
			$apellidos = $this->input->POST('apellidos');
			$email = $this->input->POST('correo');
			$usuario = $email;
			$contrasenia = $this->input->POST('contrasenia');
			$contrasenia2 = $this->input->POST('contrasenia2');
			$perfil = $this->input->POST('perfil');

			$formulario = true;
			if (empty($nombres) || empty($apellidos) || empty($email) || empty($contrasenia) || empty($contrasenia)) {
				$formulario = false;
				$this->session->set_flashdata("error","Complete todos los campos");
				redirect(base_url()."administrador/usuario/crear");
			} elseif ($formulario & ($contrasenia != $contrasenia2)) {
				$this->session->set_flashdata("error","Las contraseñas con coinciden");
				redirect(base_url()."administrador/usuario/crear");
			} elseif ($formulario & $this->Usuario_model->existeUsuario($email)) {
				$this->session->set_flashdata("error","El usuario ya existe");
				redirect(base_url()."administrador/usuario/crear");
			} else{

				$data = array(
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'usuario' => $usuario,
					'contrasenia' => sha1($contrasenia),
					'correo' => $email,
					'perfil' => $perfil
				);

				if ($this->Usuario_model->save($data)) {
					redirect(base_url()."administrador/usuario");
				} else {
					$this->session->set_flashdata("error","Error registrando datos");
					redirect(base_url()."administrador/usuario/crear");
				}
			}
		}
		else{
			redirect(base_url()."home");
		}
	}

	public function mofidicar_pass(){

		if ($this->session->userdata("login") AND $this->session->userdata("perfil") == 'ADMINISTRADOR'){

			$email = $this->input->POST('correo');
			$usuario = $email;
			$contrasenia = $this->input->POST('contrasenia');
			$contrasenia2 = $this->input->POST('contrasenia2');
			$perfil = $this->input->POST('perfil');

			$formulario = true;
			if (empty($email) || empty($contrasenia) || empty($contrasenia)) {
				$formulario = false;
				$this->session->set_flashdata("error","Complete todos los campos");
				redirect(base_url()."administrador/usuario/crear");
			} elseif ($formulario & ($contrasenia != $contrasenia2)) {
				$this->session->set_flashdata("error","Las contraseñas con coinciden");
				redirect(base_url()."administrador/usuario/crear");
			} else{

				$data = array(
					'usuario' => $usuario,
					'contrasenia' => sha1($contrasenia),
				);

				if ($this->Usuario_model->savepass($data)) {
					redirect(base_url()."administrador/usuario");
				} else {
					$this->session->set_flashdata("error","Error registrando datos");
					redirect(base_url()."administrador/usuario/crear");
				}
			}
		}
		else{
			redirect(base_url()."home");
		}
	}

}
