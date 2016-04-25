<?php
define('SISTEMA', 'CRM');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');

#Login y su controlador	
$conf['inicio'] = array(
	'vista' => 'usuarios/login.tpl',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
#Login y su controlador	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);

$conf['panelPrincipal'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

$conf['usuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);

/*Mi empresa*/
$conf['empresa'] = array(
	'controlador' => 'empresa.php',
	'vista' => 'empresa/panel.tpl',
	'descripcion' => 'Datos de la empresa',
	'seguridad' => true,
	'js' => array('empresa.class.js'),
	'jsTemplate' => array('empresa.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cempresa'] = array(
	'controlador' => 'empresa.php',
	'descripcion' => 'Controlador de datos generales de la empresa',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);

/*Clientes*/
$conf['clientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/panel.tpl',
	'descripcion' => 'Administración de clientes',
	'seguridad' => true,
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('clientes.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaClientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/lista.tpl',
	'descripcion' => 'Lista de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cclientes'] = array(
	'controlador' => 'clientes.php',
	'descripcion' => 'Controlador de clientes',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);