<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
				$this->load->view('users/administrador/panel_administrador',$data);
				$this->load->view('layouts/footer');
				$this->load->view('users/administrador/scripts_administrador');
		
		}
		else{
			redirect(base_url()."home");
		}
	}

	public function informe($a,$b){

		return $a+$b;
	}
	public function reporte(){
		
		if ($this->session->userdata("login")){

			#PARA EL PRODUCTOR
			$data = array(
				'ganados' => $this->Usuario_model->getVacas(),     // nombre array para vista
			);

			$this->load->view('layouts/header');
			$this->load->view('users/list_ganado',$data);
			$this->load->view('layouts/footer');

		}
		else{
			redirect(base_url()."home");
		}
	}

}
