<?php include 'header.php';
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}
?>
<body>
  <section>
      <h1>Balance</h1>
      <article>
        <?php
        	$id_evento=$_GET['i'];
        	if(!empty($id_evento)){
        		//Realizo la conexión si tenemos todos los datos necesarios
            include_once "libs/myLib.php";
            $conexion = dbConnect();
        		$gasto="SELECT SUM(importe) AS gasto FROM Cuenta WHERE tipo='0' AND evento='$id_evento';";
        		$resultadogasto = mysqli_query($conexion, $gasto);
            $gastos = mysqli_fetch_assoc($resultadogasto);
        		$beneficio="SELECT SUM(importe) AS beneficio FROM Cuenta WHERE tipo='1' AND evento='$id_evento';";
        		$resultadobenefi = mysqli_query($conexion, $beneficio);
            $beneficios = mysqli_fetch_assoc($resultadobenefi);
        		?>
            <div class="row">
            <div class="col-md-4 col-lg-4">
            <h2>Total</h2>
        		<table class="table table-hover">
        		<tr>
        		<td>Gastos</td><td><?php
            if($gastos['gasto']==NULL){
              echo '0';
            }else{
              echo $gastos['gasto'];
            }
            ?> €</td>
        		</tr>
        		<tr>
        		<td>Ingresos</td><td><?php
            if($beneficios['beneficio']==NULL){
              echo '0';
            }else{
              echo $beneficios['beneficio'];
            }
            ?> €</td>
        		</tr>
        		<tr class="balance" <?php if($beneficios['beneficio']-$gastos['gasto'] < 0){
              echo 'style="color: red;"';
            }else{
              echo 'style="color: green;"';
            } ?>>
        		<td>Balance</td><td><?php echo $beneficios['beneficio']-$gastos['gasto'] ?> €</td>
        		</tr>
        		</table>
						<a href="mostrarBalanceDetallado.php?i=<?php echo $id_evento; ?>" class="verBalanceDetallado">Ver balance detallado</a>
            </div>
            <div class="col-md-4 col-lg-4">
            </div>
            <div class="col-md-4 col-lg-4">
            <h2>Estimado</h2>
        		<table class="table table-hover">
        		<tr>
            <td>Gastos</td><td><?php
            if($gastos['gasto']==NULL){
              echo '0';
            }else{
              echo $gastos['gasto'];
            }
            ?> €</td>
            </tr>
        		<tr>
            <td>Ingresos estimados <i class="fa fa-info-circle infoBalancei"></i><div class="infoBalance"><span>Ingresos estimados si se venden todos los productos</span></div></td><td><?php
            if($beneficios['beneficio']==NULL){
              echo '0';
            }else{
              echo $beneficios['beneficio'];
            }
            ?> €</td>
        		</tr>
            <tr class="balance" <?php if($beneficios['beneficio']-$gastos['gasto'] < 0){
              echo 'style="color: red;"';
            }else{
              echo 'style="color: green;"';
            } ?>>
        		<td>Balance</td><td><?php echo $beneficios['beneficio']-$gastos['gasto'] ?> €</td>
        		</tr>
        		</table>
            </div>
            </div>
        		<?php
        		//Cierro conexión
        		mysqli_close($conexion);
        	}//
        ?>
			<div class="row">
			<div class="col-md-4 col-lg-4">
				<a type="button" class="btn btn-primary" onClick="history.go(-1);return true;">Volver</a>
			</div>
			</div>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
