<?php

//a basic API class
class RaspberryAPI {

	// TODO: obtener precio del producto y devolverlo
	function getPVP($cod_prod){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getPVP($cod_prod);
	}

	// TODO: obtener stock del producto segun tienda
	function getStock($cod_prod,$cod_tienda){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getStock($cod_prod,$cod_tienda);
	}

	// TODO: obtiene todas las familias
	function getFamilias(){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getFamilias();
	}

	// TODO: obtiene el código de todas las familias
	function getProductosFamilia($cod_familia){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getProductosFamilia($cod_familia);
	}

}

//when in non-wsdl mode the uri option must be specified
$options = array('uri' => 'http://piserver.dyndns.org');
//create a new SOAP server
$server = new SoapServer(NULL, $options);
//attach the API class to the SOAP Server
$server->setClass('RaspberryAPI');
//start the SOAP requests handler
$server->handle();