TVenta = function(){
	var self = this;
	
	this.guardar = function(id, cliente, pagos, fecha, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cventas', {
				"action": "guardar",
				"id": id,
				"cliente": cliente,
				"pagos": pagos,
				"fecha": fecha
			}, function(data) {
				if (data.band == 'false')
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al agregar la venta":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	this.addMovimiento = function(id, venta, clave, descripcion, cantidad, precio, descuento, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cventas', {
				"action": "addMovimiento",
				"id": id,
				"venta": venta,
				"clave": clave,
				"descripcion": descripcion,
				"cantidad": cantidad,
				"precio": precio,
				"descuento": descuento
			}, function(data) {
				if (data.band == 'false')
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al agregar el movimiento a la venta":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	
	
	this.del = function(categoria, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ccategorias', {
			"action": "del",
			"id": categoria,
		}, function(data){
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar la categoria");
			
			if (fn.after !== undefined) fn.after(data);
		}, "json");
	};
};