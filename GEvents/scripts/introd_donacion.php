<?php
include_once('../libs/myLib.php');

	$concepto=$_POST['concepto'];
	$descripcion=$_POST['descripcion'];
	$cantidad=$_POST['cantidad'];
	$tipo=$_POST['tipo'];
	$fecha=date('Y/m/d H:i:s');
	$importe=$_POST['importe'];
	$id_evento=$_POST['id_evento'];

	if(!empty($concepto) && !empty($descripcion) && !empty($id_evento) && !empty($cantidad) && !empty($importe)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		//Si es de tipo monetaria
		if($tipo == "dmonetaria"){
			$query="INSERT INTO Cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES ('$concepto',$importe,'$descripcion',$cantidad,'$id_evento', 1 ,'$fecha');";
			$resultado = mysqli_query($conexion, $query);
			salir('Se insertó la donación correctamente', 0);

		}
		//Si es de tipo producto
		if($tipo == "dproducto"){
				$query="INSERT INTO Cuenta( concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES ('$concepto', 0 ,'$descripcion',$cantidad,'$id_evento', 1 ,'$fecha');";
				$resultado = mysqli_query($conexion, $query);
				//Añadimos el producto al evento
				$query2="INSERT INTO Producto(nombre, precioCompra, precioVenta, cantidad, evento) VALUES ('$concepto',0 , $importe,'$cantidad','$id_evento');";
				$resultado = mysqli_query($conexion, $query2);
				salir('Se insertó la donación correctamente', 0);

		}
		//Cierro conexión
		mysqli_close($conexion);
	}//


?>
