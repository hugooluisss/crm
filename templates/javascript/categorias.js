$(document).ready(function(){
	getLista();
	
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
			var obj = new TCategoria;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#txtDescripcion").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista();
							
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
    
	function getLista(){
		$.get("listaCategorias", function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCategoria);
				$("#txtNombre").val(el.nombre);
				$("#txtDescripcion").val(el.descripcion);
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCategoria;
					obj.del($(this).attr("categoria"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la categoria");
							getLista();
						}
					});
				}
			});
			$("#tblCategorias").DataTable({
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