<?php /* Smarty version Smarty-3.1.11, created on 2016-05-23 23:06:07
         compiled from "templates/plantillas/modulos/ventas/listaMovimientos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5815182065721082ea7ab54-82375234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c31a150d8438f2f9725f8d86193067d4003e397' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/listaMovimientos.tpl',
      1 => 1464062760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5815182065721082ea7ab54-82375234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5721082ebde8a3_59452974',
  'variables' => 
  array (
    'saldoCliente' => 0,
    'limiteCliente' => 0,
    'sobrepaso' => 0,
    'lista' => 0,
    'row' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5721082ebde8a3_59452974')) {function content_5721082ebde8a3_59452974($_smarty_tpl) {?><div class="alert alert-info">
	El cliente debe $ <?php echo $_smarty_tpl->tpl_vars['saldoCliente']->value;?>
, <?php if ($_smarty_tpl->tpl_vars['limiteCliente']->value>0){?> el límite de crédito es de <?php echo $_smarty_tpl->tpl_vars['limiteCliente']->value;?>
<?php }?>. 
	<?php if ($_smarty_tpl->tpl_vars['saldoCliente']->value>=$_smarty_tpl->tpl_vars['limiteCliente']->value&&$_smarty_tpl->tpl_vars['limiteCliente']->value>0){?>
		<span class="error">Sobrepasó su límite de crédito por <?php echo $_smarty_tpl->tpl_vars['sobrepaso']->value;?>
</span>
	<?php }?>
</div>
<table id="tblMovimientos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Descripción</th>
			<th>Cant</th>
			<th>Precio</th>
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
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
			<td class="text-right">
				<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" movimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
"><i class="fa fa-times"></i></button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-sm-offset-8 col-sm-4">
		<div class="alert alert-warning text-right">
			<strong>Total</strong> $ <?php echo $_smarty_tpl->tpl_vars['total']->value;?>

		</div>
	</div>
</div><?php }} ?>