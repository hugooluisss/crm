<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Planes de suscripción</h1>
	</div>
</div>

<div class="alert alert-danger" role="alert">
	Tu suscripción a caducado, no te quedes fuera, adquiere uno de nuestros paquetes y continua con nosotros
</div>

<div class="row">
	{foreach from=$lista item="row"}
		<div class="col-md-3">
			<div class="jumbotron">
				<div class="container">
					<h1>{$row.nombre}</h1>
					<h2 class="text-right">${$row.precio}</h2>
					<p>{$row.descripcion}</p>
					
					<div class="container text-right" target="paypal">
						<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="add" value="1">
							<input type="hidden" name="business" value="hugooluisss-facilitator@hotmail.com">
							<input type="hidden" name="item_name" value="{$row.nombre} - {$PAGE.usuario->empresa->getId()}">
							<input type="hidden" name="item_number" value="{$row.idPaquete}">
							<input type="hidden" name="amount" value="{$row.precio}">
							<input type="hidden" name="shipping" value="0">
							<input type="hidden" name="shipping2" value="0">
							<input type="hidden" name="handling" value="0 ">
							<input type="hidden" name="currency_code" value="MXN">
							<input type="hidden" name="undefined_quantity" value="1">
							<input type="hidden" name="return" value="http://localhost/crm/?mod=success&codigo={base64_encode($row.idPaquete|cat:'|.|'|cat:$PAGE.usuario->empresa->getId()|cat:'|.|'|cat:date("Y-m-d H:i:s"))}" />
							<input type="submit" name="submit" value="Comprar ahora" class="btn btn-primary" />
						</form>
					</div>
				</div>
			</div>
		</div>
	{/foreach}
</div>