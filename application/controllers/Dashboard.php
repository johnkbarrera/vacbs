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
			if ($this->session->userdata("perfil") == 'GANADERO'){

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
				$this->load->view('users/panel_ganadero');
				$this->load->view('layouts/footer');
				$this->load->view('users/scripts_productor',$data);
			}

			#PARA EL SUPERVISOR
			if ($this->session->userdata("perfil") == 'SUPERVISOR'){

				# DATOS
				$data_recuento = $this->Reporte_model->getRecuento();

				$data_estado = $this->Reporte_model->getEstado();
				if(empty($data_estado)){
					$data_estado[] = array(
			    		'label' => 'Sin elementos',
			    		'value' => 0
			    	);  	
				}
				$data_estado_reporte = json_encode($data_estado);

				$data_vacas_temp = $this->Reporte_model->getGanado_en_Pruduccion();
				if(empty($data_vacas_temp)){
					$data_vacas_temp[] = array(
			    		'y' => 'Mes no registrado',
			    		'a' => 2
			    	);  	
				}
				$data_vacas_temporal = json_encode($data_vacas_temp);

				$data_producion_temp = $this->Reporte_model->getPruduccionPromedio();
				if(empty($data_producion_temp)){
					$data_producion_temp[] = array(
			    		'y' => 'Mes no registrado',
			    		'a' => 2
			    	);  	
				}
				$data_producion_temporal = json_encode($data_producion_temp);

				$data = array(
					'estado' => $data_estado_reporte,
					'produccion' => $data_producion_temporal,
					'vacas' => $data_vacas_temporal
				);
				
				$this->load->view('layouts/header');
				$this->load->view('users/panel_supervisor',$data_recuento);
				$this->load->view('layouts/footer');
				$this->load->view('users/complementos/scripts_admin',$data);
			}
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
