<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
?>
<body>
  <section>

       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT * FROM evento WHERE id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo $eventos['nombre'];
					echo '</h1>';
					echo '<article>';
					echo '<div class="contenidoEvento eventoCompleto row">';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<center><img class="evento eventoCompletoImg" src="';
					echo $eventos['imagen'];
					echo '"></center>';
					echo '</div>';
					echo '<div class="col-lg-8 col-md-8 textoEvento textoEventoCompleto">';
					echo '<label class="lugarEventoEtiqueta">¿Dónde? </label>';
					echo '<p class="lugarEventos">';
					echo $eventos['lugar'];
					echo '</p><br>';
					echo '<label class="lugarEventoEtiqueta">¿Cuándo? </label>';
					echo '<p>';
					$fechaInicio = strtotime($eventos['fechaInicio']);
					$fechaFin = strtotime($eventos['fechaFin']);
					echo date('j/m/Y', $fechaInicio);
					echo ' - ';
					echo date('j/m/Y', $fechaFin);
					echo '</p><br>';
					echo '<label class="lugarEventoEtiqueta">Descripción: </label>';
					echo '<p>';
					echo $eventos['descripcion'];
					echo '</p>';
					echo '</div>';
					echo '</div>';
				}

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
