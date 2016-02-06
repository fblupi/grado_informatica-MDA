<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}else{
	header('Location: eventosUsuario.php'); //no se pasa ningun evento por parametro
}
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}else{
	$idUsuario = $_SESSION['idUsuario'];
}

?>
<body>
  <section>

       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT * FROM organizador WHERE evento = '$idEvento' AND usuario = '$idUsuario';";
				$resultado = mysqli_query($conn, $sql);

				if(mysqli_num_rows($resultado) == 0){ //no es organizador
					header('Location: eventosUsuario.php');
				}

				$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);

        $sql2 = "SELECT * FROM actividad WHERE evento = '$idEvento';";
        $resultado2 = mysqli_query($conn, $sql2);

				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo 'Gestionar actividades <small class="tituloGestionEvento">('.$eventos['nombre'].')</small>';
					echo '</h1>';
					echo '<article>';
					echo '<div class="row">';
					echo '<div class="col-md-12 col-lg-12">';
          echo '<a class="btn btn-success btnCrearActividad" href="crearActividad.php?idEvento='.$idEvento.'">Crear actividad</a>';
          echo '<table class="table table-hover">';
          echo '<thead>';
          echo '<th>Actividad</th>';
          echo '<th>Fecha</th>';
          echo '<th>Acciones</th>';
          echo '</thead>';
          echo '<tbody>';
          while ($actividades = mysqli_fetch_assoc($resultado2)) {
            $idActividad = $actividades['id'];
            echo '<tr>';
            echo '<td>';
            echo $actividades['nombre'];
            echo '</td>';
            echo '<td>';
            echo date('j F, Y', strtotime($actividades['fecha']));
            echo '</td>';
            echo '<td>';
            echo '<a class="btn btn-warning btnGestionarActividades" href="modificarActividad.php?idEvento='.$idEvento.'&idActividad='.$idActividad.'">Modificar</a>';
            echo '<a class="btn btn-danger btnGestionarActividades" href="cancelarActividad.php?idEvento='.$idEvento.'&idActividad='.$idActividad.'">Cancelar</a>';
            echo '</td>';
            echo '</tr>';

          }
          echo '</tbody>';
          echo '</table>';
          echo '</div>';
          echo '</div>';
					echo '<div class="row">';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<a type="button" class="btn btn-primary btnGestionEvento" onClick="history.go(-1);return true;">Volver</a>';
					echo '</div>';
					echo '</div>';
				}

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
