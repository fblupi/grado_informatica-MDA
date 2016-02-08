<?php

include_once "../libs/myLib.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
    session_start();
}

	$concepto=$_POST['concepto'];
	$descripcion=$_POST['descripcion'];
	$cantidad=$_POST['cantidad'];
	$tipo = 1;
	$fecha=date("Y/m/d H:i:s");
	$importe=$_POST['importe'];
	$evento=$_POST['evento'];
	$opcion=$_POST['tipo']; //será un campo oculto q variará depende el formulario (Monetaria/Producto)



	if(!empty($concepto) && !empty($descripcion) && !empty($evento) && !empty($cantidad) && !empty($importe)){
		//Realizo la conexión si tenemos todos los datos necesarios
		$conexion = dbConnect();
		if($opcion == "Monetaria"){ //si es monetaria
			$query="INSERT INTO Cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES " .
			"('". $concepto . "','" . $importe . "','" . $descripcion . "'," . $cantidad . "," . $evento . ",'" . $tipo . "','" . $fecha . "');";
      $sql = "INSERT INTO Patrocinador(nombre, idEvento) VALUES ('$concepto', '$evento');";
      $resultado = mysqli_query($conexion, $query);
      $resultado2 = mysqli_query($conexion, $sql);
		} else if($opcion == "Producto"){
      $producto = $_POST['producto']; //si es producto
			$query="INSERT INTO Cuenta(concepto, importe, descripcion, cantidad, evento, tipo, fecha) VALUES " .
			"('". $concepto . "','" . 0 . "','" . $descripcion . "'," . $cantidad . "," . $evento . ",'" . $tipo . "','" . $fecha . "');";
      $sql = "INSERT INTO Patrocinador(nombre, idEvento) VALUES ('$concepto', '$evento');";
      $resultado2 = mysqli_query($conexion, $sql);
      $resultado = mysqli_query($conexion, $query);
			//Añadimos el producto al evento
			$query="INSERT INTO Producto(nombre, precioCompra, precioVenta, cantidad, evento) VALUES ('$producto.' '.$concepto', 0, $importe, $cantidad, $evento);";
			$resultado = mysqli_query($conexion, $query);
		}

		//Cierro conexión
		mysqli_close($conexion);
		if($resultado){
			salir("Patrocinador introducido correctamente", 0);
		}else{
			salir("No se ha podido introducir al patrocinador", -1);
		}
	}//


?>
