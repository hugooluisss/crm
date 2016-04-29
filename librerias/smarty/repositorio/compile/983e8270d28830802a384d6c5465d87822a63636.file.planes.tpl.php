<?php /* Smarty version Smarty-3.1.11, created on 2016-04-29 00:11:14
         compiled from "templates/plantillas/modulos/usuarios/planes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14938808065722e81edbe1f1-14177347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983e8270d28830802a384d6c5465d87822a63636' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/planes.tpl',
      1 => 1461906660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14938808065722e81edbe1f1-14177347',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5722e81ee0a3f5_70294000',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5722e81ee0a3f5_70294000')) {function content_5722e81ee0a3f5_70294000($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Planes de suscripción</h1>
	</div>
</div>

<div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-md-3">
			<div class="jumbotron">
				<div class="container">
					<h1><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</h1>
					<p><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</p>
					
					

					
					<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="add" value="1">
						<input type="hidden" name="business" value="hugooluisss@gmail.com">
						<input type="hidden" name="item_name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
">
						<input type="hidden" name="item_number" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPaquete'];?>
">
						<input type="hidden" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
">
						<input type="hidden" name="shipping" value="0">
						<input type="hidden" name="shipping2" value="0">
						<input type="hidden" name="handling" value="0 ">
						<input type="hidden" name="currency_code" value="MXN">
						<input type="hidden" name="return" value="">
						<input type="hidden" name="undefined_quantity" value="1">
						<input type="image" src="http://www.paypalobjects.com/es_XC/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Realice pagos con PayPal: es rápido, gratis y seguro.">
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<script>
	paypal.minicart.render();
</script><?php }} ?>