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
			"WHERE productos_idproductos=".$cod_prod." AND tiendas_idtiendas=".$cod_tienda;
		$q = $this->c->prepare($sql);
		$q->execute();
		return $q->fetch()['stock'];
	}

	public function getFamilias(){
		$sql = "SELECT idfamilias,nombre FROM familias";
		$q = $this->c->prepare($sql);
		$q->execute();
		return $q->fetchAll();
	}

	public function getProductosFamilia($cod_familia){
		$sql = "SELECT idproductos, nombre, precio ".
			"FROM productos WHERE familias_idfamilias = ".$cod_familia;
		$q = $this->c->prepare($sql);
		$q->execute();
		return $q->fetchAll();
	}





}





