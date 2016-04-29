<?php
global $objModulo;

switch($objModulo->getId()){
	case 'panelPrincipal':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select count(*) as total from cliente where idEmpresa = ".$userSesion->empresa->getId());
		$smarty->assign("totalClientes", $rs->fields['total']);
		
		#ventas con saldo pendiente
		$rs = $db->Execute("select idVenta from venta a join cliente b using(idCliente) where extract(year from fecha) = ".date("Y")." and idEmpresa = ".$userSesion->empresa->getId());
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
		
		#entregados
		$rs = $db->Execute("select count(*) as pedidos from venta a join cliente b using(idCliente) where entregados = 0 and idEmpresa = ".$userSesion->empresa->getId());
		
		$smarty->assign("ventasPedidos", $rs->fields['pedidos'] == ''?0:$rs->fields['pedidos']);
	break;
}
?>