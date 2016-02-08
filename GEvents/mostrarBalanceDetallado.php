<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Balance detallado</h1>
      <article>
      <div class="row">
        <table class="table table-hover">
          <thead>
            <th>Concepto</th>
            <th>Fecha</th>
            <th>Gasto (€)</th>
            <th>Ingreso (€)</th>
            <th>Balance (€)</th>
          </thead>
          <?php
          include_once 'libs/myLib.php';
          $conn = dbConnect();
          $idEvento = $_GET['i'];
          $sql = "SELECT * FROM Cuenta WHERE evento = $idEvento ORDER BY fecha DESC;";
          $resultado = mysqli_query($conn, $sql);

          while($cuenta = mysqli_fetch_assoc($resultado)){
            echo '<tr>';
            echo '<td>';
            echo $cuenta['concepto'];
            echo '</td>';
            echo '<td>';
            echo date('j F, Y', strtotime($cuenta['fecha']));
            echo '</td>';
            if($cuenta['tipo']==0){
              echo '<td>';
              echo $cuenta['importe'];
              echo '</td>';
              echo '<td></td>';
              echo '<td></td>';
            }else{
              echo '<td></td>';
              echo '<td>';
              echo $cuenta['importe'];
              echo '</td>';
              echo '<td></td>';
            }
            echo '</tr>';
          }

          $gasto="SELECT SUM(importe) AS gasto FROM Cuenta WHERE tipo='0' AND evento='$idEvento';";
          $resultadogasto = mysqli_query($conn, $gasto);
          $gastos = mysqli_fetch_assoc($resultadogasto);
          $beneficio="SELECT SUM(importe) AS beneficio FROM Cuenta WHERE tipo='1' AND evento='$idEvento';";
          $resultadobenefi = mysqli_query($conn, $beneficio);
          $beneficios = mysqli_fetch_assoc($resultadobenefi);

          echo '<tr class="totalBalanceDetallado">';
          echo '<td colspan="2">Total</td>';
          echo '<td>';
          echo $gastos['gasto'];
          echo '</td>';
          echo '<td>';
          echo $beneficios['beneficio'];
          echo '</td>';
          echo '<td ';
          if($beneficios['beneficio']-$gastos['gasto'] < 0){
            echo 'style="color: red;"';
          }else{
            echo 'style="color: green;"';
          }
          echo '>';
          echo $beneficios['beneficio']-$gastos['gasto'];
          echo '</td>';
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
