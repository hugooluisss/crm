<?php
global $objModulo;

switch($objModulo->getId()){
	case 'logout':
		unset($_SESSION['usuario']);
		session_destroy();
		
		header('Location: index.php');
	break;
	default:
		switch($objModulo->getAction()){
			case 'login': case 'validarCredenciales':
				$db = TBase::conectaDB();
				
				$rs = $db->Execute("select idUsuario, pass from usuario where upper(email) = upper('".$_POST['usuario']."')");
				
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				
				if($rs->EOF)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe'); 
				elseif($rs->fields['pass'] <> md5($_POST['pass']))
					$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
				else{
					$obj = new TUsuario($rs->fields['idUsuario']);
					if ($obj->getId() == '')
						$result = array('band' => false, 'mensaje' => 'Acceso denegado');
					else
						$result = array('band' => true);
				}
					
				
				if($result['band']){
					if ($_POST['movil'] <> 1){
						$obj = new TUsuario($rs->fields['idUsuario']);
						$sesion['usuario'] = 		$obj->getId();
						$_SESSION[SISTEMA] = $sesion;
					}else{
						$data = array();
						$data['identificador'] = $obj->getId();
						$result["datos"] = $data;
					}
					
				}
				
				echo json_encode($result);
			break;
			case 'logout':
				$_SESSION[SISTEMA] = array();
				session_destroy();
				
				header ("Location: index.php");
			break;
		}
	break;
}
?>