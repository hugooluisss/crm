<div class="box">
	<div class="box-body">
		<table id="tblVentas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>No Pagos</th>
					<th>Monto</th>
					<th>Saldo</th>
					<th>¿Entregados?</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.fecha}</td>
						<td>{$row.nombre}</td>
						<td>{$row.pagos}</td>
						<td class="text-right">{$row.monto}</td>
						<td class="text-right">{$row.saldo}</td>
						<td class="text-right">
							<select class="entregados form-control" venta="{$row.idVenta}">
								<option value="1" {if $row.entregados eq 1}selected{/if}>Si</option>
								<option value="0" {if $row.entregados eq 0}selected{/if}>No</option>
							</select>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-warning" action="imprimir" title="Imprimir ticket" venta="{$row.idVenta}"><i class="fa fa-print"></i></button>
							<button type="button" class="btn btn-success" action="pagos" title="Pagos" venta="{$row.idVenta}"><i class="fa fa-money"></i></button>
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" venta="{$row.idVenta}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>