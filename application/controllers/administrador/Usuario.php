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

}
