<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
if(isset($_GET['idEvento'])){
	$idEvento = $_GET['idEvento'];
}else{
	header('Location: eventosUsuario.php'); //no se pasa ningun evento por parametro
}
?>
<body>
<section>
  <h1>Crear actividad</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioCrearActividad" name="formularioCrearActividad" action="scripts/crearActividad.php" data-toggle="validator" enctype="multipart/form-data">
			<input type="hidden" id="idEvento" name="idEvento" value="<?php echo $idEvento;?>">
			<div class="form-group has-feedback">
				<label>Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Concierto" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción de la actividad" required></textarea>
			</div>
			<div class="form-group">
				<label>Lugar</label>
				<input type="text" class="form-control" id="lugar" name="lugar" placeholder="Plaza del pueblo" required>
			</div>
      <div class="form-group">
  				<label>Fecha</label>
  				<div class="input-group date" data-provide="datepicker">
  			    <input type="text" class="form-control" id="fecha" name="fecha">
  			    <div class="input-group-addon">
  			        <span class="glyphicon glyphicon-th"></span>
  			    </div>
  			</div>
  			</div>
      <div class="form-group">
        <label>Precio (€)</label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="0" required>
      </div>
      <div class="form-group">
  				<label>Imagen</label>
  					<input type="file" class="form-control" id="imagen" name="imagen">
  		</div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Crear</button>
					<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
