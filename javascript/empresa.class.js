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
};