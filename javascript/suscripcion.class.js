TSuscripcion = function(){
	var self = this;
	
	this.add = function(id, empresa, paquete, inicio, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('csuscripciones', {
				"action": "guardar",
				"empresa": empresa,
				"paquete": paquete,
				"inicio": inicio
			}, function(data) {
				if (data.band == 'false')
					console.log(data.mensaje !== ''?data.mensaje:"Upps. Ocurrió un error al agregar la suscripción");
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	this.del = function(suscripcion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('csuscripciones', {
			"action": "del",
			"id": suscripcion,
		}, function(data){
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar la suscripcion");
			
			if (fn.after !== undefined) fn.after(data);
		}, "json");
	};
};