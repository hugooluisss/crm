<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Suscripciones</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{$empresa->getRazonSocial()}
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
						{foreach from=$paquetes item="row"}
						<option value="{$row.idPaquete}">{$row.nombre}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtFecha" class="col-sm-2 control-label">Fecha *</label>
				<div class="col-sm-2">
					<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" value="{$smarty.now|date_format:"Y-m-d"}" placeholder="Y-m-d"/>
					<div id="datepicker"></div>
				</div>
			</div>
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
			<input type="hidden" id="empresa" value="{$empresa->getId()}"/>
		</form>
	</div>
</div>