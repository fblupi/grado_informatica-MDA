<?php include 'header.php'; ?>
<?php if(isset($_SESSION['login'])){
	echo '<script>location.href="index.php";</script>';
}
?>
<body>
<section class="divInicioSesion animated flipInY">
	<article>
		<form class="form-horizontal" method="POST" action="" data-toggle="validator">
			<div class="form-group has-feedback">
				<label>Nombre de usuario</label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Nombre de usuario" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<label>Contraseña</label>
					<input type="password" class="form-control" id="pass" name="pass" data-minlength="6" placeholder="Contraseña" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<input type="button" name="iniciarSesion" class="btn btn-default inicioSesion" href="javascript:;" onclick="IniciarSesion();" value="Iniciar Sesión">
				</div>
				<small class="izquierda">Si no tienes cuenta, <a href="registro.php">regístrate</a></small>
				<br>
				<small class="izquierda"><a href="recordarPass.php">¿Has olvidado tu contraseña?</a></small>


			</div>
		</form>
	</article>
</section>
</body>
<?php include 'footer.php'; ?>
