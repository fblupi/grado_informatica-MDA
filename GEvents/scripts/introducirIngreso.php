<?php

include_once "../libs/myLib.php";

if (!isset($_SESSION['login'])) {
    session_start();
}

$idEvento = $_GET['idEvento'];
$idProducto = $_POST['idProducto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

if(!empty($idEvento) && !empty($idProducto) && !empty($cantidad) && !empty($precio)){
	//Realizo la conexión si tenemos todos los datos necesarios
	$conexion = dbConnect();
	$sql = "SELECT FROM producto WHERE id=" . $idProducto . ";";
	$resultado = mysqli_query($conexion, $sql);
	if($resultado){
		$producto = mysqli_fetch_assoc($resultado);
		$cantidadAnterior = $producto['cantidad'];
		if($cantidad <= $cantidadAnterior){ //solo puede vender la cantidad que haya registrada en el sistema como máximo
			$sql = "UPDATE producto SET cantidad=" . ($cantidadAnterior-$cantidad) . " WHERE id=" . $idProducto . ";";
			$resultado = mysqli_query($conexion, $sql);
			if($resultado){ //si se ha podido actualizar la cantidad
				
				$fecha=date("d/m/Y");
				$sql="INSERT INTO cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES " .
					"('venta de ". $producto['nombre'] . "','" . $precio . "'," . $cantidad . "," . $idEvento . ",'Ingreso','" . $fecha . "');";
				$resultado = mysqli_query($conexion, $sql);
				if($resultado){
					mysqli_close($conexion);
					salir("Ingreso introducido correctamente!", 0);
				}else{
					$sql = "UPDATE producto SET cantidad=" . $cantidadAnterior . " WHERE id=" . $idProducto . ";";
					mysqli_close($conexion);
					salir("No se ha podido introducir el ingreso", -1);
				}
			}else{
				mysqli_close($conexion);
				salir("No se ha podido actualizar la venta", -1);
			}
		}else{
			mysqli_close($conexion);
			salir("No hay esa cantidad de ese producto", -1);
		}
	}else{
		mysqli_close($conexion);
		salir("No se ha podido consultar el producto", -1);
	}
}