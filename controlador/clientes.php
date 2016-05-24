<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaClientes': case 'clientesVenta':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from cliente where estado = 'A' and idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'estadoCuenta':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select idVenta, sum(precio) as monto, a.fecha from venta a join movventa b using(idVenta) left join pago c using(idVenta) where idCliente = ".$_POST['cliente']." group by idVenta;");
		$datos = array();
		$venta = new TVenta;
		$cliente = new TCliente($_POST['cliente']);
		$saldo = 0;
		while(!$rs->EOF){
			$venta->setId($rs->fields['idVenta']);
			$rs->fields['saldo'] = $venta->getSaldo();
			$rs->fields['json']	= json_encode($rs->fields);
			
			if ($rs->fields['saldo'] > 0){
				array_push($datos, $rs->fields);
				$saldo += $rs->fields['saldo'];
			}
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("saldo", sprintf("%.2f", $saldo));
		$smarty->assign("limite", sprintf("%.2f", $cliente->getLimite()));
		$smarty->assign("cliente", $cliente->getNombre());
	break;
	case 'cclientes':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TCliente($_POST['id']);
				global $userSesion;
				$obj->setNombre($_POST['nombre']);
				$obj->setSexo($_POST['sexo']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setEmail($_POST['email']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setComentarios($_POST['comentarios']);
				$obj->setLimite($_POST['limite']);
				$obj->empresa->setId($_POST['empresa'] == ''?$userSesion->empresa->getId():$_POST['empresa']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => true, "id" => $obj->getId()));
				else
					echo json_encode(array("band" => false));
			break;
			case 'del':
				$obj = new TCliente($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => true));
				else
					echo json_encode(array("band" => false));
			break;
			case 'lista':
				$db = TBase::conectaDB();
				global $userSesion;
				$rs = $db->Execute("select * from cliente where estado = 'A' and idEmpresa = ".$_POST['empresa']);
				$datos = array();
				while(!$rs->EOF){
					array_push($datos, $rs->fields);
					
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
		}
	break;
}
?>