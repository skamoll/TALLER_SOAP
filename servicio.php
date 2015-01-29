<?php

//a basic API class
class RaspberryAPI {

	// TODO: obtener precio del producto y devolverlo
	function getPVP($cod_prod){

		return $cod_prod;
	}

	// TODO: obtener stock del producto segun tienda
	function getStock($cod_prod,$cod_tienda){

		return "getPVP";
	}

	// TODO: obtiene todas las familias
	function getFamilias(){
		return "getPVP";
	}

	// TODO: obtiene el código de todas las familias
	function getProductosFamilia($cod_familia){
		return "getPVP";
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