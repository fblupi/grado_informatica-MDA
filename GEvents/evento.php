<?php include 'header.php'; 
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
?>
<body>
  <section class="animated zoomIn">
      <article>
       <?php 
				include 'libs/myLib.php';
				$conn = dbConnect();
				
				$sql = "SELECT * FROM Evento WHERE id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo $eventos['nombre'];
					echo '<hr></h1>';
					echo '<div class="contenidoEvento eventoCompleto row">';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<center><img class="evento eventoCompletoImg" src="';
					echo $eventos['imagen'];
					echo '"></center>';
					echo '</div>';
					echo '<div class="col-lg-8 col-md-8 textoEvento textoEventoCompleto">';
					echo '<label class="lugarEventoEtiqueta">Lugar: </label>';
					echo '<p class="lugarEvento">';
					echo $eventos['lugar'];
					echo '</p><br>';
					echo '<label class="lugarEventoEtiqueta">Fecha de inicio: </label>';
					echo '<p>';
					$fechaInicio = strtotime($eventos['fechaInicio']);
					$fechaFin = strtotime($eventos['fechaFin']);
					echo date('j F, Y', $fechaInicio);
					echo '</p><br>';
					echo '<label class="lugarEventoEtiqueta">Fecha fin: </label>';
					echo '<p>';
					echo date('j F, Y', $fechaFin);
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
