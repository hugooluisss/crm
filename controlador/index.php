<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal': case 'panelPrincipal_JSON':
		$db = TBase::conectaDB();
		
		if ($_POST['empresa'] == ''){
			global $userSesion;
			$empresa = $userSesion->empresa->getId();
		}else
			$empresa = $_POST['empresa'];
		
		$rs = $db->Execute("select count(*) as total from cliente where idEmpresa = ".$empresa);
		$smarty->assign("totalClientes", $rs->fields['total']);
		
		$json = array();
		$json['totalClientes'] = $rs->fields['total'];
		
		#ventas con saldo pendiente
		$rs = $db->Execute("select idVenta from venta a join cliente b using(idCliente) where extract(year from fecha) = ".date("Y")." and idEmpresa = ".$empresa);
		$datos = array();
		$ventas = 0;
		$pagos = 0;
		while(!$rs->EOF){
			$objVenta = new TVenta($rs->fields['idVenta']);
			$ventas += $objVenta->getMontoVenta();
			$pagos += $objVenta->getMontoPagos();
				
			$rs->moveNext();
		}
		
		$smarty->assign("montoVentas", sprintf("%.2f", $ventas));
		$smarty->assign("pagosVentas", sprintf("%.2f", $pagos));
		$smarty->assign("saldoVentas", sprintf("%.2f", $ventas - $pagos));
		$json['montoVentas'] = sprintf("%.2f", $ventas);
		$json['pagosVentas'] = sprintf("%.2f", $pagos);
		$json['saldoVentas'] = sprintf("%.2f", $ventas - $pagos);
		$json['anio'] = date("Y");
		#entregados
		$rs = $db->Execute("select count(*) as pedidos from venta a join cliente b using(idCliente) where entregados = 0 and idEmpresa = ".$empresa);
		
		$smarty->assign("ventasPedidos", $rs->fields['pedidos'] == ''?0:$rs->fields['pedidos']);
		$json['ventasPedidos'] = $rs->fields['pedidos'] == ''?0:$rs->fields['pedidos'];
		
		$smarty->assign("dataJSON", json_encode($json));
	break;
}
?>