<?php include 'header.php'; 
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Mis eventos<hr></h1>
      <article>
      <a href="crearEvento.php" class="btn btn-success btnCrearEvento" type="button">Crear evento</a>
      <div id="todosEventos">
       <?php 
				include 'libs/myLib.php';
				$conn = dbConnect();
				$login = $_SESSION['login'];
				$sql = "SELECT evento.id, evento.nombre, evento.lugar, evento.fechaInicio, evento.fechaFin, evento.imagen FROM Evento, Organizador, Usuario WHERE evento.id = organizador.evento AND organizador.usuario = usuario.id AND usuario.login = '$login' ORDER BY fechaInicio;";
				$resultado = mysqli_query($conn, $sql);
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<div class="contenidoEvento row">';
					echo '<a class="contenidoEvento linkEventos" href="evento.php?i=';
					echo $eventos['id'];
					echo '">';
					echo '<img class="evento" src="';
					echo $eventos['imagen'];
					echo '">';
					echo '<h2 class="nombreEvento">';
					echo $eventos['nombre'];
					echo '<a type="button" class="btn btn-default gestionarEventos" href="gestionarEvento.php?i=';
					echo $eventos['id'];
					echo '">';
					echo '<i class="fa fa-wrench"></i> Gestionar';
					echo '</a>';
					echo '</h2>';
					echo '<div class="col-lg-10 col-md-10 textoEvento">';
					echo '<p>';
					echo $eventos['lugar'];
					echo '</p>';
					echo '<p>';
					$fechaInicio = strtotime($eventos['fechaInicio']);
					$fechaFin = strtotime($eventos['fechaFin']);
					echo date('j F, Y', $fechaInicio). ' - '.date('j F, Y', $fechaFin);
					echo '</p>';
					echo '<p>';
					
					echo '</p>';
					echo '</div>';
					echo '</div>';
				}
				
				?>
				</div>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
