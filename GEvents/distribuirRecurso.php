<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}else{
	header('Location: eventosUsuario.php'); //no se pasa ningun evento por parametro
}

include_once 'libs/myLib.php';
$conn = dbConnect();

$sql = "SELECT * FROM Producto WHERE evento = $idEvento;";
$resultado = mysqli_query($conn, $sql);
$sql2 = "SELECT Usuario.id, Usuario.nombre, Usuario.apellidos FROM Organizador, Usuario WHERE usuario.id = organizador.usuario AND organizador.evento = $idEvento;";
$resultado2 = mysqli_query($conn, $sql2);
?>
<body>
<section>
  <h1>Distribuir recurso</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioDistribuirRecurso" name="formularioDistribuirRecurso" action="scripts/distribuirRecurso.php" data-toggle="validator" enctype="multipart/form-data">
			<input type="hidden" id="idEvento" name="idEvento" value="<?php echo $idEvento;?>">
      <div class="form-group has-feedback">
				<label>Producto</label>
        <select class="form-control" id="producto" name="producto">
          <?php
          while($productos = mysqli_fetch_assoc($resultado)){
            echo '<option value="';
            echo $productos['id'];
            echo '">';
            echo $productos['nombre'];
            echo '</option>';
          }
          ?>
          </select>
			</div>
      <div class="form-group">
				<label>Cantidad</label>
				<input type="number" class="form-control" id="cantidad" name="cantidad" min="1" placeholder="1" required>
			</div>
      <div class="form-group has-feedback">
				<label>Organizador</label>
        <select class="form-control" id="organizador" name="organizador">
          <?php
          while($organizador = mysqli_fetch_assoc($resultado2)){
            echo '<option value="';
            echo $organizador['id'];
            echo '">';
            echo $organizador['nombre'];
            echo ' ';
            echo $organizador['apellidos'];
            echo '</option>';
          }
          ?>
          </select>
			</div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Asignar</button>
					<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
