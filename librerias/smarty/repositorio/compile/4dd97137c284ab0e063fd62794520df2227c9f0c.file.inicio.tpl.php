<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 13:09:48
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99655443357199ad1110de4-06602645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1461866986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99655443357199ad1110de4-06602645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57199ad1114915_23261678',
  'variables' => 
  array (
    'totalClientes' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57199ad1114915_23261678')) {function content_57199ad1114915_23261678($_smarty_tpl) {?><div class="row">
	<div class="col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2><i class="fa fa-users" aria-hidden="true"></i> Clientes</h2>
			</div>
			<div class="panel-body">
				Tienes un total de <?php echo $_smarty_tpl->tpl_vars['totalClientes']->value;?>
 clientes registrados en la plataforma
			</div>
			<div class="panel-footer text-right">
				<a href="clientes" class="btn">Ir a clientes</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><i class="fa fa-money" aria-hidden="true"></i> Total de ventas</h2>
			</div>
			<div class="panel-body">
				<canvas id="cnvVentas" width="300" style="width: 300"></canvas>
			</div>
		</div>
	</div>
</div><?php }} ?>