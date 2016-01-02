<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
<section>
  <h1>Introducir patrocinador<hr></h1>
<article>
  <div class="row">
    <div class="col-md-6 col-lg-6">
      <h2>Donación monetaria</h2>
	<form class="form-signin" method="POST" id="formularioIntroducirDonacionMonetaria" name="formularioIntroducirDonacionMonetaria" action="scripts/introducirPatrocinadorMonetaria.php" data-toggle="validator" enctype="multipart/form-data">
			<div class="form-group has-feedback">
				<label>Nombre</label>
				<input type="text" class="form-control" id="nombreMonetaria" name="nombreMonetaria" maxlength="45" required>
			</div>
		<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control" id="descripcionMonetaria" name="descripcionMonetaria" rows="5" placeholder="Breve descripción..." required></textarea>
			</div>
			<div class="form-group">
				<label>Importe (€)</label>
				<input type="text" class="form-control" id="importeMonetaria" name="importeMonetaria" required>
			</div>
      <div class="form-group">
        <label>Cantidad</label>
        <input type="number" class="form-control" id="cantidadMonetaria" name="cantidadMonetaria" required>
      </div>
			<div class="form-group">
					<button type="submit" class="btn btn-success inicioSesion btnCrear">Introducir</button>
			</div>
		</form>
  </div>
  <div class="col-md-6 col-lg-6">
    <h2>Donación de producto</h2>
    <form class="form-signin" method="POST" id="formularioIntroducirDonacionProducto" name="formularioIntroducirDonacionProducto" action="scripts/introducirPatrocinadorProducto.php" data-toggle="validator" enctype="multipart/form-data">
        <div class="form-group has-feedback">
          <label>Nombre</label>
          <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" maxlength="45" required>
        </div>
      <div class="form-group">
          <label>Descripción</label>
          <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" rows="5" placeholder="Breve descripción..." required></textarea>
        </div>
        <div class="form-group has-feedback">
          <label>Producto</label>
          <input type="text" class="form-control" id="producto" name="producto" maxlength="45" required>
        </div>
        <div class="form-group">
          <label>Precio de venta (€)</label>
          <input type="text" class="form-control" id="precioCompra" name="precioCompra" required>
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
  <a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
