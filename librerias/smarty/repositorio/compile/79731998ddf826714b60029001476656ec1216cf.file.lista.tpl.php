<?php /* Smarty version Smarty-3.1.11, created on 2016-10-14 08:21:56
         compiled from "templates/plantillas/modulos/ventas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1498483102571feaaf549016-23257186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79731998ddf826714b60029001476656ec1216cf' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/lista.tpl',
      1 => 1476451313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1498483102571feaaf549016-23257186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571feaaf5c1863_12431685',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571feaaf5c1863_12431685')) {function content_571feaaf5c1863_12431685($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblVentas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>No Pagos</th>
					<th>Monto</th>
					<th>Saldo</th>
					<th>¿Entregados?</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pagos'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['saldo'];?>
</td>
						<td class="text-right">
							<select class="entregados form-control" venta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
">
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['entregados']==1){?>selected<?php }?>>Si</option>
								<option value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['entregados']==0){?>selected<?php }?>>No</option>
							</select>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-warning" action="imprimir" title="Imprimir ticket" venta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
"><i class="fa fa-print"></i></button>
							<button type="button" class="btn btn-success" action="pagos" title="Pagos" venta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
"><i class="fa fa-money"></i></button>
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" venta="<?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>