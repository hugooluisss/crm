<div class="sign-in-form">
	<div class="sign-in-form-top">
		<p><span>{$PAGE.nombreAplicacion}</span> <a href="index.php"> - {$PAGE.empresaAcronimo}</a></p>
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
</div>