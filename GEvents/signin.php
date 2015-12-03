<?php include 'header.php'; ?>
<body>
<section>
	<article>
		<form class="form-horizontal" method="POST" action="#">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nombre de Usuario</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputEmail3" placeholder="Nombre de Usuario">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default inicioSesion">Iniciar Sesión</button>
				</div>
				<small class="izquierda"><a href="#">¿Has olvidado tu contraseña?</a></small><br>
				<small class="izquierda"><a href="#">Regístrate</a></small>

			</div>
		</form>
	</article>
</section>
</body>

<?php include 'footer.php'; ?>