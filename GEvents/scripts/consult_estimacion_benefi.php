<?php
	$id_evento=$_POST['id_evento'];

	

	if(!empty($id_evento)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		$gasto="SELECT SUM(importe) FROM cuenta WHERE tipo='gasto' AND evento='$id_evento';";
		$resultadogasto = mysqli_query($conexion, $gasto);
		$beneficio="SELECT SUM(importe) FROM cuenta WHERE tipo='beneficio' and evento='$id_evento';";
		$resultadobenefi = mysqli_query($conexion, $beneficio);
		$estimacion="SELECT precioVenta,cantidad FROM producto WHERE evento='$id_evento';";
		$resultado = mysqli_query($conexion, $estimacion);
		$estimado=0;
		//Voy acumulando todo los beneficios estimados de cada articulo.
		while ($row = mysql_fetch_array($resultado)) {
		 	$estimado=$estimado+($row['precioVenta']*$row['cantidad']);
		}
		//Le añado el beneficio actual que tenemos en el evento.
		$estimado=$resultadobenefi+$estimado;
		?>

		<table>
		<tr>
		<td>Gastos</td><td><?php echo $resultadogasto ?></td>
		</tr>	
		<tr>
		<td>Ingresos</td><td><?php echo $estimado ?></td>
		</tr>
		<tr>
		<td>Balance</td><td><?php echo $estimado-$resultadogasto ?></td>
		</tr>
		</table>


		<?php
		//Cierro conexión 
		mysqli_close($conexion);		
	}// 
	

?>