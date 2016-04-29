<?php /* Smarty version Smarty-3.1.11, created on 2016-04-28 15:40:00
         compiled from "templates/plantillas/modulos/suscripciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304016841572232e395f611-17641680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c480f8e086030debaccb6504466f1f07e93ce94' => 
    array (
      0 => 'templates/plantillas/modulos/suscripciones/panel.tpl',
      1 => 1461870445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304016841572232e395f611-17641680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_572232e3985955_95066436',
  'variables' => 
  array (
    'empresa' => 0,
    'paquetes' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572232e3985955_95066436')) {function content_572232e3985955_95066436($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/crm/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Suscripciones</h1>
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
				<label for="txtNombre" class="col-sm-2 control-label">Paquete *</label>
				<div class="col-sm-6">
					<select id="selPaquete" name="selPaquete" class="form-control">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paquetes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPaquete'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>

						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtFecha" class="col-sm-2 control-label">Fecha *</label>
				<div class="col-sm-2">
					<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
" placeholder="Y-m-d"/>
					<div id="datepicker"></div>
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