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
		$rs = $db->Execute("select idVenta, a.fecha from venta a where idCliente = ".$_POST['cliente'].";");
		$datos = array();
		$venta = new TVenta;
		$cliente = new TCliente($_POST['cliente']);
		$saldo = 0;
		while(!$rs->EOF){
			$venta->setId($rs->fields['idVenta']);
			$rs->fields['saldo'] = sprintf("%0.2f", $venta->getSaldo());
			$rs->fields['monto'] = sprintf("%0.2f", $venta->getMontoVenta());
			$rs->fields['pago'] = sprintf("%0.2f", $venta->getMontoPagos());
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
		$smarty->assign("objCliente", $cliente);
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
			case 'enviarEstadoCuenta':
				$db = TBase::conectaDB();
				global $userSesion;
				$cliente = new TCliente($_POST['id']);
				$usuario = new TUsuario($_POST['usuario'] == ''?$userSesion->getId():$_POST['usuario']);
				$email = new TMail;
				$email->setTema("Estado de cuenta");
				$email->setDestino($cliente->getEmail(), utf8_decode($cliente->getNombre()));
				
				$datos = array();
				$datos['cliente.nombre'] = $cliente->getNombre();
				$datos['empresa.correo'] = $usuario->getEmail();
				$datos['empresa.nombre'] = $usuario->empresa->getRazonSocial();
				$datos['empresa.direccion'] = $usuario->empresa->getDireccion();
				$datos['usuario.nombre'] = $usuario->getNombre();
				
				$ventas = '<table style="width: 100%; border: solid 1px #69C374;"><tr style="color: #69C374"><th>Fecha</th><th>Monto</th><th>Saldo</th></tr>';
				
				$db = TBase::conectaDB();
				global $userSesion;
				$rs = $db->Execute("select idVenta, sum(precio) as monto, cast(a.fecha as date) as fecha from venta a join movventa b using(idVenta) left join pago c using(idVenta) where idCliente = ".$_POST['id']." group by idVenta;");
				$datos2 = array();
				$venta = new TVenta;
				$cliente = new TCliente($_POST['cliente']);
				$saldo = 0;
				while(!$rs->EOF){
					$venta->setId($rs->fields['idVenta']);
					$rs->fields['saldo'] = sprintf("%0.2f", $venta->getSaldo());
					
					if ($rs->fields['saldo'] > 0){
						array_push($datos2, $rs->fields);
						$saldo += $rs->fields['saldo'];
						
						$ventas .= '<tr><td>'.$rs->fields['fecha'].'</td><td style="text-align: right">'.sprintf("%.2f", $rs->fields['monto']).'</td><td style="text-align: right">'.sprintf("%.2f", $rs->fields['saldo']).'</td></tr>';
					}
					
					$rs->moveNext();
				}
				
				$ventas .= '</table>';
				
				$datos['ventas'] = $ventas;
				$datos['saldo'] = sprintf("%.2f", $saldo);
				
				$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/email/estadoCuenta.html"), $datos)));
				//$email->adjuntar($documento);
				
				$email->addImg("repositorio/email/images/facebook.png", "facebook", "facebook.png");
				$email->addImg("repositorio/email/images/line.png", "line", "line.png");
				
				echo json_encode(array("band" => $email->send(), "email" => $cliente->getEmail()));
			break;
		}
	break;
}
?>