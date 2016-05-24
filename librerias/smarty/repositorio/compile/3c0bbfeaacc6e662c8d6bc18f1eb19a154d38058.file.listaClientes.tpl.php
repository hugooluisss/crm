<?php /* Smarty version Smarty-3.1.11, created on 2016-05-23 22:15:16
         compiled from "templates/plantillas/modulos/ventas/listaClientes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1718506044571feca0f2a909-49824896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c0bbfeaacc6e662c8d6bc18f1eb19a154d38058' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/listaClientes.tpl',
      1 => 1463460939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1718506044571feca0f2a909-49824896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571feca1083329_99068789',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571feca1083329_99068789')) {function content_571feca1083329_99068789($_smarty_tpl) {?><table id="tblClientes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
			<td class="text-right">
				<button type="button" class="btn btn-default" action="seleccionar" title="Seleccionar" cliente='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
					<i class="fa fa-hand-pointer-o"></i>
				</button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>