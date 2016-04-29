<div class="sign-in-form">
	<div class="sign-in-form-top">
		<p><span>{$PAGE.empresaAcronimo}</span> <a href="index.php">Admin</a></p>
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
	<div class="new_people">
		<h4>¿Eres nuevo?</h4>
		<p>No te preocupes, puedes crear una cuenta con nosotros</p>
		<a href="registrate">¡Registrate ahora!</a>
	</div>
	<div class="new_people">
		<h4>¿Se acabó tu suscripción?</h4>
		<p>No te preocupes, consulta nuestros planes</p>
		<a href="planes">Planes de suscripción!</a>
	</div>
</div>