<?php include 'header.php'; ?>
<body>
<section>
<article>
	<form class="form-horizontal" method="POST" action="#">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre de usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="login" name="login" placeholder="Nombre de usuario">
				</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
				</div>
			</div>
		<div class="form-group">
				<label class="col-sm-2 control-label">Repetir contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repetir contraseña">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default inicioSesion">Regístrate</button>
				</div>

			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
