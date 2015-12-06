<?php

include_once "../libs/myLib.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
    session_start();
}

	$concepto=$_POST['concepto'];
	$descripcion=$_POST['descripcion'];
	$cantidad=$_POST['cantidad'];
	$tipo="Patrocinio";
	$fecha=date("d/m/Y");
	$importe=$_POST['importe'];
	$evento=$_GET['evento'];
	$opcion=$_POST['opcion']; //será un campo oculto q variará depende el formulario (Monetaria/Producto)

	

	if(!empty($concepto) && !empty($descripcion) && !empty($evento) && !empty($cantidad) && !empty($importe)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		//Si es monetaria
		if(strcmp($opcion,"Monetaria"==0){
			$query="INSERT INTO cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES " .
			"('". $concepto . "','" . $importe . "','" . $descripcion . "'," . $cantidad . "," . $evento . ",'" . $tipo . "','" . $fecha . "');";
			$resultado = mysqli_query($conexion, $sql);
		}
		//Si es producto
		if(strcmp($opcion,"Producto")==0){
			$query="INSERT INTO cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES " .
			"('". $concepto . "','" . $importe . "','" . $descripcion . "'," . $cantidad . "," . $evento . ",'" . $tipo . "','" . $fecha . "');";
			$resultado = mysqli_query($conexion, $sql);
			//Añadimos el producto al evento 
			$query="INSERT INTO producto(nombre, precioCompra, precioVenta, cantidad, evento) VALUES " .
			"('". $concepto . "', 0,'" . $importe . "'," . $cantidad . "," . $evento . "');";
			$resultado = mysqli_query($conexion, $sql);
		}

		//Cierro conexión 
		mysqli_close($conexion);		
	}// 
	

?>