<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Mis eventos</h1>
      <article>
      <a href="crearEvento.php" class="btn btn-success btnCrearEvento" type="button">Crear evento</a>
      <div id="todosEventos">
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();
				$login = $_SESSION['login'];
				$sql = "SELECT evento.id, evento.nombre, evento.lugar, evento.fechaInicio, evento.fechaFin, evento.imagen FROM Evento, Organizador, Usuario WHERE evento.id = organizador.evento AND organizador.usuario = usuario.id AND usuario.login = '$login' ORDER BY fechaInicio;";
				$resultado = mysqli_query($conn, $sql);

				$todosEventos = Array();

        while($eventos = mysqli_fetch_assoc($resultado)){
          array_push($todosEventos,$eventos);
        }

        foreach(array_chunk($todosEventos, 2, true) as $todosLosEventos) {
					echo '<div class="contenidoEvento row">';
            foreach ($todosLosEventos as $evento) {
              echo '<div class="col-md-6 col-lg-6">';
    					echo '<a class="contenidoEvento linkEventos" href="gestionarEvento.php?i=';
    					echo $evento['id'];
    					echo '">';
    					echo '<img class="evento" src="';
    					echo $evento['imagen'];
    					echo '">';
    					echo '<h2 class="nombreEvento">';
    					echo $evento['nombre'];
    					echo '</h2>';
    					echo '<div class="textoEvento">';
    					echo '<p class="lugarEvento">';
    					echo $evento['lugar'];
    					echo '</p>';
    					echo '<p class="fechaEvento">';
    					$fechaInicio = strtotime($evento['fechaInicio']);
    					$fechaFin = strtotime($evento['fechaFin']);
    					echo date('j/m/Y', $fechaInicio). ' - '.date('j/m/Y', $fechaFin);
    					echo '</p>';
    					echo '</div>';
              echo '</div>';

            }
          echo '</div>';
        }
        echo '</div>';

				?>
				</div>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
