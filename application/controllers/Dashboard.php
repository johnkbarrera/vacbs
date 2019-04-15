<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Reporte_model");
	}


	public function index(){	

		if ($this->session->userdata("login")){

			#PARA EL PRODUCTOR
			$this->load->view('layouts/header');
			$this->load->view('users/panel');
			$this->load->view('layouts/footer');

		}
		else{
			redirect(base_url()."home");
		}
	}

	public function reporte(){
		
		if ($this->session->userdata("login")){

			#PARA EL PRODUCTOR
			$data = array(
				'ganados' => $this->Reporte_model->getVacas(),     // nombre array para vista
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
