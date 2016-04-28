<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 12:11:49
         compiled from "templates/plantillas/modulos/suscripciones/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20604320405722347be4ea38-94741313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b749594a7e1d09ddb7d2f793bbf9685815c2dedf' => 
    array (
      0 => 'templates/plantillas/modulos/suscripciones/lista.tpl',
      1 => 1461863507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20604320405722347be4ea38-94741313',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5722347beb10a5_29511297',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5722347beb10a5_29511297')) {function content_5722347beb10a5_29511297($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblSuscripciones" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Inicio</th>
					<th>Fin</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idSuscripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" suscripcion="<?php echo $_smarty_tpl->tpl_vars['row']->value['idSuscripcion'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>