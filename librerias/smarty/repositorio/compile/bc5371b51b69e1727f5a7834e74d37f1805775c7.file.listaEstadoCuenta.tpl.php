<?php /* Smarty version Smarty-3.1.11, created on 2016-05-25 20:50:54
         compiled from "templates/plantillas/modulos/clientes/listaEstadoCuenta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1062990699573cb393590c65-01963395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc5371b51b69e1727f5a7834e74d37f1805775c7' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/listaEstadoCuenta.tpl',
      1 => 1464202958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1062990699573cb393590c65-01963395',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_573cb39361e672_40414451',
  'variables' => 
  array (
    'cliente' => 0,
    'limite' => 0,
    'saldo' => 0,
    'objCliente' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573cb39361e672_40414451')) {function content_573cb39361e672_40414451($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<div class="alert alert-info" role="alert">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<b>Cliente: </b> <?php echo $_smarty_tpl->tpl_vars['cliente']->value;?>
<br />
					<b>Límite de crédito: </b> <span class="warning"><?php if ($_smarty_tpl->tpl_vars['limite']->value>0){?><?php echo $_smarty_tpl->tpl_vars['limite']->value;?>
<?php }else{ ?>---<?php }?></span><br />
					<b>Saldo deudor: </b> <span class="error"><?php echo $_smarty_tpl->tpl_vars['saldo']->value;?>
</span><br />
				</div>
				<?php if ($_smarty_tpl->tpl_vars['objCliente']->value->getEmail()!=''){?>
				<div class="col-sm-4 text-right">
					<input type="button" id="btnSendEstadoCuenta" value="Enviar por correo" class="btn btn-danger" cliente="<?php echo $_smarty_tpl->tpl_vars['objCliente']->value->getId();?>
"/>
				</div>
				<?php }?>
			</div>
		</div>
		<table id="tblEstado" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Monto</th>
					<th>Saldo</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idVenta'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['saldo'];?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>