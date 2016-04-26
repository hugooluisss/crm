<?php
/**
* TMovimiento
* Movimientos de ventas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TMovimiento{
	private $idMovimiento;
	private $idVenta;
	private $clave;
	private $descripcion
	private $cantidad;
	private $precio;
	private $descuento;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TMovimiento($id = ''){
		$this->venta = new TVenta();
		
		$this->setId($id);
		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realiz� sin problemas
	*/
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from movventa where idMovimiento = ".$id);
		
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
		return $this->idMovimiento;
	}
	
	/**
	* Establece la venta
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setVenta($val = ''){
		$this->idVenta = $val;
		
		return true;
	}
	
	/**
	* Retorna la venta
	*
	* @autor Hugo
	* @access public
	* @return integer El identificador de la venta
	*/
	public function getVenta(){
		return $this->venta;
	}
	
	/**
	* Establece la clave del producto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setClave($val = ''){
		$this->clave = $val;
		
		return true;
	}
	
	/**
	* Retorna la clave del producto
	*
	* @autor Hugo
	* @access public
	* @return integer Clave del producto
	*/
	public function getClave(){
		return $this->clave;
	}
	
	/**
	* Establece la descripcion del producto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		
		return true;
	}
	
	/**
	* Retorna la descripci�n del art�culo
	*
	* @autor Hugo
	* @access public
	* @return integer El identificador del producto
	*/
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece la cantidad
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setCantidad($val = 1){
		$this->cantidad = $val;
		
		return true;
	}
	
	/**
	* Retorna la cantidad
	*
	* @autor Hugo
	* @access public
	* @return integer La cantidad del producto
	*/
	public function getCantidad(){
		return $this->cantidad;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setPrecio($val = 0){
		$this->precio = $val;
		
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return decimal Precio del producto
	*/
	public function getPrecio(){
		return $this->precio;
	}
	
	/**
	* Establece el descuento
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realiz� sin problemas
	*/
	public function setDescuento($val = 0){
		$this->descuento = $val;
		
		return true;
	}
	
	/**
	* Retorna la descuento
	*
	* @autor Hugo
	* @access public
	* @return integer La cantidad del producto
	*/
	public function getDescuento(){
		return $this->descuento;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realiz� sin problemas
	*/
	public function guardar(){
		if ($this->cliente->getId() == '') return false;
		
		if ($this->usuario->getId() == ''){
			global $userSesion;
			$this->setUsuario($userSesion->getId());
		}
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO movventa(idVenta) VALUES (".$this->getVenta().")");
			$this->idVenta = $db->Insert_ID();
		}
		
		if ($this->idVenta == '') return false;
		
		$rs = $db->Execute("UPDATE movventa
			SET
				clave = '".$this->getClave()."',
				descripcion = '".$this->getDescripcion()."',
				cantidad = ".$this->getCantidad().",
				precio = ".$this->getPrecio().",
				descuento = ".$this->getDescuento()."
			WHERE idMovimiento = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realiz� sin problemas
	*/
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("delete from venta where idVenta = ".$this->getId())?true:false;
	}
}
?>