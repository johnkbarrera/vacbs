<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {


	public function getIndicadores($usuario){
		$data = array(
					'establos' => 0,
					'ganado_x_establo' => 0,
					'produccion_x_establo' => 0,
					'producion_x_ganado' => 0,
				);

		$result = pg_query("SELECT count(*) AS total FROM establo AS e
							JOIN ganadero AS u ON e.ganadero_id = u.ganadero_id 
							WHERE u.usuario = '".$usuario."';	
						   ");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['establos'] = $line['total'];
	    }


		$result = pg_query("SELECT to_char(AVG(resumen.count),'FM999999999.00') AS media
							FROM (SELECT COUNT(*) , 1 AS resumen_id
								  FROM ganado AS gd
								  JOIN establo AS e ON e.establo_id = gd.establo_id 
								  JOIN ganadero AS u ON e.ganadero_id = u.ganadero_id 
								  WHERE u.usuario = '".$usuario."'	
								  AND gd.estado_saca = false
								  GROUP BY e.establo_id) AS resumen
							GROUP BY resumen.resumen_id;
						   ");
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data['ganado_x_establo'] = $line['media'];
	    }



		return $data;
	}


	public function getDonutEstados($usuario){

		$sentencia = "	SELECT COALESCE( estado_vaca, 'No Registran') as estado_vaca, count(*) as cantidad
					  	FROM ganado AS g
						LEFT JOIN (	SELECT r.ganado_id, estado_vaca FROM reproduccion AS r
									JOIN (	SELECT ganado_id, MAX(reproduccion_id) AS reproduccion_id
			  								FROM reproduccion
			  								GROUP BY ganado_id) AS ultimos 
			  						ON ultimos.reproduccion_id = r.reproduccion_id) AS estados
	  						ON estados.ganado_id = g.ganado_id
						JOIN establo AS e ON g.establo_id = e.establo_id
						JOIN ganadero AS gd ON gd.ganadero_id = e.ganadero_id
						WHERE g.estado_saca != True AND gd.usuario = '".$usuario."'	
						GROUP BY estados.estado_vaca	
					  ";

	    $result = pg_query($sentencia);

	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

	    	$data[] = array(
	    		'label' => $line['estado_vaca'],
	    		'value' => $line['cantidad']
	    	);  
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

	public function getEstablosLista($usuario){	

		$sentencia = "SELECT e.establo_id, e.nombre, e.detalle, e.pais, e.region, count(*) as cantidad FROM establo AS e 
					  JOIN ganado AS g ON e.establo_id = g.establo_id
					  JOIN ganadero AS gd ON e.ganadero_id = gd.ganadero_id
					  WHERE gd.usuario =  '".$usuario."'
					  GROUP BY e.establo_id ;
				      ";

	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data[] = array(
	    		'establo_id' => $line['establo_id'],
	    		'nombre' => $line['nombre'],
	    		'cantidad' => $line['cantidad'],
	    		'lugar' => $line['pais']." - ".$line['region']
	    	);  
	    }
	    return $data;
	}



	public function getGanadoLista($usuario){	

		$sentencia = "SELECT g.ganado_id, g.nombre, g.registro, g.raza, g.procedencia, g.dob, g.pesodob, e.establo_id, e.nombre as nombre_e
					  FROM ganado  AS g
					  INNER JOIN establo AS e ON g.establo_id = e.establo_id
					  JOIN ganadero AS gd ON e.ganadero_id = gd.ganadero_id
					  WHERE gd.usuario =  '".$usuario."'
					  AND g.estado_saca = False;
				      ";

	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	$data[] = array(
	    		'ganado_id' => $line['ganado_id'],
	    		'nombre' => $line['nombre'],
	    		'registro' => $line['registro'],
	    		'raza' => $line['raza'],
	    		'procedencia' => $line['procedencia'],
	    		'dob' => $line['dob'],
	    		'pesodob' => $line['pesodob'],
	    		'establo_id' => $line['establo_id'],
	    		'e_nombre' => $line['nombre_e']
	    	);  
	    }
	    return $data;


	}

}


/*

SELECT g.ganado_id, g.nombre, g.registro, g.raza, g.procedencia, g.dob, g.pesodob, e.establo_id, e.nombre FROM ganado AS g INNER JOIN establo AS e ON g.establo_id = e.establo_id JOIN ganadero AS gd ON e.ganadero_id = gd.ganadero_id WHERE gd.usuario = 'jkn@gmail.com' AND g.estado_saca = False;

*/