<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("/ganadero/Reporte_model");
	}


	public function index(){	

		if ($this->session->userdata("login") and $this->session->userdata("perfil") == 'GANADERO'){

				# Donut
				$data_donut = $this->Reporte_model->getDonut($this->session->userdata("usuario"));
				//$data_bar = $this->Reporte_model->getBar();
		
				/*foreach ($DonutM as $row) {
					$data[] = array(
						'nombre' => $row->nombre,
						'registro' => $row->registro
					);
				}; */
				$data_encode_donut = json_encode($data_donut);	
				//$data_encode_bar = json_encode($data_bar);
				//echo $data_encode;
				$data = array(
					'donut' => $data_encode_donut,     // nombre array para vista
					'bar' => $data_encode_donut //$data_encode_bar
				);

				$this->load->view('layouts/header');
				$this->load->view('users/ganadero/panel_ganadero');
				$this->load->view('layouts/footer');
				$this->load->view('users/ganadero/scripts_ganadero',$data);


		}
		else{
			redirect(base_url()."home");
		}
	}

}
