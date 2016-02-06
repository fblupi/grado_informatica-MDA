<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
if(isset($_GET['idEvento'])){
	$idEvento = $_GET['idEvento'];
}else{
	header('Location: eventosUsuario.php'); //no se pasa ningun evento por parametro
}
if(isset($_GET['idActividad'])){
	$idActividad = $_GET['idActividad'];
}else{
	header('Location: eventosUsuario.php'); //no se pasa ningun evento por parametro
}

include_once 'libs/myLib.php';
$conn = dbConnect();
$sql = "SELECT * FROM actividad WHERE id = $idActividad;";
$resultado = mysqli_query($conn, $sql);
$datosActividad = mysqli_fetch_assoc($resultado);
?>
<body>
<section>
  <h1>Modificar actividad</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioModificarActividad" name="formularioModificarActividad" action="scripts/modificarActividad.php" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" id="idEvento" name="idEvento" value="<?php echo $idEvento;?>">
		<input type="hidden" id="idActividad" name="idActividad" value="<?php echo $idActividad;?>">
			<div class="form-group has-feedback">
				<label>Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Concierto" maxlength="45" value="<?php echo $datosActividad['nombre'];?>" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción de la actividad" required><?php echo $datosActividad['descripcion'];?></textarea>
			</div>
			<div class="form-group">
				<label>Lugar</label>
				<input type="text" class="form-control" id="lugar" name="lugar" placeholder="Plaza del pueblo" value="<?php echo $datosActividad['lugar'];?>" required>
			</div>
      <div class="form-group">
  				<label>Fecha</label>
  				<div class="input-group date" data-provide="datepicker">
  			    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo date('d/m/Y', strtotime($datosActividad['fecha']));?>">
  			    <div class="input-group-addon">
  			        <span class="glyphicon glyphicon-th"></span>
  			    </div>
  			</div>
  			</div>
      <div class="form-group">
        <label>Precio (€)</label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="0" value="<?php echo $datosActividad['precio'];?>" required>
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
