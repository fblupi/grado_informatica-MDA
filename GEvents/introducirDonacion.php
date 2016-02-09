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
  <h1>Introducir donación</h1>
<article>
  <div class="row">
    <div class="col-md-6 col-lg-6">
      <h2>Monetaria</h2>
	<form class="form-signin form-horizontal" method="POST" id="formularioIntroducirInversion" name="formularioIntroducirInversion" action="scripts/introd_donacion.php" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?= $idEvento ?>">
		<input type="hidden" class="form-control" id="tipo" name="tipo" value="dmonetaria">
			<div class="form-group has-feedback">
				<label>Concepto</label>
				<input type="text" class="form-control" id="concepto" name="concepto" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del gasto" required></textarea>
			</div>
			<div class="form-group">
				<label>Importe (€)</label>
				<input type="text" class="form-control" id="importe" name="importe" required>
			</div>
      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
      </div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Introducir</button>
			</div>
		</form>
  </div>
  <div class="col-md-6 col-lg-6">
    <h2>Producto</h2>
    <form class="form-signin" method="POST" id="formularioIntroducirInversion" name="formularioIntroducirInversion" action="scripts/introd_donacion.php" data-toggle="validator" enctype="multipart/form-data">
			<input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?= $idEvento ?>">

			<input type="hidden" class="form-control" id="tipo" name="tipo" value="dproducto">
				<div class="form-group has-feedback">
          <label>Concepto</label>
          <input type="text" class="form-control" id="concepto" name="concepto" maxlength="45" required>
        </div>
      <div class="form-group">
          <label>Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Breve descripción del gasto" required></textarea>
        </div>
        <div class="form-group">
          <label>Precio de venta (€)</label>
          <input type="text" class="form-control" id="importe" name="importe" required>
        </div>
        <div class="form-group">
          <label>Cantidad</label>
          <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success inicioSesion btnCrear">Introducir</button>
        </div>
      </form>
    </div>
  </div>
  <a class="btn btn-primary inicioSesion btnVolver" href="gestionarEvento.php?i=<?= $idEvento ?>">Volver</a>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
