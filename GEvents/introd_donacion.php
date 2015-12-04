<?php
	$datos=$_POST['concepto'];
	$descripcion=$_POST['descripcion'];
	$cantidad=$_POST['cantidad'];
	$tipo=$_POST['tipo'];
	$fecha=date("d")."/".date("m")."/".date("y");
	$importe=$_POST['importe'];
	$id_evento=$_POST['id_evento'];

	

	if(!empty($concepto) && !empty($descripcion) && !empty($id_evento) && !empty($cantidad) && !empty($importe)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		//Si es de tipo monetaria
		if(strcmp($tipo,"dmonetaria"==0){
			$query="INSERT INTO cuenta( concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES ('$concepto','$importe','$descripcion','$cantidad','$id_evento','$tipo','$fecha');";
			$resultado = mysqli_query($conexion, $sql);

		
		}
		//Si es de tipo producto
		if(strcmp($tipo,"dproducto")==0){
				$query="INSERT INTO cuenta( concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES ('$concepto','$importe','$descripcion','$cantidad','$id_evento','$tipo','$fecha');";
				$resultado = mysqli_query($conexion, $query);
				//Añadimos el producto al evento 
				$query2="INSERT INTO producto(nombre, precioCompra, precioVenta, cantidad, evento) VALUES ('',0,'$importe','$cantidad','$id_evento');";
				$resultado = mysqli_query($conexion, $query2);
		}

		//Cierro conexión 
		mysqli_close($conexion);		
	}// 
	

?>