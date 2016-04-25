<?php
/**
* TPerfil
* Perfil de usuarios
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TPerfil{
	private $idPerfil;
	private $nombre;
	private $descripcion;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPerfil($id = ''){
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
		$rs = $db->Execute("select * from perfil where idPerfil = ".$id);
		
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
	* Retorna el identificador del perfil
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	public function getId(){
		return $this->idPerfil;
	}
	
	/**
	* Retorna a el nombre del perfil
	*
	* @autor Hugo
	* @access public
	* @return string Retorna el nombre
	*/
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Retorna la descripción
	*
	* @autor Hugo
	* @access public
	* @return string Retorna la descripcion
	*/
	public function getDescripcion(){
		return $this->descripcion;
	}
}