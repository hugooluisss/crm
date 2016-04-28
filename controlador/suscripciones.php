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