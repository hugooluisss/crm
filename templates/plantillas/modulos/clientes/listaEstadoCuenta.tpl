<div class="box">
	<div class="box-body">
		<div class="alert alert-info" role="alert">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<b>Cliente: </b> {$cliente}<br />
					<b>Límite de crédito: </b> <span class="warning">{if $limite > 0}{$limite}{else}---{/if}</span><br />
					<b>Saldo deudor: </b> <span class="error">{$saldo}</span><br />
				</div>
				{if $objCliente->getEmail() neq ''}
				<div class="col-sm-4 text-right">
					<input type="button" id="btnSendEstadoCuenta" value="Enviar por correo" class="btn btn-danger" cliente="{$objCliente->getId()}"/>
				</div>
				{/if}
			</div>
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