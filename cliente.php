<?php
$options = array('location' => 'http://piserver.dyndns.org/DAW/DWES/SOAP/taller/servicio.php',
	'uri' => 'http://piserver.dyndns.org');
//create an instante of the SOAPClient (the API will be available)
$api = new SoapClient(NULL, $options);
//call an API method
echo $api->getPVP($cod_prod);
echo $api->getStock($cod_prod);
echo $api->getFamilias();
echo $api->getProductosFamilia($cod_familia);
?>