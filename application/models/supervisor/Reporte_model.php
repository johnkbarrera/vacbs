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
		$sentencia = "	SELECT COALESCE(estado_vaca, 'No Registran') as estado_vaca , count(*) as cantidad FROM ganado AS g
						LEFT JOIN (SELECT r.ganado_id, estado_vaca FROM reproduccion AS r
								JOIN (SELECT ganado_id, MAX(reproduccion_id) AS reproduccion_id
									  FROM reproduccion
									  GROUP BY ganado_id) AS ultimos ON ultimos.reproduccion_id = r.reproduccion_id) AS estados
							  ON estados.ganado_id = g.ganado_id
						JOIN establo AS e ON g.establo_id = e.establo_id
						JOIN ganadero AS gd ON gd.ganadero_id = e.ganadero_id
						WHERE g.estado_saca != True
						GROUP BY estados.estado_vaca	
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
		$sentencia = "SELECT to_char(fecha,'yyyy-mm-dd') AS fecha, COUNT(*) AS ganado
					  FROM (SELECT fecha, 1 AS cabeza_ganado
						  	FROM produccion
						  	GROUP BY fecha, ganado_id) AS tb
					  GROUP BY fecha
					  ORDER BY fecha;
					  ";
	    $result = pg_query($sentencia);
	    $data = array();
	    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    	//echo $line['vaca_id'];
	    	$data[] = array(
	    		'y' => $line['fecha'],
	    		'a' => $line['ganado']
	    	);  	
	    }
	    return $data;
	}
	

	public function getGanado_en_Pruduccion_ordenios(){
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
}
