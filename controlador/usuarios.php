<?php
global $objModulo;

switch($objModulo->getId()){
	case 'usuarios':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select a.* from perfil a where publico like '".($userSesion->perfil->getId() == 3?"%":"S")."'");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("perfiles", $datos);
	break;
	case 'usuariosAdmon':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select a.* from perfil a where publico like 'S'");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("perfiles", $datos);
		$smarty->assign("empresa", new TEmpresa($_GET['val']));
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		
		$empresa = ($_POST['empresa'] == '')?$pageSesion->empresa->getId():$_POST['empresa'];
		
		$rs = $db->Execute("select a.*, b.nombre as perfil from usuario a join perfil b using(idPerfil) where idEmpresa = ".$empresa);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'perfil':
		global $userSesion;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select a.* from usuario a where idUsuario = ".$userSesion->getId());
		
		$smarty->assign("usuario", $rs->fields);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TUsuario($_POST['id']);
				
				if ($_POST['empresa'] <> '')
					$obj->setEmpresa($_POST['empresa']);
				
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