<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuario_auth_model");
	}

	public function index()
	{
		if ($this->session->userdata("login")){
			if ($this->session->userdata("perfil") == 'ADMINISTRADOR') {	
				redirect(base_url()."administrador/dashboard");
			}
			if ($this->session->userdata("perfil") == 'SUPERVISOR'){
				redirect(base_url()."supervisor/dashboard");
			} 
			if ($this->session->userdata("perfil") == 'GANADERO'){
				redirect(base_url()."ganadero/dashboard");
			}
		}
		else{
			$this->load->view('login');
		}
	}

	public function login(){
		$usuario = $this->input->post("f_usuario");
		$password = $this->input->post("f_contrasenna");

		$res = $this->Usuario_auth_model->login($usuario,sha1($password)); //encriptar pass

		if (!$res){
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."auth");
		}
		else{
			# DATOS DE RES SON LAS COLUMNAS DE LA BD
			$data = array(
				'id' => $res->usuario_id,		
				'tag' => $res->nombres." ".$res->apellidos,
				'email' => $res->correo,
				'usuario' => $res->usuario,
				'perfil' => $res->perfil,
				'login' => TRUE
			);
			$this->session->set_userdata($data);

			$this->index();


		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
