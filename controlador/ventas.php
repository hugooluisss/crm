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
		$objVenta = new TVenta($_POST['venta']);
		
		$datos = array();
		$precio = 0;
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			$precio +=  $rs->fields['precio'];
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("limiteCliente", sprintf("%.2f", $objVenta->cliente->getLimite()));
		$smarty->assign("saldoCliente", sprintf("%.2f", $objVenta->cliente->getSaldo()));
		$smarty->assign("sobrepaso", sprintf("%.2f", $objVenta->cliente->getSaldo() - $objVenta->cliente->getLimite()));
		$smarty->assign("total", sprintf("%.2f", $precio));
	break;
	case 'ticket':
		$venta = new TVenta($_GET['id']);
		$html = file_get_contents("repositorio/impresiones/ticket.html");

		$html = str_replace("#*empresa.razonsocial*#", $venta->usuario->empresa->getRazonSocial(), $html);
		$html = str_replace("#*empresa.direccion*#", $venta->usuario->empresa->getDireccion(), $html);
		$html = str_replace("#*venta.fecha*#", $venta->getFecha(), $html);
		$html = str_replace("#*venta.total*#", $venta->getMontoVenta(), $html);
		
		#*empresa.razonsocial*#
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idMovimiento from movventa where idVenta = ".$_GET['id']);
		$movimientos = "";
		while(!$rs->EOF){
			$mov = new TMovimiento($rs->fields['idMovimiento']);
			$plantillaMov = file_get_contents("repositorio/impresiones/detalleTicket.html");
			$plantillaMov = str_replace("#*item.codigo*#", $mov->getClave(), $plantillaMov);
			$plantillaMov = str_replace("#*item.descripcion*#", $mov->getDescripcion(), $plantillaMov);
			$plantillaMov = str_replace("#*item.cantidad*#", $mov->getCantidad(), $plantillaMov);
			$plantillaMov = str_replace("#*item.total*#", sprintf("%.2f", $mov->getPrecio() * $mov->getCantidad()), $plantillaMov);
			
			$movimientos .= $plantillaMov;
			
			$rs->moveNext();
		}
		
		$html = str_replace("#*venta.movimientos*#", $movimientos, $html);
		
		echo $html;
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
					$obj->setUsuario($_POST['usuario'] == ''?$userSesion->getId():$_POST['usuario']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'setEntregado':
				$obj = new TVenta($_POST['id']);
				$obj->setEntregados($_POST['estado']);

				if($obj->guardar())
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
				$obj->setPrecio($_POST['precio'] * $_POST['cantidad']);
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
			case 'historial':
				$db = TBase::conectaDB();
				global $userSesion;
				
				$inicio = $_POST['inicio'] == ''?date("Y-m-d", strtotime("-30 days", strtotime(date("Y-m-d")))):$_POST['inicio'];
				
				$rs = $db->Execute("select cast(fecha as date) as dia, sum(precio) as total from movventa a join venta b using(idVenta) join cliente c using(idCliente) where idEmpresa = ".($_POST['empresa'] == ''?$userSesion->empresa->getId():$_POST['empresa'])." and fecha >= '".$inicio." 00:00:00' group by dia");
				
				$datos = array();
				while(!$rs->EOF){
					array_push($datos, $rs->fields);
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
			
			#movil
			case 'ventas':
				$db = TBase::conectaDB();
				global $userSesion;
				$rs = $db->Execute("select a.*, b.* from venta a join cliente b using(idCliente) where idEmpresa = '".$_POST['empresa']."' group by idVenta");
				$datos = array();
				while(!$rs->EOF){
					$objVenta = new TVenta($rs->fields['idVenta']);
					$rs->fields['monto'] = sprintf("%.2f", $objVenta->getMontoVenta());
					$rs->fields['saldo'] = sprintf("%.2f", $rs->fields['monto'] - $objVenta->getMontoPagos());
					
					array_push($datos, $rs->fields);
					
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
			case 'movimientos':
				$db = TBase::conectaDB();
				global $userSesion;
				$rs = $db->Execute("select * from movventa where idVenta = ".$_POST['venta']);
				$datos = array();
				$precio = 0;
				$objVenta = new TVenta($_POST['venta']);
				while(!$rs->EOF){
					$precio +=  $rs->fields['precio'];
					array_push($datos, $rs->fields);
					
					$rs->moveNext();
				}
				
				echo json_encode(
					array(
						"movimientos" => $datos, 
						"total" => sprintf("%.2f", $precio), 
						"limiteCliente" => sprintf("%.2f", $objVenta->cliente->getLimite()), 
						"saldoCliente" => sprintf("%.2f", $objVenta->cliente->getSaldo()), 
						"sobrepaso" => sprintf("%.2f", $objVenta->cliente->getSaldo() - $objVenta->cliente->getLimite())));
			break;
		}
	break;
}
?>