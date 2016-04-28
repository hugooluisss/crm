<?php /* Smarty version Smarty-3.1.11, created on 2016-04-27 23:49:56
         compiled from "templates/plantillas/modulos/empresa/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1997997979571b84c354f4f3-62026618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec205d93c80b6722601fe526a6e7fd10db277bd3' => 
    array (
      0 => 'templates/plantillas/modulos/empresa/panel.tpl',
      1 => 1461611294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1997997979571b84c354f4f3-62026618',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571b84c3551762_78312258',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571b84c3551762_78312258')) {function content_571b84c3551762_78312258($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Mi empresa</h1>
	</div>
</div>

<div class="box fondoBlanco">
	<div class="box-body">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtNombre" class="col-sm-2 control-label">Razón social / Nombre *</label>
				<div class="col-sm-5">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['razonsocial'];?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="txtDireccion" name="txtDireccion"><?php echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];?>
</textarea>
				</div>
			</div>
			<br />
			<div class="form-group">
				<label for="txtPagina" class="col-sm-2 control-label">Sitio en internet</label>
				<div class="col-sm-5">
					<input type="text" id="txtPagina" name="txtPagina" autofocus="true" class="form-control" autocomplete="false" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['url'];?>
"/>
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
		</form>
	</div>
</div><?php }} ?>