<?php
	$id_evento=$_POST['id_evento'];

	

	if(!empty($id_evento)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		$gasto="SELECT SUM(importe) FROM cuenta WHERE tipo='gasto';";
		$resultadogasto = mysqli_query($conexion, $sql);
		$beneficio="SELECT SUM(importe) FROM cuenta WHERE tipo='beneficio';";
		$resultadobenefi = mysqli_query($conexion, $sql);
		?>
		<table>
		<tr>
		<td>Gastos</td><td><?php echo $resultadogasto ?></td>
		</tr>	
		<tr>
		<td>Ingresos</td><td><?php echo $resultadobenefi ?></td>
		</tr>
		<tr>
		<td>Balance</td><td><?php echo $resultadogasto-$resultadogasto ?></td>
		</tr>
		</table>


		<?php
		//Cierro conexión 
		mysqli_close($conexion);		
	}// 
	

?>