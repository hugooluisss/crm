$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtApellidos: "required",
			txtEmail: {
				email: true,
				required: true,
				remote: {
					url: "cusuarios",
					type: "post",
					data: {
						action: "validaEmail",
						usuario: function(){
							return $("#id").val();
						}
					}
				}
			},
			txtPass1: {
	            minlength: 5
	        },
	        txtPass2: {
	            minlength: 5,
	            equalTo: "#txtPass1"
	        }
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		debug: true,
		messages: {
			txtEmail: {
				email: "No es un correo válido",
				remote: "El correo que estás usando ya existe en nuestro sistema"
			},
			txtPass1: {
				minlength: "Minimamente debe de tener 5 caracteres"
			},
			txtPass2: {
				minlength: "Minimamente debe de tener 5 caracteres",
				equalTo: "Las contraseñas no coinciden"
			},
		},
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.add(
				$("#id").val(), 
				$("#empresa").val(),
				$("#txtNombre").val(), 
				$("#txtApellidos").val(),
				$("#txtEmail").val(),
				$("#perfil").val(),
				{
					after: function(datos){
						if (datos.band){
							if ($("#txtPass1").val() != '') 
								obj.setPass(datos.id, $("#txtPass1").val(), {
									after: function(resp){
										if (resp.band == false)
											alert("Ocurrió un error al actualizar la contraseña");
										else{
											alert("La contraseña se actualizó, es necesario volver a iniciar sesión");
											
											location.href = "?mod=logout";
										}
									}
								});
								
							alert("Los datos se actualizaron con éxito");
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
		}
	});
});