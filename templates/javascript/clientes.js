$(document).ready(function(){
	getLista();
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAdd #id").val("");
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtTelefono: {
				digits: true,
				minlength: 5,
				maxlength: 12
			},
			txtEmail: {
				email: true,
			},
			txtLimite: {
				number: true,
				min: 0,
				required: true
			}
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		debug: true,
		messages: {
			txtEmail: {
				email: "No es un correo válido"
			},
			txtTelefono: {
				digits: "Solo números",
				minlength: "Solo números y deben ser minimamente 5",
				minlength: "Solo números y deben ser máximo 12"
			},
			txtNombre: "Este campo es necesario",
			txtLimite: {
				number: "Solo números",
				min: "Solo números y el valor mínimo es 0"
			}
		},
		submitHandler: function(form){
			var obj = new TCliente;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#selSexo").val(),
				$("#txtTelefono").val(),
				$("#txtEmail").val(),
				$("#txtDireccion").val(),
				$("#txtLimite").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista();
							
							$("#frmAdd").get(0).reset();
							$('.nav a[href="#lista"]').tab('show');
						}else{
							alert("Upps... no se pudo guardar");
						}
					}
				}
			);
        }

    });
    
	function getLista(){
		$.get("listaClientes", function(html){
			$("#dvLista").html(html);
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCliente);
				$("#txtNombre").val(el.nombre);
				$("#txtTelefono").val(el.telefono);
				$("#txtSexo").val(el.sexo);
				$("#txtEmail").val(el.email);
				$("#txtDireccion").val(el.direccion);
				$("#txtLimite").val(el.limite);
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCliente;
					obj.del($(this).attr("cliente"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar al cliente");
							getLista();
						}
					});
				}
			});
			
			$("[action=estado]").click(function(){
				$("#winVentas").modal();
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$.post("estadoCuenta", {
					"cliente": el.idCliente
				}, function(html){
					$("#winVentas").find(".modal-body").html(html);
					
					$("#tblEstado").DataTable({
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
	}
});