<?php /* Smarty version Smarty-3.1.11, created on 2016-04-27 23:22:51
         compiled from "templates/plantillas/modulos/usuarios/registroInicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1329129216572185de5a6ef8-06926604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dea32c42a8a261b942897d799c3c266dd2eadb2' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/registroInicio.tpl',
      1 => 1461817369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1329129216572185de5a6ef8-06926604',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_572185de5a8183_19069743',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572185de5a8183_19069743')) {function content_572185de5a8183_19069743($_smarty_tpl) {?><form role="form" id="frmRegistro" onsubmit="javascript: return false;">
	<div class="sign-in-up">
	    <section>
				<div id="page-wrapper" class="sign-in-wrapper">
					<div class="graphs">
						<div class="sign-up">
							<h3>Registrate aquí</h3>
							<p class="creating">Prueba nuestro sistema y empieza a tener un control sobre tus ventas</p>
							<h5>Información Personal</h5>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Nombre :</h4>
								</div>
								<div class="sign-up2">
										<input type="text" id="txtNombre" name="txtNombre"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Apellidos :</h4>
								</div>
								<div class="sign-up2">
										<input type="text" id="txtApellidos" name="txtApellidos"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<h6>Información de usuario</h6>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Email :</h4>
								</div>
								<div class="sign-up2">
										<input type="text" id="txtEmail" name="txtEmail"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Contraseña :</h4>
								</div>
								<div class="sign-up2">
										<input type="password" id="txtPass" name="txtPass"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Confirma :</h4>
								</div>
								<div class="sign-up2">
										<input type="password" id="txtPass2" name="txtPass2"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<h6>Información de la empresa</h6>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Nombre :</h4>
								</div>
								<div class="sign-up2">
										<input type="text" id="txtEmpresa" name="txtEmpresa"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							
							<div class="sub_home">
								<div class="sub_home_left">
										<input type="submit" value="Guardar">
								</div>
								<div class="sub_home_right">
									<p>Regresar al <a href="index.php">Inicio</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
	    </section>
	</div>
</form><?php }} ?>