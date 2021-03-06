<?php

//CLASE API
class RaspberryAPI {

	/*
	 * FUNCIONES COMENTADAS EN LA CLASE CONNECTION
	 * LA DIFERENCIA CON LA CLASE CONNECTION, ES QUE
	 * ESTE MÉTODO ES LLAMADO PARA DEVOLVER LOS DATOS
	 * QUE PROPORCIONA LA CLASE CONNECTION
	 */
	function getPVP($cod_prod){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getPVP($cod_prod);
	}

	function getStock($cod_prod,$cod_tienda){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getStock($cod_prod,$cod_tienda);
	}

	function getFamilias(){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getFamilias();
	}

	function getProductosFamilia($cod_familia){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getProductosFamilia($cod_familia);
	}

}

//CUANDO NO ESTA EN MODO WDSL, SE DEBE ESPECIFICAR LA URI
$options = array('uri' => 'http://piserver.dyndns.org');
//CREA UN NUEVO SERVIDOR SOAP
$server = new SoapServer(NULL, $options);
//AÑADE LA CLASE API AL SERVICIO SOAP
$server->setClass('RaspberryAPI');
// INICIA EL MANEJADOR DEL SERVICIO SOAP
$server->handle();