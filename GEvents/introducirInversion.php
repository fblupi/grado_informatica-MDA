<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
<section id="divInicioSesion" class="divInicioSesion">
<article>
	<form class="form-signin" method="POST" id="formularioIntroducirInversion" name="formularioIntroducirInversion" action="" data-toggle="validator" enctype="multipart/form-data">
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
					<a type="button" class="btn btn-primary inicioSesion btnVolver" onClick="history.go(-1);return true;">Volver</a>
			</div>
		</form>
</article>
</section>
</body>

<?php include 'footer.php'; ?>
