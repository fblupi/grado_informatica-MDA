<?php include 'header.php'; ?>
<body>
  <section class="animated zoomIn">
      <h1>Eventos<hr></h1>
      <div class="buscarEventos">
      <form role="search">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
          <input type="text" id="busqueda" name="busqueda" onkeyup="MostrarConsultaEventos();" class="form-control" placeholder="Buscar...">
        </div>
       </form>
       </div>
      <article>
      <div id="todosEventos">
       <?php 
				include 'libs/myLib.php';
				$conn = dbConnect();
				
				$sql = "SELECT * FROM Evento ORDER BY fechaInicio;";
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
					$descripcion = explode(".",$eventos['descripcion']);
					echo $descripcion[0].'.';
					echo $descripcion[1].'.';
					echo $descripcion[2];
					echo '...';
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
