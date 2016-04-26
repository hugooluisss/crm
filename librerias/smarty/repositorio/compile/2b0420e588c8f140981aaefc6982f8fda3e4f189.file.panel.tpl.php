<?php /* Smarty version Smarty-3.1.11, created on 2016-04-26 10:51:59
         compiled from "templates/plantillas/modulos/clientes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154227726571bbc638fb000-58656233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b0420e588c8f140981aaefc6982f8fda3e4f189' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/panel.tpl',
      1 => 1461598044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154227726571bbc638fb000-58656233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571bbc6395b201_88570572',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571bbc6395b201_88570572')) {function content_571bbc6395b201_88570572($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Clientes</h1>
	</div>
</div>

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
				<label for="txtNombre" class="col-sm-2 control-label">Nombre completo *</label>
				<div class="col-sm-6">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-sm-2 control-label">Teléfono</label>
				<div class="col-sm-3">
					<input type="text" id="txtTelefono" name="txtTelefono" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="selSexo" class="col-sm-2 control-label">Sexo</label>
				<div class="col-sm-2">
					<select id="selSexo" name="selSexo" class="form-control">
						<option value="H">Hombre
						<option value="M">Mujer
					</select>
				</div>
			</div>
			<br />
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-4">
					<input type="text" id="txtEmail" name="txtEmail" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-10">
					<textarea id="txtDireccion" name="txtDireccion" class="form-control"></textarea>
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
	</div>
</div><?php }} ?>