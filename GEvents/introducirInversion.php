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
  <h1>Introducir inversión</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioIntroducirInversion" name="formularioIntroducirInversion" action="scripts/introducirInversion.php" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" class="form-control" id="evento" name="evento" value="<?= $idEvento; ?>">

			<div class="form-group has-feedback">
				<label>Concepto</label>
				<input type="text" class="form-control" id="concepto" name="concepto" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del gasto" required></textarea>
			</div>
			<div class="form-group">
				<label>Precio de compra (€)</label>
				<input type="text" class="form-control" id="precioCompra" name="precioCompra" required>
			</div>
      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
      </div>
      <div class="form-group">
				<label>Precio de venta (€)</label>
				<input type="text" class="form-control" id="precioVenta" name="precioVenta" required>
			</div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Introducir</button>
					<a class="btn btn-primary inicioSesion btnVolver" href="gestionarEvento.php?i=<?= $idEvento ?>">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
