<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Consultar estimación de beneficios</h1>
      <article>
      <div class="row">
			<div class="col-md-4 col-lg-4">
      <span class="consultarBeneficiosInfo">* Ganancias si se vendiese todo en lo que se ha invertido</span>
      </div>
      </div>
			<div class="row consultarBeneficios">
			<div class="col-md-4 col-lg-4">
        <table class="table table-hover">
          <tr><td>Gastos</td><td></td></tr>
          <tr><td>Ingresos</td><td></td></tr>
          <tr><td>Balance</td><td></td></tr>
        </table>
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
