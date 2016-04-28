<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 09:14:57
         compiled from "templates/plantillas/modulos/empresa/empresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65676004257221a9a0a4953-09047632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f576a0e7126e71177f6efb2d7a6bd4150a6053b9' => 
    array (
      0 => 'templates/plantillas/modulos/empresa/empresas.tpl',
      1 => 1461852894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65676004257221a9a0a4953-09047632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57221a9a0bfb71_45101770',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57221a9a0bfb71_45101770')) {function content_57221a9a0bfb71_45101770($_smarty_tpl) {?><div class="row">
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
				<label for="txtNombre" class="col-sm-2 control-label">Razón social *</label>
				<div class="col-sm-6">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="txtDireccion" name="txtDireccion"></textarea>
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
			<input type="hidden" id="id"/>
		</form>
	</div>
</div><?php }} ?>