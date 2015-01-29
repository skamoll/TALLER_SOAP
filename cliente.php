<?php
$options = array('location' => 'http://piserver.dyndns.org/DAW/DWES/SOAP/taller/servicio.php',
	'uri' => 'http://piserver.dyndns.org');

//create an instante of the SOAPClient (the API will be available)
$api = new SoapClient(NULL, $options);
//call an API method
echo $api->getPVP(1);
echo $api->getStock(2,2);
//echo $api->getFamilias();
//var_dump($api->getFamilias());

//echo $api->getProductosFamilia($cod_familia);
var_dump($api->getProductosFamilia(2));
?>