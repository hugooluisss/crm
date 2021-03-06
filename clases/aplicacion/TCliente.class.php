<?php
class TCliente{
	private $idCliente;
	private $nombre;
	private $sexo;
	private $telefono;
	private $email;
	private $direccion;
	private $estado;
	public $empresa;
	private $limite;
	
	public function TCliente($id = ''){
		$this->empresa = new TEmpresa();
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from cliente where idCliente = ".$id);
		
		foreach($rs->fields as $field => $val)
			switch($field){
				case 'idEmpresa':
					$this->empresa = new TEmpresa($val);
				break;
				default:
					$this->$field = $val;
			}
		
		return true;
	}
	
	public function getId(){
		return $this->idCliente;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setSexo($val = ''){
		$this->sexo = $val;
		return true;
	}
	
	public function getSexo(){
		return $this->sexo;
	}
	
	public function setTelefono($val = ''){
		$this->telefono = $val;
		return true;
	}
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	public function setComentarios($val = ''){
		$this->comentarios = $val;
		return true;
	}
	
	public function getComentarios(){
		return $this->comentarios;
	}
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	public function getEstado(){
		return $this->estado;
	}
	
	public function setLimite($val = 0){
		$this->limite = $val;
		return true;
	}
	
	public function getLimite(){
		return $this->limite == ''?0:$this->limite;
	}
	
	public function guardar(){
		if ($this->empresa->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO cliente(idEmpresa, estado) VALUES (".$this->empresa->getId().", 'A');
");
			$this->idCliente = $db->Insert_ID();
		}
		
		if ($this->idCliente == '') return false;
		
		$rs = $db->Execute("UPDATE cliente
			SET
				nombre = '".$this->getNombre()."',
				sexo = '".$this->getSexo()."',
				telefono = '".$this->getTelefono()."',
				email = '".$this->getEmail()."',
				direccion = '".$this->getDireccion()."',
				limite = ".$this->getLimite()."
			WHERE idCliente = ".$this->getId());
			
		return $rs?true:false;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("update cliente set estado = 'E' where idCliente = ".$this->getId())?true:false;
	}
	
	public function getSaldo(){
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select idVenta, sum(precio) as monto, a.fecha from venta a join movventa b using(idVenta) left join pago c using(idVenta) where idCliente = ".$this->getId()." group by idVenta;");
		$datos = array();
		$venta = new TVenta;
		$saldo = 0;
		while(!$rs->EOF){
			$venta->setId($rs->fields['idVenta']);
			$rs->fields['saldo'] = $venta->getSaldo();
			$rs->fields['json']	= json_encode($rs->fields);
			
			if ($rs->fields['saldo'] > 0){
				array_push($datos, $rs->fields);
				$saldo += $rs->fields['saldo'];
			}
			
			$rs->moveNext();
		}
		
		return $saldo;
	}
}
?>