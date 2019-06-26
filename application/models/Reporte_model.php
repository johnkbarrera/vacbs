<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

	#-------------------------------------------------------------------------------#
	# SUPERVISOR

	public function getRecuento(){

	    $data = array(
					'ganaderos' => -1,
					'establos' => -1,
					'ganados' => -1,
					'produccion' => -1,
				);

	    $result = pg_query("SELECT COUNT(*) as total FROM ganadero");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['ganaderos'] = $line['total'];
	    }
	    $result = pg_query("SELECT to_char(AVG(establos.count),'FM999999999.00') AS media
							FROM (SELECT COUNT(*), 1 AS establos_id
								  FROM establo
								  GROUP BY ganadero_id) as establos
							GROUP BY establos.establos_id;
							");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['establos'] = $line['media'];
	    }
	    $result = pg_query("SELECT to_char(AVG(establos.vacas),'FM999999999.00') AS media
							FROM (SELECT establo_id, COUNT(*) as vacas, 1 as establos_id
								  FROM ganado
								  GROUP BY establo_id) AS establos
							GROUP BY establos.establos_id;
							");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['ganados'] = $line['media'];
	    }
	    $result = pg_query("SELECT to_char(AVG(medias.produccion_media),'FM999999999.00') AS media
							FROM (SELECT ganado_id, SUM(litros_leche)/COUNT(litros_leche) AS produccion_media
							      FROM produccion
								  GROUP BY ganado_id) AS medias;
							");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['produccion'] = $line['media'];
	    }

	    return $data;
	}

	public function getEstado(){
		$sentencia = "SELECT estado_vaca, COUNT(estado_vaca) AS cantidad
					  FROM (SELECT DISTINCT ON (ganado_id)
					       		   reproduccion_id, estado_vaca, ganado_id
						    FROM   reproduccion
					        ORDER BY ganado_id, estado_vaca DESC, ganado_id) AS tabla1
					  GROUP BY tabla1.estado_vaca;
					 ";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'label' => $line['estado_vaca'],
	    		'value' => $line['cantidad']
	    	);  	
	    }
	    return $data;
	}

	public function getPruduccionPromedio(){
		$sentencia = "SELECT to_char(fecha,'yyyy-mm-dd') AS fecha, to_char(AVG(litros_leche),'FM999999999.00') AS litros_leche
					  FROM produccion
					  GROUP BY fecha
					  ORDER BY fecha;
					  ";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'y' => $line['fecha'],
	    		//'a' => $line['ganados'],
	    		'a' => $line['litros_leche']
	    	);  	
	    }
	    return $data;
	}

	public function getGanado_en_Pruduccion(){
		$sentencia = "SELECT to_char(fecha,'yyyy-mm-dd') AS fecha, COUNT(*) AS ganados
					  FROM produccion
					  GROUP BY fecha
					  ORDER BY fecha;
					  ";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'y' => $line['fecha'],
	    		'a' => $line['ganados']
	    	);  	
	    }
	    return $data;
	}

	public function getInforme(){
		$sentencia = "SELECT comuna, count(*) as cantidad
					  FROM establo
					  GROUP BY comuna;";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'clave' => $line['comuna'],
	    		'valor1' => $line['cantidad']
	    	);  	
	    }
	    return $data;
	}

	#-------------------------------------------------------------------------------#
	# GANADERO
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


	#-------------------------------------------------------------------------------#
	# ADMINISTRADOR
}
