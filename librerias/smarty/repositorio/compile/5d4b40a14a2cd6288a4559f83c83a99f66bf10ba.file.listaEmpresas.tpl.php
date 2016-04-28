<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 09:11:13
         compiled from "templates/plantillas/modulos/administracion/listaEmpresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77191746457221942238f48-58740539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d4b40a14a2cd6288a4559f83c83a99f66bf10ba' => 
    array (
      0 => 'templates/plantillas/modulos/administracion/listaEmpresas.tpl',
      1 => 1461852666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77191746457221942238f48-58740539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5722194225fe05_44873629',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5722194225fe05_44873629')) {function content_5722194225fe05_44873629($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblEmpresas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Razón Social</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" empresa="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>