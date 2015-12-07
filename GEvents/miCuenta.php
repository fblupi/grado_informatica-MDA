<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section class="animated zoomIn">
      <h1>Mi perfil<hr></h1>
      <article class="miCuenta">
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();
				$login = $_SESSION['login'];

				$sql = "SELECT * FROM Usuario WHERE usuario.login = '$login';";
				$resultado = mysqli_query($conn, $sql);
				while($usuario = mysqli_fetch_assoc($resultado)){
					echo '<img class="imagenUsuario" src="';
					echo $usuario['imagen'];
					echo '">';
					echo '<h2>';
					echo $usuario['login'];
					echo '</h2>';
					echo '<p>';
					echo '<label>Correo electrónico: </label>';
					echo ' '.$usuario['correo'];
					echo '</p>';
					echo '<p>';
					echo '<label>Nombre y apellidos: </label>';
					echo ' '.$usuario['nombre']. ' '.$usuario['apellidos'];
					echo '</p>';
					echo '<p>';
					echo '<label>Dirección: </label>';
					echo ' '.$usuario['direccion'];
					echo '</p>';
					echo '<p>';
					echo '<label>Localidad: </label>';
					echo ' '.$usuario['localizacion'];
					echo '</p>';
					echo '<p>';
					echo '<label>Teléfono: </label>';
					echo ' '.$usuario['telefono'];
					echo '</p>';
					echo '<p>';
					echo '<label>Fecha de nacimiento: </label>';
					echo ' '.date('d/m/Y', strtotime($usuario['fechaNacimiento']));
					echo '</p>';
				}
				?>
     	<a href="editarPerfil.php" class="btn btn-default botonesPerfil">Editar perfil</a>
     	<a href="cambiarPass.php" class="btn btn-danger botonesPerfil">Cambiar contraseña</a>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
