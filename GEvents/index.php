<?php include 'header.php'; ?>
<body>
  <section>

      <h1>Eventos<div class="buscarEventos">

      <form role="search">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
          <input type="text" id="busqueda" name="busqueda" onkeyup="MostrarConsultaEventos();" class="form-control" placeholder="Buscar...">
        </div>
        <span class="help-block ayudaEsconder" id="ayuda">Puedes realizar la búsqueda por nombre o por lugar </span>
       </form>
       </div>
      </h1>

      <article>
      <div id="todosEventos">
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT * FROM Evento ORDER BY fechaInicio;";
				$resultado = mysqli_query($conn, $sql);
        $todosEventos = Array();

        while($eventos = mysqli_fetch_assoc($resultado)){
          array_push($todosEventos,$eventos);
        }

        foreach(array_chunk($todosEventos, 2, true) as $todosLosEventos) {
					echo '<div class="contenidoEvento row">';
            foreach ($todosLosEventos as $evento) {
              echo '<div class="col-md-6 col-lg-6">';
    					echo '<a class="contenidoEvento linkEventos" href="evento.php?i=';
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
    					echo '<p class="descripcionEvento">';
    					$descripcion = str_split($evento['descripcion'], 150);
              echo $descripcion[0].'...';
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
