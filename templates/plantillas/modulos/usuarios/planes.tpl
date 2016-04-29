<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Planes de suscripción</h1>
	</div>
</div>

<div class="row">
	{foreach from=$lista item="row"}
		<div class="col-md-3">
			<div class="jumbotron">
				<div class="container">
					<h1>{$row.nombre}</h1>
					<p>{$row.descripcion}</p>
					
					

					
					<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="add" value="1">
						<input type="hidden" name="business" value="hugooluisss@gmail.com">
						<input type="hidden" name="item_name" value="{$row.nombre}">
						<input type="hidden" name="item_number" value="{$row.idPaquete}">
						<input type="hidden" name="amount" value="{$row.precio}">
						<input type="hidden" name="shipping" value="0">
						<input type="hidden" name="shipping2" value="0">
						<input type="hidden" name="handling" value="0 ">
						<input type="hidden" name="currency_code" value="MXN">
						<input type="hidden" name="return" value="">
						<input type="hidden" name="undefined_quantity" value="1">
						<input type="image" src="http://www.paypalobjects.com/es_XC/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Realice pagos con PayPal: es rápido, gratis y seguro.">
					</form>
				</div>
			</div>
		</div>
	{/foreach}
</div>

<script>
	paypal.minicart.render();
</script>