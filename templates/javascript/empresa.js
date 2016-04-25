$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		debug: true,
		messages: {
			txtNombre: "Este campo es necesario"
		},
		submitHandler: function(form){
			var obj = new TEmpresa;
			
			obj.guardar("", $("#txtNombre").val(), $("#txtDireccion").val(), $("#txtPagina").val(), {
				before: function(){
					$(form).prop("disabled", true);
				}, after: function(resp){
					$(form).prop("disabled", false);
					
					if (resp.band == false)
						alert("No se pudo actualizar la información");
				}
			});
		}
	});
});