<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
<section>
  <h1>Introducir recurso</h1>
<article>
	<form class="form-signin form-horizontal" method="POST" id="formularioIntroducirRecurso" name="formularioIntroducirRecurso" action="scripts/introducirRecurso.php" data-toggle="validator" enctype="multipart/form-data">
			<div class="form-group has-feedback">
				<label>Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Sudaderas" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Precio de compra (€)</label>
        <input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="10" required>
			</div>
      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" id="importe" name="importe" min="1" placeholder="200" required>
      </div>
      <div class="form-group">
  				<label>Precio de venta (€)</label>
          <input type="text" class="form-control" id="precioVenta" name="precioVenta" placeholder="20" required>
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
