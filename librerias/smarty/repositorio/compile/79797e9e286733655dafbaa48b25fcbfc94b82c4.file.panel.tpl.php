<?php /* Smarty version Smarty-3.1.11, created on 2016-04-25 21:35:18
         compiled from "templates/plantillas/modulos/categorias/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936116381571e6530c33045-34973772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79797e9e286733655dafbaa48b25fcbfc94b82c4' => 
    array (
      0 => 'templates/plantillas/modulos/categorias/panel.tpl',
      1 => 1461611294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936116381571e6530c33045-34973772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_571e6530c4eb92_91200542',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e6530c4eb92_91200542')) {function content_571e6530c4eb92_91200542($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Categorias</h1>
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