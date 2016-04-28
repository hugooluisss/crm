<div class="box">
	<div class="box-body">
		<table id="tblSuscripciones" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idSuscripcion}</td>
						<td>{$row.nombre}</td>
						<td>{$row.inicio}</td>
						<td>{$row.fin}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" suscripcion="{$row.idSuscripcion}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>