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
				$this->load->view('users/panel_productor');
				$this->load->view('layouts/footer');
				$this->load->view('users/scripts_productor',$data);
			}

			#PARA EL ADMIN
			if ($this->session->userdata("perfil") == 'administrador'){

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

				$data_producion_mensual = $this->Reporte_model->getPruduccionMes();
				if(empty($data_producion_mensual)){
					$data_producion_mensual[] = array(
			    		'y' => 'Mes no registrado',
			    		'a' => 2,
			    		'b' => 40
			    	);  	
				}
				$data_producion_reporte = json_encode($data_producion_mensual);

				$data = array(
					'estado' => $data_estado_reporte,
					'produccion' => $data_producion_reporte
				);
				
				$this->load->view('layouts/header');
				$this->load->view('users/panel_admin',$data_recuento);
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
