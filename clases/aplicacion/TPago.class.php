<?php
/**
* TPago
* Pagos a ventas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TPago{
	private $idPago;
	private $fecha;
	private $idVenta;
	private $monto;
	
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPago($id = ''){
		$this->setId($id);
		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from pago where idPago = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/**
	* Retorna el identificador
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	public function getId(){
		return $this->idPago;
	}
	
	/**
	* Establece el identificador de la venta
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setVenta($val = ''){
		$this->idVenta = $val;
		return true;
	}
	
	/**
	* Retorna el identificador de la venta
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getVenta(){
		return $this->idVenta;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setFecha($val = ''){
		$this->fecha = $val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getFecha(){
		return $this->fecha == ''?date("Y-m-d H:s:i"):$this->fecha;
	}
	
	/**
	* Establece el monto
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setMonto($val = 0){
		$this->monto = $val;
		return true;
	}
	
	/**
	* Retorna el monto
	*
	* @autor Hugo
	* @access public
	* @return int Monto
	*/
	public function getMonto(){
		return $this->monto;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->getVenta() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO pago(idVenta, fecha) VALUES (".$this->getVenta().", now());");
			$this->idPago = $db->Insert_ID();
		}
		
		if ($this->idPago == '') return false;
		
		$rs = $db->Execute("UPDATE pago
			SET
				fecha = '".$this->getFecha()."',
				monto = '".$this->getMonto()."'
			WHERE idPago = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("delete from pago where idPago = ".$this->getId())?true:false;
	}
}