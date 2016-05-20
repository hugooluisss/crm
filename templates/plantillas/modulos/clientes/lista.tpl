<div class="box">
	<div class="box-body">
		<table id="tblClientes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idCliente}</td>
						<td>{$row.nombre}</td>
						<td>{$row.telefono}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="estado" title="Estado de cuenta" datos='{$row.json}'><i class="fa fa-money" aria-hidden="true"></i></button>
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" cliente="{$row.idCliente}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>