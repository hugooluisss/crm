<?php
global $objModulo;

switch($objModulo->getId()){
	case 'pedidos': case 'pedidos_json':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select a.*, c.*, sum(cantidad) as cantidad from venta a join cliente b using(idCliente) join movventa c using(idVenta) where idEmpresa = ".($_POST['empresa'] == ''?$userSesion->empresa->getId():$_POST['empresa'])." and entregados = 0 group by c.descripcion");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		
		$smarty->assign("dataJSON", json_encode($datos));
	break;
};
?>