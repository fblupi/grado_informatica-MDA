<?php include 'header.php'; 
if(!isset($_SESSION['login'])){
	echo '<script>location.href="inicioSesion.php";</script>';
}
?>
<body>
  <section class="animated zoomIn">
      <h1>Mi cuenta<hr></h1>
      <article>
       <?php 
				include 'libs/myLib.php';
				$conn = dbConnect();
				$login = $_SESSION['login'];
				
				$sql = "SELECT * FROM Usuario WHERE usuario.login = '$login';";
				$resultado = mysqli_query($conn, $sql);
				while($usuario = mysqli_fetch_assoc($resultado)){
					echo '<div>';
					echo '<h2>';
					echo $usuario['login'];
					echo '</h2>';
					echo '<form class="formularioEditarPerfil" method="POST" action="scripts/editarPerfil.php" data-toggle="validator" role="form" enctype="multipart/form-data">';
					echo '<div class="col-lg-6 col-md-6">';
					echo '<div class="form-group has-feedback">';
					echo '<label>Nombre: </label>';
					echo '<input type="text" class="form-control" id="nombre" name="nombre" value="';
					echo $usuario['nombre'];
					echo '" maxlength="20" required>';
					echo '<span class="glyphicon form-control-feedback" aria-hidden="true"></span>';
					echo '</div>';
					echo '<div class="form-group has-feedback">';
					echo '<label>Apellidos: </label>';
					echo '<input type="text" class="form-control" id="nombre" name="nombre" value="';
					echo $usuario['apellidos'];
					echo '" maxlength="45" required>';
					echo '<span class="glyphicon form-control-feedback" aria-hidden="true"></span>';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label>Teléfono: </label>';
					echo '<input type="tel" class="form-control" id="telefono" name="telefono" value="';
					echo $usuario['telefono'];
					echo '" maxlength="9">';
					echo '<span class="glyphicon form-control-feedback" aria-hidden="true"></span>';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-lg-6 col-md-6">';
					echo '<div class="form-group">';
					echo '<label>Imagen de perfil</label>';
					echo '<input type="file" max-size=2048 class="form-control" id="imagen" name="imagen">';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label>Fecha de nacimiento</label>';
					echo '<input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="';
					echo $usuario['fechaNacimiento'];
					echo '">';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label>Localidad</label>';
					echo '<input type="text" class="form-control" id="localizacion" name="localizacion" value="';
					echo $usuario['localizacion'];
					echo '">';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label>Dirección</label>';
					echo '<input type="text" class="form-control" id="direccion" name="direccion" value="';
					echo $usuario['direccion'];
					echo '">';
					echo '</div>';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<button type="submit" class="btn btn-default inicioSesion editarPerfil">Editar</button>';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
