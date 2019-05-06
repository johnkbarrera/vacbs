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
			if ($this->session->userdata("perfil") == 'productor'){

				# Donut
				$data_donut = $this->Reporte_model->getDonut();
				$data_bar = $this->Reporte_model->getBar();
		
				/*foreach ($DonutM as $row) {
					$data[] = array(
						'nombre' => $row->nombre,
						'registro' => $row->registro
					);
				}; */
				$data_encode_donut = json_encode($data_donut);	
				$data_encode_bar = json_encode($data_bar);
				//echo $data_encode;
				$data = array(
					'donut' => $data_encode_donut,     // nombre array para vista
					'bar' => $data_encode_bar
				);


				$this->load->view('layouts/header');
				$this->load->view('users/panel_productor');
				$this->load->view('layouts/footer');
				$this->load->view('users/scripts_productor',$data);


			}
			#PARA EL ADMIN
			if ($this->session->userdata("perfil") == 'admin'){
				$this->load->view('layouts/header');
				$this->load->view('users/panel_admin');
				$this->load->view('layouts/footer');
				$this->load->view('users/scripts_admin');
			}
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
