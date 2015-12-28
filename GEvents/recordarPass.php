<?php include 'header.php';
if(isset($_SESSION['login'])){
	echo '<script>location.href="index.php";</script>';
}
?>
<body>
<section id="divInicioSesion" class="divInicioSesion">
<article>
	<form class="form-horizontal" id="formularioRecordarContraseña" name="formularioRecordarContraseña" method="POST" action="" data-toggle="validator" role="form">
			<div class="form-group">
				<label>Nombre de usuario</label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Nombre de usuario">
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group has-feedback">
				<label>Email</label>
					<input type="email" pattern="^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$" class="form-control" id="correo" name="correo" placeholder="Email" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default inicioSesion">Recordar Contraseña</button>
				</div>
				<small class="izquierda"><a href="registro.php">¿No estás registrado?</a></small>

			</div>
		</form>
</article>
</section>
</body>
<?php include 'footer.php'; ?>
