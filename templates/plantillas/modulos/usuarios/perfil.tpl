<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de usuarios</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="form-group">
		<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
		<div class="col-sm-5">
			<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" value="{$usuario.nombres}"/>
		</div>
	</div>
	<div class="form-group">
		<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-5">
			<input type="text" id="txtApellidos" name="txtApellidos" class="form-control" autocomplete="false" value="{$usuario.apellidos}"/>
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="txtEmail" class="col-sm-2 control-label">Email *</label>
		<div class="col-sm-8">
			<input type="text" id="txtEmail" name="txtEmail" autofocus="true" class="form-control" autocomplete="false" value="{$usuario.email}"/>
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
	<input type="hidden" id="id" value="{$usuario.idUsuario}"/>
	<input type="hidden" id="perfil" value="{$usuario.idPerfil}"/>
</form>