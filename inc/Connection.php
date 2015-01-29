<?php


class Connection {
	private $hostdb = "piserver.dyndns.org";
	private $userdb = 'dwes_user';
	private $namedb = 'taller_soap';
	private $passdb = 'XypQ3Q9QycLUzwxP';
	public $c;

	// ESTABLECE CONEXIÓN CON LA BASE DE DATOS
	function Connection(){
		$this->c = new PDO("mysql:host=".$this->hostdb."; dbname=".$this->namedb."", $this->userdb, $this->passdb);
		$this->c->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
	}

	// OBTIENE EL ID DEL USUARIO DADO
	public function getPVP($idproductos){
		$sql = "SELECT precio ".
			"FROM  `productos` ".
			"WHERE idproductos = ".$idproductos;
		$q = $this->c->prepare($sql);
		$q->execute();
		return $q->fetch()['precio'];
	}

	public function getStock($cod_prod,$cod_tienda){
		$sql = "SELECT stock FROM tiendas_has_productos ".
			"WHERE productos_idproductos=2 AND tiendas_idtiendas=2";
		$q = $this->c->prepare($sql);
		$q->execute();
		return $q->fetch()['precio'];
	}



}





