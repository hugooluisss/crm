$(document).ready(function(){
	$.post("cempresa", {
		"action": "getSuscripcion"
	}, function(resp){
		if (resp.band == "true"){
			console.log("Suscripcion OK");
		}else
			//alert("Hola");
			location.href = "planes";
	}, "json");
});