<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaClientes':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from cliente where estado = 'A' and idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'cclientes':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TCliente($_POST['id']);
				global $userSesion;
				$obj->setNombre($_POST['nombre']);
				$obj->setSexo($_POST['sexo']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setEmail($_POST['email']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setComentarios($_POST['comentarios']);
				$obj->empresa->setId($userSesion->empresa->getId());
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TCliente($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>