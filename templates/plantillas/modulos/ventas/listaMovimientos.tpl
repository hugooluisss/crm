<div class="alert alert-info">
	El cliente debe $ {$saldoCliente}, {if $limiteCliente > 0} el límite de crédito es de {$limiteCliente}{/if}. 
	{if $saldoCliente >= $limiteCliente and $limiteCliente > 0}
		<span class="error">Sobrepasó su límite de crédito por {$sobrepaso}</span>
	{/if}
</div>
<table id="tblMovimientos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Descripción</th>
			<th>Cant</th>
			<th>Precio</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.clave}</td>
			<td>{$row.descripcion}</td>
			<td>{$row.cantidad}</td>
			<td>{$row.precio}</td>
			<td class="text-right">
				<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" movimiento="{$row.idMovimiento}"><i class="fa fa-times"></i></button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>

<div class="row">
	<div class="col-sm-offset-8 col-sm-4">
		<div class="alert alert-warning text-right">
			<strong>Total</strong> $ {$total}
		</div>
	</div>
</div>