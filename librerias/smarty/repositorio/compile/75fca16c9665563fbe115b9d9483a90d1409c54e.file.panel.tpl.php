<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 10:40:44
         compiled from "templates/plantillas/modulos/usuarios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6808161235719b2337d7254-01207621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75fca16c9665563fbe115b9d9483a90d1409c54e' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panel.tpl',
      1 => 1461858042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6808161235719b2337d7254-01207621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5719b233812c97_16287239',
  'variables' => 
  array (
    'empresa' => 0,
    'perfiles' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5719b233812c97_16287239')) {function content_5719b233812c97_16287239($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de usuarios</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getRazonSocial();?>

	</div>
	<div class="col-lg-6 text-right">
		<div class="btn-group">
			<a href="empresas" class="btn btn-primary">Ir a empresas</a>
		</div>
	</div>
</div>

<br />
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#lista">Registrados</a></li>
	<li><a data-toggle="tab" href="#add">Agregar o modificar</a></li>
</ul>
<div class="tab-content">
	<div id="lista" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="selPerfil" class="col-sm-2 control-label">Perfil</label>
				<div class="col-sm-2">
					<select id="selPerfil" name="selPerfil" class="form-control">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['perfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPerfil'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>

						<?php } ?>
					</select>
				</div>
			</div>
			<br />
			<div class="form-group">
				<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
				<div class="col-sm-5">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
				<div class="col-sm-5">
					<input type="text" id="txtApellidos" name="txtApellidos" class="form-control" autocomplete="false" />
				</div>
			</div>
			<br />
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2 control-label">Email *</label>
				<div class="col-sm-8">
					<input type="text" id="txtEmail" name="txtEmail" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass1" class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-3">
					<input type="password" id="txtPass1" name="txtPass1" class="form-control" autocomplete="false" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="txtPass2" class="col-sm-2 control-label">Confirmar</label>
				<div class="col-sm-3">
					<input type="password" id="txtPass2" name="txtPass2" class="form-control" autocomplete="false" />
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
			<input type="hidden" id="empresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getId();?>
"/>
		</form>
	</div>
</div><?php }} ?>