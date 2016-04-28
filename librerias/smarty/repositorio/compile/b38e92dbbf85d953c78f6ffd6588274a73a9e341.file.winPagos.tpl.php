<?php /* Smarty version Smarty-3.1.11, created on 2016-04-27 21:40:10
         compiled from "templates/plantillas/modulos/pagos/winPagos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140369213557216fb3f40772-47878010%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b38e92dbbf85d953c78f6ffd6588274a73a9e341' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/winPagos.tpl',
      1 => 1461811209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140369213557216fb3f40772-47878010',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57216fb40036f3_94237985',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57216fb40036f3_94237985')) {function content_57216fb40036f3_94237985($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/crm/librerias/smarty/plugins/modifier.date_format.php';
?><div class="modal fade" id="winPagos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Pagos</h1>
			</div>
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" id="frmAddPago" class="form-horizontal" onsubmit="javascript: return false;">
							<div class="form-group">
								<label for="txtFecha" class="col-sm-2 control-label">Fecha</label>
								<div class="col-sm-4">
									<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" placeholder="Fecha" value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
"/>
									<div id="datepicker"></div>
								</div>
								<label for="txtMonto" class="col-sm-2 control-label">Monto</label>
								<div class="col-sm-4">
									<input type="text" id="txtMonto" name="txtMonto" autofocus="true" class="form-control text-right" autocomplete="false" placeholder="Monto" value="0.00"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-8 col-sm-4">
									<input type="hidden" id="venta" />
									<button type="submit" class="btn btn-danger btn-block" id="btnBuscarProductos">Guardar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="lista"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>