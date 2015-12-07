<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
<section id="divInicioSesion" class="divInicioSesion">
<article>
	<form class="form-signin" method="POST" id="formularioCrearEvento" name="formularioCrearEvento" action="" data-toggle="validator" enctype="multipart/form-data">
			<div class="form-group has-feedback">
				<label>Nombre del evento</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Feria de Sevilla 2016" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del evento" required></textarea>
			</div>
			<div class="form-group">
				<label>Lugar</label>
				<input type="text" maxlength="45" class="form-control" id="lugar" name="lugar" placeholder="Sevilla" required>
			</div>
		<div class="form-group">
				<label>Fecha de inicio</label>
				<?php $fechaHoy = date('Y-m-d'); ?>
					<input type="date" class="form-control" id="fechaInicio" min="<?php echo $fechaHoy; ?>" name="fechaInicio" placeholder="20-08-2016" required>
			</div>
		<div class="form-group">
				<label>Fecha de fin</label>
					<input type="date" class="form-control" id="fechaFin" min="<?php echo $fechaHoy; ?>" name="fechaFin" placeholder="28-08-2016" required>
			</div>
		<div class="form-group">
				<label>Imagen del evento</label>
					<input type="file" class="form-control" id="imagen" name="imagen">
		</div>
			<div class="form-group">
					<button type="submit" class="btn btn-default inicioSesion btnVolver">Crear</button>
					<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
