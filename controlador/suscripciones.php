<?php
global $objModulo;

switch($objModulo->getId()){
	case 'suscripciones':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select a.* from paquete a where publico like 'S'");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("paquetes", $datos);
		$smarty->assign("empresa", new TEmpresa($_GET['val']));
	break;
	case 'listaSuscripciones':
		$db = TBase::conectaDB();
		
		$empresa = ($_POST['empresa'] == '')?$pageSesion->empresa->getId():$_POST['empresa'];
		
		$rs = $db->Execute("select * from suscripcion a join paquete b using(idPaquete) where idEmpresa = ".$empresa);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'planes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from paquete where publico = 'S'");
		$datos = array();
		while(!$rs->EOF){
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
	case 'csuscripciones':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TSuscripcion($_POST['id']);
				
				if ($_POST['empresa'] <> '')
					$obj->setEmpresa($_POST['empresa']);
				
				$obj->setInicio($_POST['inicio']);
				$obj->setPaquete($_POST['paquete']);
				
				if($obj->guardar())
					echo json_encode(array("band" => true, "id" => $obj->getId()));
				else
					echo json_encode(array("band" => false));
			break;
			case 'del':
				$obj = new TSuscripcion($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}