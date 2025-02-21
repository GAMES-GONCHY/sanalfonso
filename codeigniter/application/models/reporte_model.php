<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model
{
	public function obtener_socio_por_criterio($criterio) 
	{
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS nombre, M.codigoSocio, M.idMembresia");
		$this->db->from('usuario U');
		$this->db->join('membresia M', 'U.idUsuario = M.idUsuario', 'inner');
		
		// Agrupar condiciones para limitar la búsqueda
		$this->db->group_start();
		$this->db->where('M.codigoSocio', $criterio);
		$this->db->or_where('U.primerApellido', $criterio);
		$this->db->group_end();

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
		
	public function obtener_datos_historicos($data) 
	{
		$this->db->select('socio, totalPagado, fechaLectura, fechaPago, consumo, observacion, estado, codigoSocio');
		$this->db->from('reportepagosconsumos');

		// Condición de estado según el tipo de reporte
		if ($data['tipoReporte'] == 'pagos')
		{
			$this->db->where('estado', 'pagado');  // Historial de pagos: estado = 'pagado'
		}
		elseif($data['tipoReporte'] == 'consumos')
		{
			$this->db->where('estado !=', 'deshabilitado');  // Historial de consumos: estado distinto de 'deshabilitado'
		}
		$this->db->where('idMembresia', $data['idMembresia']);
		$this->db->where('codigoSocio', $data['codigoSocio']);
		$this->db->where('fechaPago >=', $data['fechaInicio']);
		$this->db->where('fechaPago <=', $data['fechaFin']);
		$this->db->order_by('fechaLectura', 'ASC');

		$query = $this->db->get();

		// Retorna los resultados como un array de objetos
		if ($query->num_rows() > 0) {
			return $query->result_array(); 
		} else {
			return [];
		}
	}
	public function historial_pagos($data)
	{
		$this->db->select('idMembresia, idAviso, codigoSocio, socio, monto, periodo, fechaPago');
		$this->db->from('reportepagos');
		
		$this->db->where('idMembresia', $data['idMembresia']);
		$this->db->where('estado', 'habilitado');  // Historial de pagos: estado = 'pagado'
		$this->db->where('fechaPago >=', $data['fechaInicio']);
		$this->db->where('fechaPago <=', $data['fechaFin']);
		$this->db->order_by('periodo', 'ASC');

		$query = $this->db->get();

		// Retorna los resultados como un array de objetos
		if ($query->num_rows() > 0) {
			return $query->result_array(); 
		} else {
			return [];
		}
	}
	public function historial_consumo($data)
	{
		// Construir consulta con Active Record en CodeIgniter
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS socio", FALSE);
		$this->db->select('(L.lecturaActual - L.lecturaAnterior)/100 AS consumo', FALSE);
		$this->db->select('M.codigoSocio, L.fechaLectura');
		$this->db->select("
			CASE
				WHEN (L.lecturaActual - L.lecturaAnterior)/100 < 10 THEN 'Consumo mínimo'
				WHEN (L.lecturaActual - L.lecturaAnterior)/100 < 20 THEN 'Consumo moderado'
				WHEN (L.lecturaActual - L.lecturaAnterior)/100 < 30 THEN 'Estándar'
				WHEN (L.lecturaActual - L.lecturaAnterior)/100 < 40 THEN 'Consumo alto'
				ELSE 'Consumo muy alto'
			END AS observacion", FALSE);
		$this->db->from('avisocobranza A');
		$this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
		$this->db->join('membresia M', 'L.idMembresia = M.idMembresia', 'inner');
		$this->db->join('usuario U', 'M.idUsuario = U.idUsuario', 'inner');
		$this->db->where('M.idMembresia', $data['idMembresia']);
		//$this->db->where('A.estado <>', 'deshabilitado');
		$this->db->where('L.fechaLectura >=', $data['fechaInicio']);
		$this->db->where('L.fechaLectura <=', $data['fechaFin']);
		$this->db->order_by('L.fechaLectura', 'ASC');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array(); 
		} else {
			return [];
		}
	}
	public function historial_avisos($data)
	{
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS socio", FALSE);
		$this->db->select('M.codigoSocio, L.fechaLectura');
		//$this->db->select('(L.lecturaActual - L.lecturaAnterior)*T.tarifaVigente/100 AS total', FALSE);
		$this->db->select("IF((L.lecturaActual - L.lecturaAnterior) / 100 >= 10, 
                            (L.lecturaActual - L.lecturaAnterior)*T.tarifaVigente/100,
							T.tarifaMinima) AS total", FALSE);
		//$this->db->select('IFNULL(A.saldo, 0) AS saldo', FALSE);
		$this->db->select('A.estado AS estado');
		$this->db->from('avisocobranza A');
		$this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
		//$this->db->join('medidor M', 'L.idMedidor = M.idMedidor', 'inner');
		$this->db->join('membresia M', 'L.idMembresia = M.idMembresia', 'inner');
		$this->db->join('usuario U', 'M.idUsuario = U.idUsuario', 'inner');
		$this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
		if (!empty($data['idMembresia'])&&!empty($data['codigoSocio']))
		{
			$this->db->where('M.idMembresia', $data['idMembresia']);
		}
		$this->db->where_in('A.estado', 'VENCIDO');

		$this->db->where('A.fechaVencimiento >=', $data['fechaInicio']);
		$this->db->where('A.fechaVencimiento <=', $data['fechaFin']);

		// Ordenar primero por codigoSocio y luego por fechaLectura en orden descendente
		$this->db->order_by('M.codigoSocio', 'ASC');
		$this->db->order_by('L.fechaLectura', 'ASC');


		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array(); 
			
		}
		else
		{
			return [];
		}
	}
	public function obtener_top_consumidores($data)
	{
		$this->db->select('M.codigoSocio AS codigo');
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido, IFNULL(U.segundoApellido, '')) AS socio", FALSE);
		$this->db->select('SUM((L.lecturaActual - L.lecturaAnterior)/100) AS consumo', FALSE); // Suma del consumo anual
		$this->db->select("SUM(
			IF((L.lecturaActual - L.lecturaAnterior)/100 >= 10, 
			(L.lecturaActual - L.lecturaAnterior)*T.tarifaVigente/100 , 
			T.tarifaMinima)
		) AS total", FALSE); // Suma del total anual o mensual según corresponda
		$this->db->from('avisocobranza A');
		$this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
		$this->db->join('membresia M', 'L.idMembresia = M.idMembresia', 'inner');
		$this->db->join('usuario U', 'M.idUsuario = U.idUsuario', 'inner');
		$this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
	
		// Filtrar por año y mes si están definidos
		if (!empty($data['anio'])) {
			$this->db->where('YEAR(L.fechaLectura)', $data['anio']);
		}
	
		// Filtrar por mes (opcional)
		if (!empty($data['mes'])) {
			$this->db->where('MONTH(L.fechaLectura)', $data['mes']);
		}
	
		// Agrupar por código de socio
		$this->db->group_by([
			'M.codigoSocio',
			'U.nombre',
			'U.primerApellido',
			'U.segundoApellido'
		]);
		$this->db->order_by('consumo', 'DESC'); // Ordenar por consumo total
	
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			// Seleccionar los primeros 5 elementos después de ordenar
			return array_slice($result, 0, 5);
		} else {
			return [];
		}
	}
	public function total_vencidos()
	{
		$this->db->select('COUNT(A.idAviso) AS cantidad');
		$this->db->from('avisocobranza A');
		//$this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
		$this->db->where_in('A.estado','vencido');
		// $this->db->where("DATE_FORMAT(L.fechaLectura, '%Y,%m') = (SELECT DATE_FORMAT(MAX(fechaLectura), '%Y,%m') FROM lectura WHERE estado <> 0)", null, false);

		$query = $this->db->get();
	
		// Devolver el valor directamente como un número
		$result = $query->row();
		return $result->cantidad;
	}
	public function porcentaje_vencidos_rechazados()
	{
		// Llamada a la función `usfPorcentajeAvisos` en MySQL
		$query = $this->db->query("SELECT ufcPorcentajeAvisos() AS porcentaje");

		// Recuperar el resultado
		$result = $query->row();
	
		// Retornar el resultado formateado
		return $result->porcentaje;
	}
	public function obtener_top1()
	{
		$this->db->select('ME.codigoSocio AS codigo');
		$this->db->select('L.fechaLectura AS fechaLectura');
		$this->db->select("CONCAT_WS(' ', U.nombre, U.primerApellido) AS socio", FALSE);
		$this->db->from('membresia ME');
		$this->db->join('usuario U', 'ME.idUsuario = U.idUsuario', 'inner');
		$this->db->join('medidor M', 'ME.idMembresia = M.idMembresia', 'inner');
		$this->db->join('lectura L', 'M.idMedidor = L.idMedidor', 'inner');
		$this->db->join('avisocobranza A', 'A.idLectura = L.idLectura', 'inner');
		$this->db->where('A.estado <>', 'deshabilitado');
		$this->db->where("DATE_FORMAT(L.fechaLectura, '%Y,%m') = (SELECT DATE_FORMAT(MAX(fechaLectura), '%Y,%m') FROM lectura WHERE estado <> 0)", null, false);
		$this->db->where("((L.lecturaActual - L.lecturaAnterior) / 100) = (SELECT MAX((lecturaActual - lecturaAnterior) / 100) FROM lectura WHERE estado <> 0 AND DATE_FORMAT(fechaLectura, '%Y,%m') = DATE_FORMAT(L.fechaLectura, '%Y,%m'))", null, false);

		$query = $this->db->get();
		$result = $query->row();
	
		// Retorna el resultado de ambas columnas o `null` si no hay resultado
		return $result ? ['socio' => $result->socio, 'fechaLectura' => $result->fechaLectura] : null;
	}

	public function consumo_total_ultima_lectura()
	{
		// Llama al procedimiento almacenado
		$query = $this->db->query("CALL uspConsumoTotalUltimaLectura()");

		// Verifica si hay resultados y retorna como un arreglo de objetos
		$result = $query->row_array();

		// Retorna el resultado o null si no hay datos
		return $result ? $result : null;
	}
	public function obtener_consumo_x_tiempo()//grafica dashboard pagos y consumos vs tiempo
	{
		$this->db->select("DATE_FORMAT(L.fechaLectura, '%Y-%m') AS mes", false);
		$this->db->select("SUM((L.lecturaActual - L.lecturaAnterior) / 100) AS total_consumido", false);
		//$this->db->select("SUM(CASE WHEN A.estado = 'pagado' THEN (L.lecturaActual - L.lecturaAnterior) * T.tarifaVigente / 100 ELSE 0 END) AS total_pagado", false);
		$this->db->select("SUM(CASE WHEN A.estado = 'pagado' 
									THEN IF((L.lecturaActual - L.lecturaAnterior) / 100 >= 10, 
										(L.lecturaActual - L.lecturaAnterior)*T.tarifaVigente/100,
										T.tarifaMinima)
									ELSE 0 END) AS total_pagado", false);
		$this->db->from('lectura L');
		$this->db->join('avisocobranza A', 'L.idLectura = A.idLectura');
		$this->db->join('tarifa T', 'A.idTarifa = T.idTarifa');
		$this->db->where("L.estado", 1);
		$this->db->where("DATE_FORMAT(L.fechaLectura, '%Y-%m') >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 7 MONTH), '%Y-%m')", null, false);
		$this->db->group_by("mes");
		$this->db->order_by("mes", "ASC");
	
		// Ejecutar la consulta y obtener los resultados
		$query = $this->db->get();
	
		// Retornar los resultados en formato de arreglo
		return $query->result_array();
	}

}
