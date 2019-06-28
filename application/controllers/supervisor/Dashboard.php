<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("/supervisor/Reporte_model");
	}


	public function index(){	

		if ($this->session->userdata("login") AND $this->session->userdata("perfil") == 'SUPERVISOR'){

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
			$this->load->view('users/supervisor/panel_supervisor',$data_recuento);
			$this->load->view('layouts/footer');
			$this->load->view('users/supervisor/scripts_supervisor',$data);
		
		}
		else{
			redirect(base_url()."home");
		}
	}

}
