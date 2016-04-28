$(document).ready(function(){
	getLista();
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
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
						alert("No se pudo actualizar la información de la empresa");
					else{
						getLista();
						$("#frmAdd")[0].reset();
						
						$('.nav a[href="#lista"]').tab('show');
					}
				}
			});
		}
    });
    
	function getLista(){
		$.get("listaEmpresas", function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCategoria);
				$("#txtNombre").val(el.razonsocial);
				$("#txtDireccion").val(el.direccion);
				$("#txtURL").val(el.url);
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEmpresa;
					obj.del($(this).attr("empresa"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la empresa");
							getLista();
						}
					});
				}
			});
			$("#tblEmpresas").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	}
});