<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 23:41:50
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99655443357199ad1110de4-06602645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1461904909,
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
    'montoVentas' => 0,
    'pagosVentas' => 0,
    'saldoVentas' => 0,
    'ventasPedidos' => 0,
    'totalClientes' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57199ad1114915_23261678')) {function content_57199ad1114915_23261678($_smarty_tpl) {?><div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><i class="fa fa-money" aria-hidden="true"></i> Total de ventas</h2>
			</div>
			<div class="panel-body" id="chart_div">
			</div>
			<div class="panel-footer text-right">
				<a href="ventas" class="btn">Ir a ventas</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2><i class="fa fa-cc" aria-hidden="true"></i> Mi economía</h2>
			</div>
			<div class="panel-body">
				En este <?php echo date("Y");?>
 has vendido <b>$<?php echo $_smarty_tpl->tpl_vars['montoVentas']->value;?>
</b> de lo cual has recuparado <b>$<?php echo $_smarty_tpl->tpl_vars['pagosVentas']->value;?>
</b>, Intenta recuperar <b>$<?php echo $_smarty_tpl->tpl_vars['saldoVentas']->value;?>
</b>
			</div>
			<div class="panel-footer text-right">
				<a href="ventas" class="btn">Ir a ventas</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2><i class="fa fa-check" aria-hidden="true"></i> Pedidos sin entregar</h2>
			</div>
			<div class="panel-body">
				<?php if ($_smarty_tpl->tpl_vars['ventasPedidos']->value==0){?>
					Todos los artículos ya fueron entregado
				<?php }else{ ?>
					Tienes <?php echo $_smarty_tpl->tpl_vars['ventasPedidos']->value;?>
 ventas sin entregar
				<?php }?>
			</div>
			<div class="panel-footer text-right">
				<a href="pedidos" class="btn">Ir a pedidos</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-warning">
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
</div>

<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="add" value="1">
<input type="hidden" name="business" value="">
<input type="hidden" name="item_name" value="Baseball Hat">
<input type="hidden" name="item_number" value="123">
<input type="hidden" name="amount" value="5.95">
<input type="hidden" name="shipping" value="1.00">
<input type="hidden" name="shipping2" value="0.50">
<input type="hidden" name="handling" value="2.00 ">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="">
<input type="hidden" name="undefined_quantity" value="1">
<input type="image" src="http://www.paypalobjects.com/es_XC/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Realice pagos con PayPal: es rápido, gratis y seguro.">
</form><?php }} ?>