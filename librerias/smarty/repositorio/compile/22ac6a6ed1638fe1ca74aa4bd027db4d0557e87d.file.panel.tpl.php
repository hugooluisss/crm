<?php /* Smarty version Smarty-3.1.11, created on 2016-04-25 22:50:09
         compiled from "templates/plantillas/modulos/productos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344293715571ee4a60049e1-31892909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22ac6a6ed1638fe1ca74aa4bd027db4d0557e87d' => 
    array (
      0 => 'templates/plantillas/modulos/productos/panel.tpl',
      1 => 1461642608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344293715571ee4a60049e1-31892909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571ee4a60d2951_26378729',
  'variables' => 
  array (
    'tipos' => 0,
    'row' => 0,
    'categorias' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571ee4a60d2951_26378729')) {function content_571ee4a60d2951_26378729($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Productos</h1>
	</div>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#lista">Lista</a></li>
	<li><a data-toggle="tab" href="#add">Agregar o modificar</a></li>
</ul>
<div class="tab-content">
	<div id="lista" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtClave" class="col-sm-2 control-label">Clave *</label>
				<div class="col-sm-3">
					<input type="text" id="txtClave" name="txtClave" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="selTipo" class="col-sm-2 control-label">Tipo *</label>
				<div class="col-sm-2">
					<select id="selTipo" name="selTipo" class="form-control">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>

						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selCategoria" class="col-sm-2 control-label">Categoría *</label>
				<div class="col-sm-4">
					<select id="selCategoria" name="selCategoria" class="form-control">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>

						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
				<div class="col-sm-6">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
				<div class="col-sm-10">
					<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPrecio" class="col-sm-2 control-label">Precio *</label>
				<div class="col-sm-2">
					<input type="text" id="txtPrecio" name="txtPrecio" autofocus="true" class="form-control" autocomplete="false" value="0.00"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCosto" class="col-sm-2 control-label">Costo *</label>
				<div class="col-sm-2">
					<input type="text" id="txtCosto" name="txtCosto" autofocus="true" class="form-control" autocomplete="false" value="0.00" />
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
	</div>
</div><?php }} ?>