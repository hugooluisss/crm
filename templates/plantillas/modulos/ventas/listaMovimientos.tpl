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