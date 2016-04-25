$(document).ready(function(){
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmLogin").validate({
		debug: false,
		rules: {
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		messages: {
			txtUsuario: "El usuario es necesario",
			txtPass: "La contraseña es necesaria"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		debug: true,
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
				after: function(datos){
					if (datos.band)
						location.href = "panelPrincipal";
					else{
						alert("Los datos son incorrectos, corrigelos y vuelve a intentarlo");
					}
				}
			});
        }

    });
	
});