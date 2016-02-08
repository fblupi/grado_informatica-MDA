<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
?>
<body>
<section>
  <h1>Introducir gasto</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioIntroducirGasto" name="formularioIntroducirGasto" action="scripts/introducirGasto.php" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" class="form-control" id="evento" name="evento" value="<?= $idEvento; ?>">

			<div class="form-group has-feedback">
				<label>Concepto</label>
				<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Comprar..." maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del gasto" required></textarea>
			</div>
			<div class="form-group">
				<label>Importe (€)</label>
				<input type="number" class="form-control" id="importe" name="importe" required>
			</div>
      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
      </div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Introducir</button>
					<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
