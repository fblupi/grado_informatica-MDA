<?php

include_once "../libs/myLib.php";

$concepto = $_POST['concepto'];
$descripcion = $_POST['descripcion'];
$precioCompra = $_POST['precioCompra']; // importe en "Cuenta"
$cantidad = $_POST['cantidad'];
$precioVenta = $_POST['precioVenta'];
$evento = $_POST['evento'];
$tipo = 0;
$fecha = date("Y/m/d H:i:s");

if (!empty($concepto) && !empty($descripcion) && !empty($precioCompra) &&!empty($cantidad) &&
    !empty($precioVenta) && !empty($evento) && !empty($fecha)) {
  $conexion = dbConnect();
  $sqlCuenta = "INSERT INTO Cuenta (concepto, importe, descripcion, cantidad, evento, tipo, fecha)
                VALUES ('$concepto', $precioCompra*$cantidad, '$descripcion', 1, '$evento', '$tipo', '$fecha');";
  $sqlProducto = "INSERT INTO Producto (nombre, precioCompra, precioVenta, cantidad, evento)
                  VALUES ('$concepto', '$precioCompra', '$precioVenta', $cantidad, '$evento');";
  $resultadoCuenta = mysqli_query($conexion, $sqlCuenta);
  $resultadoProducto = mysqli_query($conexion, $sqlProducto);

  if ($resultadoCuenta) {
    if ($resultadoProducto) {
			mysqli_close($conexion);
      salir("La inversión se ha introducido correctamente", 0);
    } else {
    	mysqli_close($conexion);
      salir("Error introduciendo la inversión. No se pudo realizar la operación: " . $sqlProducto . "<br>" . mysql_error(), -1);
    }
  } else {
	   mysqli_close($conexion);
    salir("Error introduciendo la inversión. No se pudo realizar la operación: " . $sqlCuenta . "<br>" . mysql_error(), -1);
  }
} else {
  salir("No se ha podido introducir una inversión con esos datos", -1);
}


?>
