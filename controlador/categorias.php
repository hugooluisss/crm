<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaCategorias':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from categoria where idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'ccategorias':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TCategoria($_POST['id']);
				global $userSesion;
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				if ($_POST['id'] == '')
					$obj->empresa->setId($_POST['empresa'] == ''?$userSesion->empresa->getId():$_POST['empresa']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TCategoria($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			
			#movil
			case 'lista':
				$db = TBase::conectaDB();
				
				$rs = $db->Execute("select * from categoria where idEmpresa = ".$_POST['empresa']);
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