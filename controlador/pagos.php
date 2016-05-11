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