$(document).ready(function(){
	paypal.minicart.render({
		//action: 'https://www.sandbox.paypal.com/cgi-bin/webscr',
		action: 'https://www.paypal.com/cgi-bin/webscr',
		strings: {
			button: "Caja",
			buttonAlt: "Total:",
			discount: "Descuento:"
		}

	});
});