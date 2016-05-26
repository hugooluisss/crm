<input type="hidden" id="saldo" value="{$saldo}" />

<table id="tblPagos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Abono</th>
			<th>Saldo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.fecha}</td>
			<td class="text-right">{$row.monto}</td>
			<td class="text-right">{$row.saldo}</td>
			<td class="text-right">
				<button type="button" class="btn btn-success" action="enviarComprobante" title="Enviar comprobante" pago='{$row.idPago}'><i class="fa fa-envelope-o"></i></button>
				<button type="button" class="btn btn-danger" action="eliminarPago" title="Eliminar" pago='{$row.idPago}'><i class="fa fa-times"></i></button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>