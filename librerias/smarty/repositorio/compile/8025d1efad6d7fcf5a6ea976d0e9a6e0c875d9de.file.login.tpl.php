<?php /* Smarty version Smarty-3.1.11, created on 2016-05-02 09:56:37
         compiled from "templates/plantillas/modulos/usuarios/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13385516475719a5467f0a78-48444484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8025d1efad6d7fcf5a6ea976d0e9a6e0c875d9de' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/login.tpl',
      1 => 1462200994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13385516475719a5467f0a78-48444484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5719a546825463_85204172',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5719a546825463_85204172')) {function content_5719a546825463_85204172($_smarty_tpl) {?><div class="sign-in-form">
	<div class="sign-in-form-top">
		<p><span><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['nombreAplicacion'];?>
</span> <a href="index.php"> - <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
</a></p>
	</div>
	<div class="signin">
		<form onsubmit="javascript: return false;" id="frmLogin">
		<div class="log-input">
			<div class="log-input-left">
			   <input type="text" class="user" value="" placeholder="Correo electrónico" id="txtUsuario" name="txtUsuario"/>
			</div>
		</div>
		<div class="log-input">
			<div class="log-input-left">
			   <input type="password" class="lock" value="" placeholder="Contraseña" id="txtPass" name="txtPass"/>
			</div>
		</div>
		<input type="submit" value="Inicia sesión con tu cuenta">
	</form>	 
	</div>
</div>
<div class="row">
	<div class="col-md-12 new_people">
		<h4>¿Eres nuevo?</h4>
		<p>No te preocupes, puedes crear una cuenta con nosotros</p>
		<a href="registrate">¡Registrate ahora!</a>
	</div>
</div><?php }} ?>