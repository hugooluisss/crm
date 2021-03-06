<div class="row">
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
				<label for="txtLimite" class="col-sm-2 control-label">Límite</label>
				<div class="col-sm-2">
					<input type="text" id="txtLimite" name="txtLimite" autofocus="true" class="form-control" autocomplete="false" value="0"/>
				</div>
				<div class="col-sm-4">
					<small>Establecer en 0 si es que no hay límite de crédito</small>
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
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/clientes/estadoCuenta.tpl"}