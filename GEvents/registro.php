<?php include 'header.php'; ?>
<body>
<section>
<article>
	<form class="form-horizontal" method="POST" action="registrarUsuario.php" data-toggle="validator" role="form">
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Nombre de usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="login" name="login" placeholder="Nombre de usuario" required>
				</div>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" pattern="^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$" class="form-control" id="correo" name="correo" placeholder="ejemplo@ejemplo.com" required>
				</div>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" data-minlength="6" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
				</div>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		<div class="form-group has-feedback">
				<label class="col-sm-2 control-label">Repetir contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="pass2" name="pass2" data-match="#pass" placeholder="Repetir contraseña" required>
				</div>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Carlos">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Apellidos</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Fernández">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Dirección</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle Limonar">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Localidad</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="localizacion" name="localizacion" placeholder="Granada">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Teléfono</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="612345678">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Fecha de nacimiento</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="dd/mm/aaaa">
			</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Imagen de perfil</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="imagen" name="imagen" placeholder="dd/mm/aaaa">
			</div>
		</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default inicioSesion">Regístrate</button>
				</div>
				<small class="izquierda">¿Ya estás registrado?<a href="signin.php"> Inicia sesión</a></small>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
