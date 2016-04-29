$(document).ready(function(){
	var objVenta = new TVenta;
	objVenta.getHistorial("",{
		after: function(result){
			var datos = new Array();
			datos = [["Dia", "Ventas totales"]];
			
			$.each(result, function(i, v){
				datos.push(new Array(v.dia, parseFloat(v.total)));
			});
			
			console.log(datos);
		
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(function(){
				var data = google.visualization.arrayToDataTable(datos);

				var options = {
					title: '',
					hAxis: {title: 'Dia',  titleTextStyle: {color: '#333'}},
					vAxis: {minValue: 0}
				};

				var chart = new google.visualization.AreaChart($('#chart_div')[0]);
				chart.draw(data, options);
			});
		}
	});
});