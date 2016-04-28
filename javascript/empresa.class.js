TEmpresa = function(){
	var self = this;
	
	this.guardar = function(id,	razonSocial, direccion, url, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cempresa', {
				"action": "guardar",
				"id": id,
				"razonsocial": razonSocial,
				"direccion": direccion, 
				"url": url
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(empresa, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cempresa', {
			"action": "del",
			"id": empresa,
		}, function(data){
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar la empresa");
			
			if (fn.after !== undefined) fn.after(data);
		}, "json");
	};

};