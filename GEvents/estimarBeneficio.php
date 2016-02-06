<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Estimar beneficio</h1>
      <article>
      <div class="row">
			<div class="col-md-4 col-lg-4">
        <form class="form-signin" method="POST" id="formularioEstimarBeneficio" name="formularioEstimarBeneficio" action="">
      			<div class="form-group">
      				<label>Precio de compra (€)</label>
      				<input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="10" maxlength="4">
      			</div>
            <div class="form-group">
      				<label>Precio de venta (€)</label>
      				<input type="text" class="form-control" id="precioVenta" name="precioVenta" placeholder="15" maxlength="4">
      			</div>
            <div class="form-group">
              <label>Cantidad</label>
              <input type="number" class="form-control" id="cantidad" min="0" placeholder="1000" name="cantidad">
            </div>
    		    <div class="form-group">
      				<label>Porcentaje de venta (%)</label>
              <input type="text" class="form-control" id="porcentaje" name="porcentaje" placeholder="100" maxlength="4">
      			</div>
            <div class="form-group">
              <label>Beneficio estimado (€)</label>
              <div class="beneficioEstimado"></div>
            </div>
      		</form>
      </div>
      </div>
			<div class="row">
			<div class="col-md-4 col-lg-4">
				<a type="button" class="btn btn-primary" onClick="history.go(-1);return true;">Volver</a>
			</div>
			</div>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
