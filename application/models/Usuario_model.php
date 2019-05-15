<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function login($usuario,$password){
		#ENVIAMOS A LAS COLUNAS DE LA BD
		$this->db->where("usuario",$usuario);
		$this->db->where("contrasenia",$password);

		$resultados = $this->db->get("usuario");
		if ($resultados->num_rows() > 0){
			return $resultados->row();
		}
		else{
			return false;
		}
	}

}
