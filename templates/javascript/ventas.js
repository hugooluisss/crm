$(document).ready(function(){
	getLista();
	$("#txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
	showDetalle();
	
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
		debug: false,
		rules: {
			txtFecha: "required",
			txtCliente: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TVenta;
			obj.guardar(
				$("#id").val(), 
				$("#txtCliente").attr("idCLiente"), 
				$("#selPagos").val(),
				$("#txtFecha").val(),
				{
					before: function(){
						$("#frmAdd").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd").prop("disabled", false);
						
						if (datos.band){
							alert("Listo... puedes ingresar los artículos vendidos");
							$("#frmAdd #id").val(datos.id);
							showDetalle();
							getLista();
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
				
				$("#frmAdd #id").val(el.idVenta);
				$("#frmAdd #txtCliente").val(el.nombre);
				$("#frmAdd #txtCliente").attr("idCliente", el.idCliente);
				$("#frmAdd #selPagos").val(el.pagos);
				$("#frmAdd #txtFecha").val(el.fecha);
				
				showDetalle();
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TVenta ;
					obj.del($(this).attr("venta"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar la venta");
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
	
	function showDetalle(){
		if($("#frmAdd #id").val() == '')
			$("#frmAddProductos").hide();
		else{
			$("#frmAddProductos").show();
			
			getListaMovimientos();
		}
	}
	
	
	function getListaMovimientos(){
		$.post("listaMovimientosVenta", {"venta": $("#frmAdd #id").val()}, function(html){
			$("#lstMovimiento").html(html);
			
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
			
			$("#tblMovimientos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	}
});