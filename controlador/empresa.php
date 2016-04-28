<?php
global $objModulo;

switch($objModulo->getId()){
	case 'empresa':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select a.* from empresa a where idEmpresa = ".$userSesion->empresa->getId());
		
		$smarty->assign("datos", $rs->fields);
	break;
	case 'listaEmpresas':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from empresa");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'cempresa':
		switch($objModulo->getAction()){
			case 'guardar':
				global $userSesion;
				$obj = new TEmpresa($userSesion->empresa->getId());
				
				$obj->setRazonSocial($_POST['razonsocial']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setURL($_POST['sitio']);
				
				if($obj->guardar())
					echo json_encode(array("band" => true));
				else
					echo json_encode(array("band" => false));
			break;
			case 'del':
				$obj = new TEmpresa($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;

		}
	break;
}
?>