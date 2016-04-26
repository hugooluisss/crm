$(document).ready(function(){
	getLista();
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
	$('.nav a[href="#add"]').tab('show');
	
	$("#btnBuscarClientes").click(function(){
		$("#winClientes").modal();
		
		$.get("clientesVenta", function(html){
			$("#winClientes .modal-body").html(html);
			
			$("#winClientes #tblClientes button[action=seleccionar]").click(function(){
				var el =  jQuery.parseJSON($(this).attr("cliente"));
				
				$("#txtCliente").val(el.nombre);
				$("#txtCliente").attr("idCliente", el.idCliente);
				$("#winClientes").modal("hide");
			});
			
			$("#tblClientes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	});
	
	
	$("#btnBuscarProductos").click(function(){
		$("#winProductos").modal();
		
		$.get("productosVenta", function(html){
			$("#winProductos .modal-body").html(html);
			
			$("#winProductos #tblProductos button[action=seleccionar]").click(function(){
				var el =  jQuery.parseJSON($(this).attr("producto"));
				
				$("#frmAddProductos #txtClave").val(el.clave);
				$("#frmAddProductos #txtDescripcion").val(el.descripcion);
				$("#frmAddProductos #txtPrecio").val(el.precio);
				$("#frmAddProductos #txtCantidad").val(1);
				$("#winProductos").modal("hide");
				
				$("#frmAddProductos #txtPrecio").focus();
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
		$.get("listaVentas", function(html){
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
			$("#tblVentas").DataTable({
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