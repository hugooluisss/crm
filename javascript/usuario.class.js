TUsuario = function(){
	var self = this;
	
	this.add = function(id,	nombre, apellidos, email, perfil, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cusuarios', {
				"action": "add",
				"id": id,
				"nombre": nombre,
				"apellidos": apellidos, 
				"email": email, 
				"perfil": perfil
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.setPass = function(usuario, pass, fn){
		if (fn.before !== undefined)
			fn.before(data);
			
		$.post('cusuarios', {
			"action": "setPass",
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after !== undefined)
				fn.after(data);
				
			if (data.band == 'false')
				console.log("Ocurrió un error al actualizar la contraseña del usuario");
			
		}, "json");
	};
	
	this.del = function(usuario, fn){
		$.post('cusuarios', {
			"action": "del",
			"usuario": usuario,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
	
	this.login = function(usuario, pass, fn){
		$.post('clogin', {
			"action": "login",
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
};