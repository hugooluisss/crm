<?php
/**
* TUsuario
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TUsuario{
	private $idUsuario;
	public $empresa;
	public $perfil;
	private $email;
	private $pass;
	private $ultimoacceso;
	private $nombres;
	private $apellidos;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TUsuario($id = ''){
		$this->perfil = new TPerfil();
		$this->empresa = new TEmpresa();
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
		$rs = $db->Execute("select * from usuario where idUsuario = ".$id);
		
		if ($rs->EOF) return false;
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'pass':
					$this->pass = '';
				break;
				case 'idPerfil':
					$this->perfil = new TPerfil($val);
				break;
				case 'idEmpresa':
					$this->empresa = new TEmpresa($val);
				break;
				default:
					$this->$key = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	public function getId(){
		return $this->idUsuario;
	}
	
	/**
	* Establece el valor de tipo de usuario
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 3 que hace referencia a un cliente
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPerfil($val = ''){
		$this->perfil->setId($val);
		
		return true;
	}
	
	/**
	* Establece la empresa a la que pertenecerá
	*
	* @autor Hugo
	* @access public
	* @param string $val 
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmpresa($val = ''){
		$this->empresa->setId($val);
		
		return true;
	}
	
	/**
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email o nombre de usuario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Guarda la fecha del ultimo login
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUltimoAcceso($val = ''){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("update usuario set ultimoacceso = now() where idUsuario = ".$this->getId());
		return true;
	}
	
	/**
	* Retorna la fecha en la que inició sesión por última vez
	*
	* @autor Hugo
	* @access public
	* @return string timestamp
	*/
	
	public function getUltimoAcceso(){
		return $this->ultimoacceso;
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
		$this->nombres = $val;
		
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Nombre
	*/
	
	public function getNombre(){
		return $this->nombres;
	}
	
	/**
	* Establece los apellidos
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApellidos($val = ''){
		$this->apellidos = $val;
		
		return true;
	}
	
	/**
	* Retorna los apellidos
	*
	* @autor Hugo
	* @access public
	* @return string Nombre
	*/
	
	public function getApellidos(){
		return $this->apellidos;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->perfil->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO usuario(idPerfil, idEmpresa) VALUES(".$this->perfil->getId().", ".$this->empresa->getId().");");
			if (!$rs) return false;
			
			$this->idUsuario = $db->Insert_ID();
		}		
		
		if ($this->idUsuario == '')
			return false;
		
		$rs = $db->Execute("UPDATE usuario
			SET
				idPerfil = ".$this->perfil->getId().",
				email = '".$this->getEmail()."',
				nombres = '".$this->getNombre()."',
				apellidos = '".$this->getApellidos()."'
			WHERE idUsuario = ".$this->idUsuario);
			
		return $rs?true:false;
	}
	
	/**
	* Guarda la contraseña
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPass($pass = ''){
		if ($this->getId() == '') return false;
		if ($pass == '') return false;
		
		$db = TBase::conectaDB();
				
		$rs = $db->Execute("UPDATE usuario
			SET
				pass = md5('".$pass."')
			WHERE idUsuario = ".$this->idUsuario);
			
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
		$rs = $db->Execute("delete from usuario where idUsuario = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>