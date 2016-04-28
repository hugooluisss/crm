<?php
global $objModulo;

switch($objModulo->getId()){
	case 'panelPrincipal':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$rs = $db->Execute("select count(*) as total from cliente where idEmpresa = ".$userSesion->empresa->getId());
		$smarty->assign("totalClientes", $rs->fields['total']);
	break;
}
?>