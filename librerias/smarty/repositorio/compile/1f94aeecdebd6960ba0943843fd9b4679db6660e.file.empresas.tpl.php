<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 09:05:19
         compiled from "templates/plantillas/modulos/administracion/empresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11540123225722186b225bd1-15039028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f94aeecdebd6960ba0943843fd9b4679db6660e' => 
    array (
      0 => 'templates/plantillas/modulos/administracion/empresas.tpl',
      1 => 1461852315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11540123225722186b225bd1-15039028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5722186b2415d5_31792896',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5722186b2415d5_31792896')) {function content_5722186b2415d5_31792896($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas</h1>
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
				<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
				<div class="col-sm-6">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-sm-2 control-label">Descripción</label>
				<div class="col-sm-3">
					<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
	</div>
</div><?php }} ?>