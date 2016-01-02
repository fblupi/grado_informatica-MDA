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
      <article>
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
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo 'Panel de control <small class="tituloGestionEvento">('.$eventos['nombre'].')</small>';
					echo '<hr></h1>';
					echo '<div class="row">';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<h2>Contabilidad</h2>';
					echo '<a href="introducirIngreso.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir ingreso';
					echo '</a>';
					echo '<a href="introducirGasto.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir gasto';
					echo '</a>';
					echo '<a href="introducirInversion.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir inversión';
					echo '</a>';
					echo '<a href="introducirDonacion.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir donación';
					echo '</a>';
					echo '<a href="introducirPatrocinador.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir patrocinador';
					echo '</a>';
					echo '<a href="consultarBalance.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Consultar balance';
					echo '</a>';
					echo '<a href="consultarBeneficios.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Consultar estimación de beneficios';
					echo '</a>';
					echo '<a href="estimarBeneficio.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Estimar beneficio de inversión';
					echo '</a>';
					echo '</div>';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<h2>Evento</h2>';
					echo '<a href="editarEvento.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Editar evento';
					echo '</a>';
					echo '<h2>Personal</h2>';
					echo '<a href="gestionarOrganizadores.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Gestionar organizadores';
					echo '</a>';
					echo '<h2>Actividades</h2>';
					echo '<a href="gestionarActividades.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Gestionar actividades';
					echo '</a>';
					echo '</div>';
					echo '<div class="col-md-4 col-lg-4">';
					echo '<h2>Inventario</h2>';
					echo '<a href="introducirRecurso.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Introducir recurso';
					echo '</a>';
					echo '<a href="distribuirRecurso.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Distribuir recurso';
					echo '</a>';
					echo '<a href="anotarVenta.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Anotar venta';
					echo '</a>';
					echo '<a href="consultarInventario.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Consultar inventario';
					echo '</a>';
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
