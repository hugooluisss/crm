<div class="row">
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
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" value="{$datos.razonsocial}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-5">
					<textarea class="form-control" id="txtDireccion" name="txtDireccion">{$datos.direccion}</textarea>
				</div>
			</div>
			<br />
			<div class="form-group">
				<label for="txtPagina" class="col-sm-2 control-label">Sitio en internet</label>
				<div class="col-sm-5">
					<input type="text" id="txtPagina" name="txtPagina" autofocus="true" class="form-control" autocomplete="false" value="{$datos.url}"/>
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
		</form>
	</div>
</div>