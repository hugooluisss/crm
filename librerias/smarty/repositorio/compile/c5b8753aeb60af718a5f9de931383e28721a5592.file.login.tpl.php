<?php /* Smarty version Smarty-3.1.11, created on 2016-04-29 10:11:37
         compiled from "templates/plantillas/layout/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76302807957199b2a3f94f9-79700491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b8753aeb60af718a5f9de931383e28721a5592' => 
    array (
      0 => 'templates/plantillas/layout/login.tpl',
      1 => 1461942695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76302807957199b2a3f94f9-79700491',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57199b2a4bf117_14000495',
  'variables' => 
  array (
    'PAGE' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57199b2a4bf117_14000495')) {function content_57199b2a4bf117_14000495($_smarty_tpl) {?><!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
<body class="sign-in-up">
	<section>
		<div id="page-wrapper" class="sign-in-wrapper">
			<div class="graphs">
				<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
					<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
			</div>
		</div>
		<!--footer section start-->
		<footer>
		   <p>&copy <?php echo date("Y");?>
 <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
. Todos los derechos reservados </p>
		</footer>
        <!--footer section end-->
	</section>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/jquery.nicescroll.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.es.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.js"></script>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jpaypal/minicart.min.js"></script>
   
<?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PAGE']->value['scriptsJS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"></script>
<?php } ?>
</body>
</html><?php }} ?>