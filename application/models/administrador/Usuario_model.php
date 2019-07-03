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

	public function existeUsuario($email){

		$existe = 0;

		$result = pg_query("select count(*) as total from usuario where usuario = '".$email."';	
						   ");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$existe= $line['total'];
	    }

	    if ($existe > 0) {
	    	return true;
	    }

		return false;
	}

	public function save($data){
		return $this->db->insert(usuario,$data);
	}

	public function update_pass($data){
		$this->db->where('usuario', $data['usuario']);
		$this->db->update('usuario', $data); 
	}


}
