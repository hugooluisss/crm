$(document).ready(function(){
	$("#tblPedidos").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": false,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": true
	});
});