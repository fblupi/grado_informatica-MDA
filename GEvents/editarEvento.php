<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
if(!isset($_SESSION['login'])){
  echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>

       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT * FROM Evento WHERE id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo 'Editar evento <small class="tituloGestionEvento">('.$eventos['nombre'].')</small>';
					echo '</h1>';
					echo '<article>';
          echo '<form class="formularioEditarEvento" id="formularioEditarEvento" method="POST" action="" role="form" enctype="multipart/form-data">';
          echo '<div class="form-group">';
					echo '<label>Nombre del evento</label>';
					echo '<input type="text" class="form-control" id="nombre" name="nombre" value="';
					echo $eventos['nombre'];
					echo '" maxlength="45" placeholder="Feria de Sevilla 2016" required>';
					echo '</div>';
          echo '<div class="form-group">';
					echo '<label>Descripción: </label>';
					echo '<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del evento" required>';
          echo $eventos['descripcion'];
          echo '</textarea>';
					echo '</div>';
          echo '<div class="form-group">';
    			echo '<label>Lugar</label>';
    			echo '<input type="text" maxlength="45" class="form-control" id="lugar" name="lugar" placeholder="Sevilla" value="';
          echo $eventos['lugar'];
          echo '" required>';
    			echo '</div>';
          echo '<div class="form-group">';
      		echo '<label>Fecha de inicio</label>';
      		$fechaHoy = date('Y-m-d');
      		echo '<input type="date" class="form-control" id="fechaInicio" min="'.$fechaHoy.'" name="fechaInicio" placeholder="20-08-2016" value="';
          echo date('d-m-Y', strtotime($eventos['fechaInicio']));
          echo '" required>';
      		echo '</div>';
      		echo '<div class="form-group">';
      		echo '<label>Fecha de fin</label>';
          echo '<input type="date" class="form-control" id="fechaFin" min="'.$fechaHoy.'" name="fechaFin" placeholder="28-08-2016" value="';
          echo date('d-m-Y', strtotime($eventos['fechaFin']));
          echo '" required>';
      		echo '</div>';
      		echo '<div class="form-group">';
      		echo '<label>Imagen del evento</label>';
      		echo '<input type="file" class="form-control" id="imagen" name="imagen">';
          echo '<div class="form-group">';
          echo '<div class="form-group">';
          echo '<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>';
    			echo '					<button type="submit" class="btn btn-success inicioSesion btnCrear">Editar</button>';
          echo '<div class="form-group">';
    		  echo '</form>';
        }

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
