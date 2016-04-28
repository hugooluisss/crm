<?php /* Smarty version Smarty-3.1.11, created on 2016-04-27 22:09:31
         compiled from "templates/plantillas/modulos/pagos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156832120057217557bbb703-70270644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84ac97159975e6f6372db424c88fd376bf43deff' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/lista.tpl',
      1 => 1461812954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156832120057217557bbb703-70270644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57217557c29f88_71639168',
  'variables' => 
  array (
    'saldo' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57217557c29f88_71639168')) {function content_57217557c29f88_71639168($_smarty_tpl) {?><input type="hidden" id="saldo" value="<?php echo $_smarty_tpl->tpl_vars['saldo']->value;?>
" />

<table id="tblPagos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Abono</th>
			<th>Saldo</th>
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
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['saldo'];?>
</td>
			<td class="text-right">
				<button type="button" class="btn btn-danger" action="eliminarPago" title="Eliminar" pago='<?php echo $_smarty_tpl->tpl_vars['row']->value['idPago'];?>
'><i class="fa fa-times"></i></button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>