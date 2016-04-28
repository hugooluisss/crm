$(document).ready(function(){
	var objVenta = new TVenta;
	objVenta.getHistorial("",{
		after: function(result){
			var barChartData = {
				labels: result.etiquetas,
				datasets: [
					{
						label: "Ventas",
						backgroundColor: "rgba(255,99,132,0.2)",
						borderColor: "rgba(255,99,132,1)",
						borderWidth: 1,
						hoverBackgroundColor: "rgba(255,99,132,0.4)",
						hoverBorderColor: "rgba(255,99,132,1)",
						data: JSON.stringify(result.cantidades)
					}
				]
			}
			
			new Chart($("#cnvVentas").get(0).getContext("2d"), {
				type: "bar",
				data: barChartData
			});
		}
	});
});