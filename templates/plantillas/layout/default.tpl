<!DOCTYPE HTML>
<html>
<head>
<title>.:: {$PAGE.empresaAcronimo} ::.</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CRM"/>
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

	<link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="{$PAGE.ruta}plugins/daterangepicker/daterangepicker-bs3.css">
</head> 
   
 <body class="sticky-header left-side-collapsed">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="panelPrincipal">{$PAGE.empresaAcronimo}</a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="panelPrincipal"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						{if $PAGE.usuario->perfil->getId() eq 1}
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>Configuracion</span></a>
								<ul class="sub-menu-list">
									<li><a href="empresa">Mi empresa</a></li>
									<li><a href="usuarios">Usuarios</a> </li>
								</ul>
						</li>
						<li class="menu-list">
							<a href="#"><i class="fa fa-database"></i>
								<span>Almacen</span></a>
								<ul class="sub-menu-list">
									<li><a href="categorias">Categorías</a></li>
									<li><a href="productos">Productos</a></li>
								</ul>
						</li>
						{/if}
						<li>
							<a href="clientes"><i class="fa fa-users" aria-hidden="true"></i>
								<span>Clientes</span></a>
						</li>
						<li class="menu-list">
							<a href="#"><i class="fa fa-cart-arrow-down"></i>
								<span>Ventas</span></a>
								<ul class="sub-menu-list">
									<li><a href="ventas">Caja</a></li>
								</ul>
						</li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
    <!-- left side end-->
    
    <!-- main content start-->
		<div class="main-content main-content2 main-content2copy">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p>{$PAGE.usuario->getNombre()}<span>{$PAGE.usuario->perfil->getNombre()}</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a> </li>
									<li> <a href="logout"><i class="fa fa-sign-out"></i> Salir</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>					             	
					<div class="clearfix"></div>
				</div>
			</div>
			<!--notification menu end -->
			</div>
	<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					{if $PAGE.vista neq ''}
						{include file=$PAGE.vista}
					{/if}
				</div>
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
	<link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
    <script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>
    
    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.es.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
    
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{$PAGE.ruta}plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css" />

   

{foreach from=$PAGE.scriptsJS item=script}
	<script type="text/javascript" src="{$script}"></script>
{/foreach}
</body>
</html>