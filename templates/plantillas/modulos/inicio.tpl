<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><i class="fa fa-money" aria-hidden="true"></i> Total de ventas</h2>
			</div>
			<div class="panel-body" id="chart_div">
			</div>
			<div class="panel-footer text-right">
				<a href="ventas" class="btn">Ir a ventas</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2><i class="fa fa-cc" aria-hidden="true"></i> Mi economía</h2>
			</div>
			<div class="panel-body">
				En este {date("Y")} has vendido <b>${$montoVentas}</b> de lo cual has recuparado <b>${$pagosVentas}</b>, Intenta recuperar <b>${$saldoVentas}</b>
			</div>
			<div class="panel-footer text-right">
				<a href="ventas" class="btn">Ir a ventas</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2><i class="fa fa-check" aria-hidden="true"></i> Pedidos sin entregar</h2>
			</div>
			<div class="panel-body">
				{if $ventasPedidos eq 0}
					Todos los artículos ya fueron entregado
				{else}
					Tienes {$ventasPedidos} ventas sin entregar
				{/if}
			</div>
			<div class="panel-footer text-right">
				<a href="pedidos" class="btn">Ir a pedidos</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2><i class="fa fa-users" aria-hidden="true"></i> Clientes</h2>
			</div>
			<div class="panel-body">
				Tienes un total de {$totalClientes} clientes registrados en la plataforma
			</div>
			<div class="panel-footer text-right">
				<a href="clientes" class="btn">Ir a clientes</a>
			</div>
		</div>
	</div>
</div>