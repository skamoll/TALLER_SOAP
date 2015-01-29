<?php
$options = array('location' => 'http://piserver.dyndns.org/DAW/DWES/SOAP/taller/servicio.php',
	'uri' => 'http://piserver.dyndns.org');

//create an instante of the SOAPClient (the API will be available)
$api = new SoapClient(NULL, $options);
//call an API method

if (isset($_POST["getpvp"]))
	$pvp = $api->getPVP(1);
if (isset($_POST["producto"])&&isset($_POST["tienda"]))
	$stock = $api->getStock($_POST["producto"],$_POST["tienda"]);
if (isset($_POST["familia"]))
	$productos = $api->getProductosFamilia($_POST["familia"]);
$familias = $api->getFamilias();

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		div{
			border: solid 2px #006aff;
			margin: 10px auto;
			width: 600px;
			padding: 10px;
		}
	</style>
</head>
<body>
<form action="cliente.php" method="POST">

	<div>Núm articulo:<input name="getpvp"type="text" /><?=$pvp."€";?><br /></div>

	<div>Producto:<input name="producto" type="text" />  Tienda:<input name="tienda" type="text" /><?=$stock." unidades en stock";?></div>

	<div>Famílias:<br />
		<em>
			<? foreach ($familias as $fam){
				echo $fam["idfamilias"].". ".$fam["nombre"]."<br>";
			}?>
		</em>
	</div>


	<div>Productos familia:<input name="familia" type="text" /><br />
		<em>
			<? foreach ($productos as $prod){
				echo $prod["idproductos"].". ".$prod["nombre"]."<br>";
			}?>
		</em>
	</div>

	<button value="sumbit">Consultar</button>




</form>
</body>
</html>