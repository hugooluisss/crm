<?php
define('SISTEMA', 'CVentas');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');

#Login y su controlador	
$conf['inicio'] = array(
	'vista' => 'usuarios/login.tpl',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');
	
$conf['registrate'] = array(
	'controlador' => 'registro.php',
	'vista' => 'usuarios/registroInicio.tpl',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array(),
	'jsTemplate' => array('registro.js'),
	'capa' => 'layout/login.tpl');

$conf['cregistro'] = array(
	'controlador' => 'registro.php',
	'descripcion' => 'Registro',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);

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
	'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array("venta.class.js"),
	'jsTemplate' => array("index.js"),
	'capa' => LAYOUT_DEFECTO);

$conf['panelPrincipal_JSON'] = $conf['panelPrincipal'];
$conf['panelPrincipal_JSON']['seguridad'] = false;
$conf['panelPrincipal_JSON']['capa'] = LAYOUT_JSON;

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
	
$conf['perfil'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/perfil.tpl',
	'descripcion' => 'Perfil de usuario',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('perfil.js'),
	'capa' => LAYOUT_DEFECTO);

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
	
/*Categorias*/
$conf['categorias'] = array(
	'controlador' => 'categorias.php',
	'vista' => 'categorias/panel.tpl',
	'descripcion' => 'Administración de categorias',
	'seguridad' => true,
	'js' => array('categoria.class.js'),
	'jsTemplate' => array('categorias.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaCategorias'] = array(
	'controlador' => 'categorias.php',
	'vista' => 'categorias/lista.tpl',
	'descripcion' => 'Lista de categorias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccategorias'] = array(
	'controlador' => 'categorias.php',
	'descripcion' => 'Controlador de categorias',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
/*Productos*/
$conf['productos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/panel.tpl',
	'descripcion' => 'Administración de productos',
	'seguridad' => true,
	'js' => array('producto.class.js'),
	'jsTemplate' => array('productos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaProductos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/lista.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cproductos'] = array(
	'controlador' => 'productos.php',
	'descripcion' => 'Controlador de productos',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
/*Productos*/
$conf['ventas'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/panel.tpl',
	'descripcion' => 'Administración de ventas',
	'seguridad' => true,
	'js' => array('venta.class.js', 'pago.class.js'),
	'jsTemplate' => array('ventas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaVentas'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/lista.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cventas'] = array(
	'controlador' => 'ventas.php',
	'descripcion' => 'Controlador de ventas',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['clientesVenta'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'ventas/listaClientes.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['productosVenta'] = array(
	'controlador' => 'productos.php',
	'vista' => 'ventas/listaProductos.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaMovimientosVenta'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/listaMovimientos.tpl',
	'descripcion' => 'Lista de movimientos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Pagos */
$conf['listaPagos'] = array(
	'controlador' => 'pagos.php',
	'vista' => 'pagos/lista.tpl',
	'descripcion' => 'Lista de pagos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpagos'] = array(
	'controlador' => 'pagos.php',
	'descripcion' => 'Controlador de pagos',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
/*Empresas*/
$conf['empresas'] = array(
	'controlador' => 'empresa.php',
	'vista' => 'empresa/empresas.tpl',
	'descripcion' => 'Administración de empresas',
	'seguridad' => true,
	'js' => array('empresa.class.js'),
	'jsTemplate' => array('administracion.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaEmpresas'] = array(
	'controlador' => 'empresa.php',
	'vista' => 'empresa/listaEmpresas.tpl',
	'descripcion' => 'Lista de empresas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Usuarios Administracion*/
$conf['usuariosAdmon'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
/* Suscripciones */
$conf['suscripciones'] = array(
	'controlador' => 'suscripciones.php',
	'vista' => 'suscripciones/panel.tpl',
	'descripcion' => 'Administración de suscripciones',
	'seguridad' => true,
	'js' => array('suscripcion.class.js'),
	'jsTemplate' => array('suscripciones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['planes'] = array(
	'controlador' => 'suscripciones.php',
	'vista' => 'usuarios/planes.tpl',
	'descripcion' => 'Compra de suscripción',
	'seguridad' => false,
	'jsTemplate' => array('planes.js'),
	'capa' => 'layout/login.tpl');

$conf['listaSuscripciones'] = array(
	'controlador' => 'suscripciones.php',
	'vista' => 'suscripciones/lista.tpl',
	'descripcion' => 'Lista de categorias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['csuscripciones'] = array(
	'controlador' => 'suscripciones.php',
	'descripcion' => 'Controlador de suscripciones',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
/* Pedidos */
$conf['pedidos'] = array(
	'controlador' => 'pedidos.php',
	'vista' => 'pedidos/panel.tpl',
	'descripcion' => 'Administración de pedidos',
	'seguridad' => true,
	'jsTemplate' => array('pedidos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['pedidos_json'] = $conf['pedidos'];
$conf['pedidos_json']['capa'] = LAYOUT_JSON;
$conf['pedidos_json']['seguridad'] = false;
	
$conf['success'] = array(
	'controlador' => 'suscripciones.php',
	'vista' => 'usuarios/compraOk.tpl',
	'descripcion' => 'Despues de realizar una compra',
	'seguridad' => true,
	#'jsTemplate' => array('pedidos.js'),
	'capa' => 'layout/login.tpl');
	
	
$conf['estadoCuenta'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/listaEstadoCuenta.tpl',
	'descripcion' => 'Estado de cuenta del cliente',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['ticket'] = array(
	'controlador' => 'ventas.php',
	'descripcion' => 'Impresión del ticket',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);