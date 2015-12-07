<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
?>
<body>
  <section>
      <article>
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo 'Panel de control <small class="tituloGestionEvento">('.$eventos['nombre'].')</small>';
					echo '<hr></h1>';
					echo '<h2>Evento</h2>';
					echo '<a href="editarEvento.php?i=';
					echo $idEvento;
					echo '" class="btn btn-default btnGestionEvento">';
					echo 'Editar evento';
					echo '</a>';
					echo '<h2>Personal</h2>';
					echo '<a href="gestionarOrganizadores.php" class="btn btn-default btnGestionEvento">';
					echo 'Gestionar organizadores';
					echo '</a>';
					echo '<h2>Contabilidad</h2>';
					echo '<a href="introducirGasto.php" class="btn btn-default btnGestionEvento">';
					echo 'Introducir gasto';
					echo '</a>';
					echo '<a href="introducirInversion.php" class="btn btn-default btnGestionEvento">';
					echo 'Introducir inversión';
					echo '</a>';
					echo '<a href="introducirDonacion.php" class="btn btn-default btnGestionEvento">';
					echo 'Introducir donación';
					echo '</a>';
					echo '<a href="consultarBalance.php" class="btn btn-default btnGestionEvento">';
					echo 'Consultar balance';
					echo '</a>';
					echo '<a type="button" class="btn btn-primary btnGestionEvento" onClick="history.go(-1);return true;">Volver</a>';
				}

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
