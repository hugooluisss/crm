<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>{$PAGE.empresaAcronimo}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{$PAGE.ruta}dist/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{$PAGE.ruta}dist/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{$PAGE.ruta}dist/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{$PAGE.ruta}dist/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="{$PAGE.ruta}dist/js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="{$PAGE.ruta}dist/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="{$PAGE.ruta}dist/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="{$PAGE.ruta}dist/js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
<body class="sign-in-up">
	<section>
		<div id="page-wrapper" class="sign-in-wrapper">
			<div class="graphs">
				{if $PAGE.vista neq ''}
					{include file=$PAGE.vista}
				{/if}
			</div>
		</div>
		<!--footer section start-->
		<footer>
		   <p>&copy {date("Y")} {$PAGE.empresaAcronimo}. Todos los derechos reservados </p>
		</footer>
        <!--footer section end-->
	</section>
	
	<script src="{$PAGE.ruta}dist/js/jquery.nicescroll.js"></script>
	<script src="{$PAGE.ruta}dist/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="{$PAGE.ruta}dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.es.js"></script>
	<script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
   
{foreach from=$PAGE.scriptsJS item=script}
	<script type="text/javascript" src="{$script}"></script>
{/foreach}
</body>
</html>