<?php

/**
 * RaspberryAPI class
 * 
 * Clase para implementar SOAP. 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class RaspberryAPI extends SoapClient {

  private static $classmap = array(
                                   );

  public function RaspberryAPI($wsdl = "/media/STORAGE/www/DAW/DWES/SOAP/taller/serviciow.wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * Obtiene el id del articulo para devolver su precio. 
   *
   * @param string $cod_prod
   * @return string
   */
  public function getPVP($cod_prod) {
    return $this->__soapCall('getPVP', array($cod_prod),       array(
            'uri' => 'piserver.dyndns.org',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene el código de producto y el código de tienda y devuelve el stock de dicho
   
   *              artículo en dicha tienda. 
   *
   * @param string $cod_prod
   * @param string $cod_tienda
   * @return string
   */
  public function getStock($cod_prod, $cod_tienda) {
    return $this->__soapCall('getStock', array($cod_prod, $cod_tienda),       array(
            'uri' => 'piserver.dyndns.org',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve un listado de todas las famílias. 
   *
   * @param  
   * @return stringArrayArray
   */
  public function getFamilias() {
    return $this->__soapCall('getFamilias', array(),       array(
            'uri' => 'piserver.dyndns.org',
            'soapaction' => ''
           )
      );
  }

  /**
   * Obtiene el código de una família y muestra todos los artículo de ésta. 
   *
   * @param string $cod_familia
   * @return stringArrayArray
   */
  public function getProductosFamilia($cod_familia) {
    return $this->__soapCall('getProductosFamilia', array($cod_familia),       array(
            'uri' => 'piserver.dyndns.org',
            'soapaction' => ''
           )
      );
  }

}

?>
