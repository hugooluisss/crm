<?php
/**
* TSuscripcion
* Para el control de la publicidad de los abogados
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TSuscripcion{
	private $idSuscripcion;
	private $idPaquete;
	private $idEmpresa;
	private $registro;
	private $inicio;
	private $fin;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TSuscripcion($id = ''){
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
		$rs = $db->Execute("select * from suscripcion where idSuscripcion = ".$id);
		
		if ($rs->EOF) return false;
		
		foreach($rs->fields as $key => $val){
			$this->$key = $val;
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador
	*
	* @autor Hugo
	* @access public
	* @return integer Identificador
	*/
	
	public function getId(){
		return $this->idSuscripcion;
	}

	/**
	* Establece el paquete
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPaquete($val = 0){
		$this->paquete = $val;
		return true;
	}
	
	/**
	* Retorna el paquete
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	
	public function getPaquete(){
		return $this->idPaquete;
	}
	
	/**
	* Establece la empresa
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmpresa($val = 0){
		$this->empresa = $val;
		return true;
	}
	
	/**
	* Retorna la empresa
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	
	public function getEmpresa(){
		return $this->empresa;
	}
	
	/**
	* Establece la fecha de inicio
	*
	* @autor Hugo
	* @access public
	* @param date $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setInicio($val = ''){
		$this->inicio = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de inicio
	*
	* @autor Hugo
	* @access public
	* @return date Fecha
	*/
	
	public function getInicio(){
		return $this->inicio;
	}
	
	/**
	* Establece la fecha de fin
	*
	* @autor Hugo
	* @access public
	* @param date $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFin($val = ''){
		$this->fin = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de fin
	*
	* @autor Hugo
	* @access public
	* @return date Fecha
	*/
	
	public function getFin(){
		return $this->fin;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getEmpresa() == '') return false;
		if ($this->getPaquete() == '') return false;
		if ($this->getInicio() == '') return false;
		if ($this->getFin() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO suscripcion(idEmpresa, idPaquete, registro) VALUES(".$this->getEmpresa().", ".$this->getPaquete().", now());");
			if (!$rs) return false;
			
			$this->idSuscripcion = $db->Insert_ID();
		}		
		
		if ($this->idSuscripcion == '')
			return false;
		
		$rs = $db->Execute("UPDATE suscripcion
			SET
				inicio = '".$this->getInicio()."',
				fin = '".$this->getFin()."'
			WHERE idSuscripcion = ".$this->getId());
			
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
		$rs = $db->Execute("delete from publicidad where idPublicidad = ".$this->getId());
		
		return $rs?true:false;
	}
}