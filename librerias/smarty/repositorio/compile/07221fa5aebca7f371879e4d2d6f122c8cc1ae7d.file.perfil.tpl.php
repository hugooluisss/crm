<?php /* Smarty version Smarty-3.1.11, created on 2016-05-02 13:49:24
         compiled from "templates/plantillas/modulos/usuarios/perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12513159705721627d697386-74614863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07221fa5aebca7f371879e4d2d6f122c8cc1ae7d' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/perfil.tpl',
      1 => 1461849259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12513159705721627d697386-74614863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5721627d7015f0_56005567',
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5721627d7015f0_56005567')) {function content_5721627d7015f0_56005567($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de usuarios</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="form-group">
		<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
		<div class="col-sm-5">
			<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
"/>
		</div>
	</div>
	<div class="form-group">
		<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-5">
			<input type="text" id="txtApellidos" name="txtApellidos" class="form-control" autocomplete="false" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
"/>
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="txtEmail" class="col-sm-2 control-label">Email *</label>
		<div class="col-sm-8">
			<input type="text" id="txtEmail" name="txtEmail" autofocus="true" class="form-control" autocomplete="false" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['email'];?>
"/>
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
	<input type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['idUsuario'];?>
"/>
	<input type="hidden" id="perfil" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['idPerfil'];?>
"/>
</form><?php }} ?>