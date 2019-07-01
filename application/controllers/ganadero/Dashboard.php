<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("/ganadero/Reporte_model");
	}


	public function index(){	

		if ($this->session->userdata("login") and $this->session->userdata("perfil") == 'GANADERO'){



			// INDICADORES
			$data_indicadores = $this->Reporte_model->getIndicadores($this->session->userdata("usuario"));


			$data_establos = $this->Reporte_model->getEstablosLista($this->session->userdata("usuario"));     // nombre array para vista


			$data_ganado = $this->Reporte_model->getGanadoLista($this->session->userdata("usuario"));    // nombre array para vista


			$data_corpus = array(
				'lista_indicadores' => $data_indicadores,     // nombre array para vista
				'lista_establos' => $data_establos,
				'lista_ganado' => $data_ganado
			);


			# Donut
			$data_donut = $this->Reporte_model->getDonut($this->session->userdata("id"));
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
			$this->load->view('users/ganadero/panel_ganadero',$data_corpus);
			$this->load->view('layouts/footer');
			$this->load->view('users/ganadero/scripts_ganadero',$data);


		}
		else{
			redirect(base_url()."home");
		}
	}

}
