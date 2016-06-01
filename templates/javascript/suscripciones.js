$(document).ready(function(){
	getLista($("#empresa").val());
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
	$("#frmAdd #txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
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
			var obj = new TSuscripcion;
			obj.add(
				$("#id").val(), 
				$("#empresa").val(), 
				$("#selPaquete").val(), 
				$("#txtFecha").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista($("#empresa").val());
							
							$("#frmAdd").get(0).reset();
							$('.nav a[href="#lista"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
    
	function getLista(empresa){
		$.post("listaSuscripciones", {
			"empresa": empresa
		}, function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idSuscripcion);
				//$("#txtNombre").val(el.nombre);
				$("#txtFecha").val(el.inicio);
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TSuscripcion;
					obj.del($(this).attr("suscripcion"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la suscripción");
							getLista($("#empresa").val());
						}
					});
				}
			});
			$("#tblSuscripciones").DataTable({
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