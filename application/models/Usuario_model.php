<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function login($usuario,$password){
		#ENVIAMOS A LAS COLUNAS DE LA BD
		$this->db->where("usuario_nick",$usuario);
		$this->db->where("usuario_pass",$password);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0){
			return $resultados->row();
		}
		else{
			return false;
		}
	}

}
