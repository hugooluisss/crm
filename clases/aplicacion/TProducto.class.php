<?php
/**
* TProducto
* Lista de productos
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TProducto{
	private $idProducto;
	private $idTipo;
	public $categoria;
	private $clave;
	private $nombre;
	private $descripcion;
	private $precio;
	private $costo;
	
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProducto($id = ''){
		$this->categoria = new TCategoria();
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
		$rs = $db->Execute("select * from producto where idProducto = ".$id);
		
		foreach($rs->fields as $field => $val)
			switch($field){
				case 'idCategoria':
					$this->categoria = new TCategoria($val);
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
		return $this->idProducto;
	}
	
	/**
	* Establece el tipo
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setTipo($val = 0){
		$this->idTipo = $val;
		return true;
	}
	
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return decimal Precio
	*/
	public function getTipo(){
		return $this->idTipo;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setClave($val = ''){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getClave(){
		return $this->clave;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece la descripcion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		return true;
	}
	
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
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
	* @return decimal Precio
	*/
	public function getPrecio(){
		return $this->precio;
	}
	
	/**
	* Establece el costo
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setCosto($val = 0){
		$this->costo = $val;
		return true;
	}
	
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return decimal Costo
	*/
	public function getCosto(){
		return $this->costo;
	}
	
	/**
	* Establece la categoria
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setCategoria($val = ''){
		$this->categoria = new TCategoria($val);
		return true;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->categoria->getId() == '') return false;
		if ($this->getTipo() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO producto(idCategoria, idTipo) VALUES (".$this->categoria->getId().", ".$this->getTipo().");
");
			$this->idProducto = $db->Insert_ID();
		}
		
		if ($this->idProducto == '') return false;
		
		$rs = $db->Execute("UPDATE producto
			SET
				idTipo = '".$this->getTipo()."',
				idCategoria = ".$this->categoria->getId().",
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				descripcion = '".$this->getDescripcion()."',
				precio = ".$this->getPrecio().",
				costo = ".$this->getPrecio()."
			WHERE idProducto = ".$this->getId());
			
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
		return $db->Execute("delete from producto where idProducto = ".$this->getId())?true:false;
	}
}
?>