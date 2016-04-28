$(document).ready(function(){
	$("#frmRegistro").validate({
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
						action: "validaEmail"
					}
				}
			},
			txtPass: {
	            minlength: 5,
	            required: true
	        },
	        txtPass2: {
	            minlength: 5,
	            equalTo: "#txtPass"
	        },
	        txtEmpresa: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		messages: {
			txtEmail: {
				remote: "Esta cuenta de correo ya se encuentra registrada, intenta con otra"
			},
			txtPass: {
				minlength: "Minimamente debe de tener 5 caracteres"
			},
			txtPass2: {
				minlength: "Minimamente debe de tener 5 caracteres",
				equalTo: "Las contraseñas no coinciden"
			}
		},
		submitHandler: function(form){
			$("#frmRegistro").prop("disabled", true);
			$.post('cregistro', {
				"action": "guardar",
				"nombre": $("#txtNombre").val(),
				"apellidos": $("#txtApellidos").val(),
				"email": $("#txtEmail").val(),
				"pass": $("#txtPass").val(),
				"empresa": $("#txtEmpresa").val()
			}, function(data){
				$("#frmRegistro").prop("disabled", false);
				
				if (data.band == 'false')
					console.log(data.mensaje);
				else{
					alert("Felicidades... tu registro quedó completo");
					location.href = "index.php";
				}
			}, "json");
        }
    });
});