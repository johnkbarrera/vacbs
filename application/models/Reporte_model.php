<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

	public function getVacas(){
		//$this->db->where("")
		$resultados = $this->db->get("ganados"); // tabla
		return $resultados->result();
	}

}
