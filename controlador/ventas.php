<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaVentas':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select a.*, b.* from venta a join cliente b using(idCliente) where idEmpresa = ".$userSesion->empresa->getId()." group by idVenta");
		$datos = array();
		while(!$rs->EOF){
			$objVenta = new TVenta($rs->fields['idVenta']);
			$rs->fields['monto'] = sprintf("%.2f", $objVenta->getMontoVenta());
			$rs->fields['saldo'] = sprintf("%.2f", $rs->fields['monto'] - $objVenta->getMontoPagos());
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
		$precio = 0;
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			$precio +=  $rs->fields['precio'];
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("total", sprintf("%.2f", $precio));
	break;
	case 'cventas':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TVenta($_POST['id']);
				global $userSesion;
				$obj->setFecha($_POST['fecha']);
				$obj->setCliente($_POST['cliente']);
				$obj->setPagos($_POST['pagos']);
				
				if ($_POST['id'] == '')
					$obj->setUsuario($userSesion->getId());
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'addMovimiento':
				$obj = new TMovimiento($_POST['id']);
				
				$obj->setVenta($_POST['venta']);
				$obj->setClave($_POST['clave']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setCantidad($_POST['cantidad']);
				$obj->setPrecio($_POST['precio']);
				$obj->setDescuento($_POST['descuento']);
				
				if ($obj->guardar() == true)
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'del':
				$obj = new TVenta($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'delMovimiento':
				$obj = new TMovimiento($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>