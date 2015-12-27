<?php
	$id_actividad=$_POST['id_actividad'];
	

	if(!empty($id_actividad)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		$sql="UPDATE actividad SET estado='cancelada' WHERE id='$id_actividad';";
		$resultado = mysqli_query($conexion, $sql);
		//Cierro conexión 
		mysqli_close($conexion);		
	}// 
	

?>