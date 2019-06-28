<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {



	public function getVacas(){
		//$this->db->where("")
		$resultados = $this->db->get("ganado"); // tabla
		return $resultados->result();
	}

	public function getDonut($usuario){
		# $sentencia = "select * from ganado where user_id = 1;";
		$sentencia = "SELECT ganado.nombre,
	   						 ganado.pesodob
					  FROM ganado 
					  INNER JOIN establo ON establo.establo_id = ganado.establo_id 
					  INNER JOIN ganadero ON ganadero.ganadero_id = establo.ganadero_id
					  WHERE ganadero.usuario = '".$usuario."'";

	    $result = pg_query($sentencia);

	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'label' => $line['nombre'],
	    		'value' => $line['pesodob']
	    	);  	
	    	/*foreach ($line as $col_value) {
	    		echo $col_value;
	    		echo "    ";
    		}*/
	    }
	    return $data;
	}

	public function getBar(){
		# $sentencia = "select * from ganado where user_id = 1;";
		$sentencia = "SELECT usuario.user_id,
					         usuario.email,
					         ganado.vaca_id,
					       	 ganado.nombre,
					         ganado.registro,
					         ordenio.ordenio_id,
					         estado_vaca.estado_id,
					         estado_vaca.fecha,
					         estado_vaca.estado
						  FROM estado_vaca 
						  INNER JOIN ordenio ON estado_vaca.ordenio_id=ordenio.ordenio_id AND estado_vaca.vaca_id=ordenio.vaca_id
						  INNER JOIN ganado ON ganado.vaca_id=ordenio.vaca_id
						  INNER JOIN usuario ON usuario.user_id=ganado.user_id
						  WHERE usuario.user_id = 1;
				      ";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data[] = array(
	    		'y' => $line['nombre'],
	    		'a' => $line['ordenio_id']
	    	);  
	    }
	    return $data;
	}

}
