<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	#-------------------------------------------------------------------------------#

	#-------------------------------------------------------------------------------#
	public function getUsuarioLista(){
		//$this->db->where("")
		$resultados = $this->db->get("usuario"); // tabla
		return $resultados->result();
	}


}
