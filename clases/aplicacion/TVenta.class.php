<?php
/**
* TVenta
* Ventas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TVenta{
	private $idVenta;
	public $cliente;
	public $usuario;
	private $fecha;
	private $entregados;
	private $pagos;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TVenta($id = ''){
		$this->empresa = new TEmpresa();
		$this->usuario = new TUsuario();
		
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
		$rs = $db->Execute("select * from venta where idVenta = ".$id);
		
		foreach($rs->fields as $field => $val)
			switch($field){
				case 'idCliente':
					$this->cliente = new TCliente($val);
				break;
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				default:
					$this->$field = $val;
			}
		
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
		return $this->idVenta;
	}
	
	/**
	* Establece el cliente
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setCliente($val = ''){
		$this->cliente = new TCliente($val);
		
		return true;
	}
	
	/**
	* Establece el usuario
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setUsuario($val = ''){
		$this->usuario = new TUsuario($val);
		
		return true;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
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
		return $this->fecha;
	}
	
	/**
	* Establece si los productos ya fueron entregados
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function setEntregados($val = 0){
		$this->entregados = $val;
		
		return true;
	}
	
	/**
	* Retorna true si fueron entregados
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getEntregados(){
		return $this->entregados == 1;
	}
	
	/**
	* Establece el número de pagos
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setPagos($val = 1){
		$this->pagos = $val;
		
		return true;
	}
	
	/**
	* Retorna el número de pagos
	*
	* @autor Hugo
	* @access public
	* @return integer Pagos
	*/
	public function getPagos(){
		return $this->pagos;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->cliente->getId() == '') return false;
		
		if ($this->usuario->getId() == ''){
			global $userSesion;
			$this->setUsuario($userSesion->getId());
		}
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO venta(idUsuario, idCliente, fecha) VALUES (".$this->usuario->getId().", ".$this->cliente->getId().", now())");
			
			$this->idVenta = $db->Insert_ID();
		}
		
		if ($this->idVenta == '') return false;

		$rs = $db->Execute("UPDATE venta
			SET
				idCliente = ".$this->cliente->getId().",
				fecha = '".$this->getFecha()."',
				pagos = ".$this->getPagos().",
				entregados = ".($this->getEntregados()?1:0)."
			WHERE idVenta = ".$this->getId());
			
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
		return $db->Execute("delete from venta where idVenta = ".$this->getId())?true:false;
	}
	
	/**
	* Retorna el saldo de la venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getSaldo(){
		if ($this->getId() == '') return false;
		
		return $this->getMontoVenta() - $this->getMontoPagos();
	}
	
	/**
	* Retorna el total de pagos
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getMontoPagos(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rsPagos = $db->Execute("select sum(monto) as monto from pago where idVenta = ".$this->getId());
		
		return $rsPagos->fields['monto'];
	}
	
	/**
	* Retorna el monto total de la venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getMontoVenta(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rsCompra = $db->Execute("select sum(precio) as monto from movventa where idVenta = ".$this->getId());
		
		return $rsCompra->fields['monto'];
	}
}
?>