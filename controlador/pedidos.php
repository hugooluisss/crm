<?php
global $objModulo;

switch($objModulo->getId()){
	case 'pedidos':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select a.*, c.*, sum(cantidad) as cantidad from venta a join cliente b using(idCliente) join movventa c using(idVenta) where idEmpresa = ".$userSesion->empresa->getId()." and entregados = 0 group by c.descripcion");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'success':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from suscripcion where codigo = '".$_GET['codigo']."'");
		
		if ($rs->EOF){
			$codigo = base64_decode($_GET['codigo']);
			$codigo = explode("|.|", $codigo);
			
			$suscripcion = new TSuscripcion;
			/*
			* 0: paquete
			* 1: empresa
			* 2: fecha
			*/
			$suscripcion->setEmpresa($codigo[1]);
			$suscripcion->setPaquete($codigo[0]);
			$suscripcion->setInicio(date("Y-m-d"));
			$suscripcion->setCodigo($_GET['codigo']);
			
			if ($suscripcion->guardar())
				echo '<script>location.href = "logout";</script>';
		}
		
		echo 'Ocurrió un error al guardar su suscripción';
	break;
};
?>