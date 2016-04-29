<?php
/**
* TEmpresa
* Empresa del usuario
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TEmpresa{
	public $idEmpresa;
	private $razonsocial;
	private $direccion;
	private $url;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TEmpresa($id = ''){
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
		$rs = $db->Execute("select * from empresa where idEmpresa = ".$id);
		
		if ($rs->EOF) return false;
		
		foreach($rs->fields as $key => $val){
			switch($key){
				default:
					$this->$key = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador
	*
	* @autor Hugo
	* @access public
	* @return string Retorna el valor del campo
	*/
	public function getId(){
		if ($this->idEmpresa <> '')
			return $this->idEmpresa;
		else{
			global $pageSesion;
			
			
			return $pageSesion->empresa->idEmpresa;
		}
	}
	
	/**
	* Establece la razón social
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si lo hizo
	*/
	public function setRazonSocial($val = ''){
		return $this->razonsocial = $val;
	}
	
	/**
	* Retorna el nombre del perfil
	*
	* @autor Hugo
	* @access public
	* @return string Retorna el valor del campo
	*/
	public function getRazonSocial(){
		return $this->razonsocial;
	}
	
	/**
	* Establece la Dirección
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si lo hizo
	*/
	public function setDireccion($val = ''){
		return $this->direccion = $val;
	}
	
	/**
	* Retorna la dirección
	*
	* @autor Hugo
	* @access public
	* @return string Retorna el valor del campo
	*/
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece la dirección del sitio web
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si lo hizo
	*/
	public function setURL($val = ''){
		return $this->url = $val;
	}
	
	/**
	* Retorna la dirección del sitio web
	*
	* @autor Hugo
	* @access public
	* @return string Retorna el valor del campo
	*/
	public function getURL(){
		return $this->url;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO empresa(razonsocial) VALUES('');");
			if (!$rs) return false;
			
			$this->idEmpresa = $db->Insert_ID();
		}		
		
		if ($this->idEmpresa == '')
			return false;
		
		$rs = $db->Execute("UPDATE empresa
			SET
				razonsocial = '".$this->getRazonSocial()."',
				direccion = '".$this->getDireccion()."',
				url = '".$this->getURL()."'
			WHERE idEmpresa = ".$this->idEmpresa);
			
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
		$rs = $db->Execute("delete from empresa where idEmpresa = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Indica si la empresa esta suscripta
	*
	* @autor Hugo
	* @access public
	* @return boolean True Si es que si lo está
	*/
	
	public function isSuscripto(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from suscripcion where idEmpresa = ".$this->getId()." and now() between inicio and fin");
		
		return !$rs->EOF?true:false;
	}
}