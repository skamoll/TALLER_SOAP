<?php

/**
 * Clase para implementar SOAP.
 */
class RaspberryAPI {

	/**
	 * Obtiene el id del articulo para devolver su precio.
	 *
	 * @param string
	 * @return string
	 */
	function getPVP($cod_prod){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getPVP($cod_prod);
	}

	/**
	 * Obtiene el código de producto y el código de tienda y devuelve el stock de dicho artículo en dicha tienda.
	 *
	 * @param string
	 * @param string
	 * @return string
	 */
	function getStock($cod_prod,$cod_tienda){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getStock($cod_prod,$cod_tienda);
	}

	/**
	 * Devuelve un listado de todas las famílias.
	 *
	 * @return string[][]
	 */
	function getFamilias(){
		include "inc/Connection.php";
		$conn = new Connection();
		return $conn->getFamilias();
	}

	/**
	 * Obtiene el código de una família y muestra todos los artículo de ésta.
	 *
	 * @param string
	 * @return string[][]
	 */
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

include "inc/WSDLDocument.php";
$wsdl = new WSDLDocument( "RaspberryAPI" );
echo $wsdl->saveXml();