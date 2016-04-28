<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 10:51:14
         compiled from "templates/plantillas/modulos/empresa/listaEmpresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186631554557221ab3e6d6d4-54814510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b4cc9e13a9913304682b884a03153b949c0b789' => 
    array (
      0 => 'templates/plantillas/modulos/empresa/listaEmpresas.tpl',
      1 => 1461858608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186631554557221ab3e6d6d4-54814510',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57221ab3e95c26_02572385',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57221ab3e95c26_02572385')) {function content_57221ab3e95c26_02572385($_smarty_tpl) {?><div class="box">
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
							<a href="?mod=suscripciones&val=<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
" class="btn btn-default"><i class="fa fa-shopping-bag"></i></a>
							<a href="?mod=usuariosAdmon&val=<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
" class="btn btn-default"><i class="fa fa-users"></i></a>

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