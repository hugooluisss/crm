<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaPagos':
		$db = TBase::conectaDB();
		global $userSesion;
		$objVenta = new TVenta($_POST['venta']);
		$rs = $db->Execute("select * from pago where idVenta = ".$_POST['venta']);
		$datos = array();
		$ventas = $objVenta->getMontoVenta();
		while(!$rs->EOF){
			$ventas -= $rs->fields['monto'];
			$rs->fields['saldo'] = sprintf("%.2f", $ventas);
			
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("saldo", sprintf("%.2f", $objVenta->getSaldo()));
	break;
	case 'cpagos':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TPago($_POST['id']);
				$obj->setVenta($_POST['venta']);
				$obj->setFecha($_POST['fecha']);
				$obj->setMonto($_POST['monto']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TPago($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'sendComprobante':
				$obj = new TPago($_POST['id']);
				$objVenta = new TVenta($obj->getVenta());
				$usuario = new TUsuario($_POST['usuario'] == ''?$userSesion->getId():$_POST['usuario']);
				
				$email = new TMail;
				
				$datos = array();
				$email->setTema("Gracias por su pago");
				$email->setDestino($objVenta->cliente->getEmail(), utf8_decode($objVenta->cliente->getNombre()));
				
				$datos = array();
				$datos['cliente.nombre'] = $objVenta->cliente->getNombre();
				$datos['empresa.correo'] = $usuario->getEmail();
				$datos['empresa.nombre'] = $usuario->empresa->getRazonSocial();
				$datos['empresa.direccion'] = $usuario->empresa->getDireccion();
				$datos['usuario.nombre'] = $usuario->getNombre();
				
				
				$datos['pago.fecha'] = $obj->getFecha();
				$datos['pago.monto'] = sprintf("%.2f", $obj->getMonto());
				$datos['pago.saldo'] = sprintf("%.2f", $objVenta->getSaldo());
				
				$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/email/pagos.html"), $datos)));
				
				$email->addImg("repositorio/email/images/facebook.png", "facebook", "facebook.png");
				$email->addImg("repositorio/email/images/line.png", "line", "line.png");
				
				echo json_encode(array("band" => $email->send(), "email" => $objVenta->cliente->getEmail()));
			break;
			case 'pagos':
				$db = TBase::conectaDB();
				
				$objVenta = new TVenta($_POST['venta']);
				$rs = $db->Execute("select * from pago where idVenta = ".$_POST['venta']);
				$datos = array();
				$ventas = $objVenta->getMontoVenta();
				while(!$rs->EOF){
					$ventas -= $rs->fields['monto'];
					$rs->fields['saldo'] = sprintf("%.2f", $ventas);
					
					array_push($datos, $rs->fields);
					
					$rs->moveNext();
				}
				
				echo json_encode(array("pagos" => $datos, "saldo" => sprintf("%.2f", $objVenta->getSaldo())));
			break;
		}
	break;
}
?>