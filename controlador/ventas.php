<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaVentas':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from venta a join cliente b using(idCliente) where idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'listaMovimientosVenta':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from movventa where idVenta = ".$_POST['venta']);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'cventas':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TVenta($_POST['id']);
				global $userSesion;
				$obj->setFecha($_POST['fecha']);
				$obj->setCliente($_POST['cliente']);
				$obj->setPagos($_POST['cliente']);
				
				if ($_POST['id'] == '')
					$obj->setUsuario($userSesion->getId());
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'del':
				$obj = new TCategoria($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>