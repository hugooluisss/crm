<?php /* Smarty version Smarty-3.1.11, created on 2016-04-29 09:03:39
         compiled from "templates/plantillas/modulos/pedidos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11138470015722e0d0279921-59801053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f94fded656dc413f8357fa5beedc039000400d5' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/panel.tpl',
      1 => 1461937729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11138470015722e0d0279921-59801053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5722e0d030cb09_06204249',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5722e0d030cb09_06204249')) {function content_5722e0d030cb09_06204249($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pedidos</h1>
	</div>
</div>

<div class="panel">
	<div class="panel-body">
		<table id="tblPedidos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Cantidad</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>