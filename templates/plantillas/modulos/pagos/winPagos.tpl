<div class="modal fade" id="winPagos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
									<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" placeholder="Fecha" value="{$smarty.now|date_format:"Y-m-d"}"/>
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
</div>