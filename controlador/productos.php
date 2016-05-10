<?php
global $objModulo;

switch($objModulo->getId()){
	case 'productos':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from categoria where idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while (!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("categorias", $datos);
		
		$rs = $db->Execute("select * from tipoproducto");
		$datos = array();
		while (!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("tipos", $datos);
	break;
	case 'listaProductos': case 'productosVenta':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select a.*, b.nombre as categoria, c.nombre as tipo from producto a join categoria b using(idCategoria) join tipoproducto c using(idTipo) where idEmpresa = ".$userSesion->empresa->getId());
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TProducto($_POST['id']);
				$obj->setTipo($_POST['tipo']);
				$obj->setCategoria($_POST['categoria']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setCosto($_POST['costo']);
				$obj->setPrecio($_POST['precio']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'validaCodigo':
				global $userSesion;
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idProducto from producto a join categoria b using(idCategoria) where clave = '".$_POST['txtClave']."' and idEmpresa = ".($_POST['empresa'] == ''?$userSesion->empresa->getId():$_POST['empresa'])." and not idProducto = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
			
			#App
			case 'getPanel':
				$db = TBase::conectaDB();
				global $userSesion;
				$rs = $db->Execute("select * from categoria where idEmpresa = ".$_POST['empresa']);
				$datos = array();
				while (!$rs->EOF){
					array_push($datos, $rs->fields);
					$rs->moveNext();
				}
				
				$rs = $db->Execute("select * from tipoproducto");
				$datos2 = array();
				while (!$rs->EOF){
					array_push($datos2, $rs->fields);
					$rs->moveNext();
				}
				
				echo json_encode(array("categorias" => $datos, "tipos" => $datos2));
			break;
			case 'lista':
				$db = TBase::conectaDB();

				$rs = $db->Execute("select a.*, b.nombre as categoria, c.nombre as tipo from producto a join categoria b using(idCategoria) join tipoproducto c using(idTipo) where idEmpresa = ".$_POST['empresa']);
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