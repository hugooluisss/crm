<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Productos</h1>
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
				<label for="txtClave" class="col-sm-2 control-label">Clave *</label>
				<div class="col-sm-3">
					<input type="text" id="txtClave" name="txtClave" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="selTipo" class="col-sm-2 control-label">Tipo *</label>
				<div class="col-sm-2">
					<select id="selTipo" name="selTipo" class="form-control">
						{foreach from=$tipos item="row"}
						<option value="{$row.idTipo}">{$row.nombre}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selCategoria" class="col-sm-2 control-label">Categoría *</label>
				<div class="col-sm-4">
					<select id="selCategoria" name="selCategoria" class="form-control">
						{foreach from=$categorias item="row"}
						<option value="{$row.idCategoria}">{$row.nombre}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtNombre" class="col-sm-2 control-label">Nombre *</label>
				<div class="col-sm-6">
					<input type="text" id="txtNombre" name="txtNombre" autofocus="true" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
				<div class="col-sm-10">
					<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPrecio" class="col-sm-2 control-label">Precio *</label>
				<div class="col-sm-2">
					<input type="text" id="txtPrecio" name="txtPrecio" autofocus="true" class="form-control" autocomplete="false" value="0.00"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCosto" class="col-sm-2 control-label">Costo *</label>
				<div class="col-sm-2">
					<input type="text" id="txtCosto" name="txtCosto" autofocus="true" class="form-control" autocomplete="false" value="0.00" />
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
	</div>
</div>