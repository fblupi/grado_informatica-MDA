<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Inventario<hr></h1>
      <article>
      <div class="row">
        <table class="table table-hover">
          <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio de compra (€)</th>
            <th>Precio de venta (€)</th>
          </thead>
          <?php
          include_once 'libs/myLib.php';
          $conn = dbConnect();
          $idEvento = $_GET['i'];
          $sql = "SELECT * FROM producto WHERE evento = $idEvento;";
          $resultado = mysqli_query($conn, $sql);

          while($cuenta = mysqli_fetch_assoc($resultado)){
            echo '<tr>';
            echo '<td>';
            echo $cuenta['nombre'];
            echo '</td>';
            echo '<td>';
            echo $cuenta['cantidad'];
            echo '</td>';
            echo '<td>';
            echo $cuenta['precioCompra'];
            echo '</td>';
            echo '<td>';
            echo $cuenta['precioVenta'];
            echo '</td>';
            echo '</tr>';
          }
          ?>
        </table>
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
