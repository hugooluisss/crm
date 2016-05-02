<?php
global $objModulo;

switch($objModulo->getId()){
	case 'cregistro':
		switch($objModulo->getAction()){
			case 'guardar':
				$empresa = new TEmpresa;
				$empresa->setRazonSocial($_POST['empresa']);
				if ($empresa->guardar()){
					$usuario = new TUsuario;
					
					$usuario->setNombre($_POST['nombre']);
					$usuario->setApellidos($_POST['apellidos']);
					$usuario->setEmail($_POST['email']);
					$usuario->setEmpresa($empresa->getId());
					$usuario->setPerfil(1);
					
					if ($usuario->guardar()){
						$band = $usuario->setPass($_POST['pass']);
						
						if ($band){
							$obj = new TSuscripcion();
							$obj->setInicio(date("Y-m-d"));
							$obj->setEmpresa($empresa->getId());
							$obj->setPaquete(1);
							
							$band = $obj->guardar();
						}
					}else{
						$empresa->eliminar();
						$band = false;
					}
				}else
					$band = false;
			
				echo json_encode(array("band" => $band));
			break;
		}
	break;
}
