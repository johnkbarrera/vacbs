<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuario_model");
	}

	public function index()
	{
		if ($this->session->userdata("login")){
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view('login');
		}
	}

	public function login(){
		$usuario = $this->input->post("f_usuario");
		$password = $this->input->post("f_contrasenna");

		$res = $this->Usuario_model->login($usuario,$password); //encriptar pass

		if (!$res){
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."auth");
		}
		else{
			# DATOS DE RES SON LAS COLUMNAS DE LA BD
			$data = array(
				'id' => $res->user_id,
				'tag' => $res->nombre + $res->apellido,
				'email' => $res->email,
				'usuario' => $res->usuario,
				'perfil' => $res->perfil,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
