<?php
global $objModulo;

switch($objModulo->getId()){
	case 'usuarios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select a.* from perfil a");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("perfiles", $datos);
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as perfil from usuario a join perfil b using(idPerfil) where idEmpresa = ".$pageSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TUsuario($_POST['id']);
				
				$obj->setPerfil($_POST['perfil']);
				$obj->setEmail($_POST['email']);
				$obj->setNombre($_POST['nombre']);
				$obj->setApellidos($_POST['apellidos']);
				
				if($obj->guardar())
					echo json_encode(array("band" => true, "id" => $obj->getId()));
				else
					echo json_encode(array("band" => false));
			break;
			case 'setPass':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->setPass($_POST['pass'])));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaEmail':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idUsuario from usuario where email = '".$_POST['txtEmail']."'");
				if ($_POST['usuario'] == '')
					echo $rs->EOF?"true":"false";
				elseif ($rs->EOF)
					echo "true";
				else
					echo $rs->fields['idUsuario'] == $_POST['usuario']?"true":"false";

			break;

		}
	break;
}
?>