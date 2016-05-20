<div class="box">
	<div class="box-body">
		<div class="alert alert-info" role="alert">
			<b>Cliente: </b> {$cliente}<br />
			<b>Saldo deudor: </b> <span class="error">{$saldo}</span><br />
		</div>
		<table id="tblEstado" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Monto</th>
					<th>Saldo</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idVenta}</td>
						<td>{$row.fecha}</td>
						<td class="text-right">{$row.monto}</td>
						<td class="text-right">{$row.saldo}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>