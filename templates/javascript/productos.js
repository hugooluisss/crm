$(document).ready(function(){
	getLista();
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			selCategoria: "required",
			txtNombre: "required",
			txtClave: {
				required: true,
				remote: {
					url: "cproductos",
					type: "post",
					data: {
						action: "validaCodigo"
					}
				}
			},
			txtNombre: "required",
			txtPrecio: {
				required: true,
				number: true
			},
			txtCosto: {
				required: true,
				number: true
			}
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		debug: true,
		messages: {
			selCategoria: "Este campo es necesario",
			txtNombre: "Este campo es necesario",
			txtClave: {
				required: "Este campo es necesario",
				remote: "La clave no puede ser usada por que está asignada a otro producto"
			},
			txtNombre: "Este campo es necesario",
			txtPrecio: {
				required: "Este campo es necesario",
				number: "Solo se aceptan números"
			},
			txtCosto: {
				required: "Este campo es necesario",
				number: "Solo se aceptan números"
			}
		},
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add(
				$("#id").val(), 
				$("#selTipo").val(), 
				$("#selCategoria").val(),
				$("#txtClave").val(),
				$("#txtNombre").val(),
				$("#txtDescripcion").val(),
				$("#txtPrecio").val(),
				$("#txtCosto").val(),
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
		$.get("listaProductos", function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idProducto);
				$("#selTipo").val(el.idTipo);
				$("#selCategoria").val(el.idCategoria);
				$("#txtNombre").val(el.nombre);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtClave").val(el.clave);
				$("#txtPrecio").val(el.precio);
				$("#txtCosto").val(el.costo);
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TProducto;
					obj.del($(this).attr("producto"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la producto");
							getLista();
						}
					});
				}
			});
			$("#tblProductos").DataTable({
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