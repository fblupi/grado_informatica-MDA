<?php

include_once "dbConnect.php";

$concepto = $_POST['concepto'];
$descripcion = $_POST['descripcion'];
$precioCompra = $_POST['precioCompra']; // importe en "Cuenta"
$cantidad = $_POST['cantidad'];
$precioVenta = $_POST['precioVenta'];
$evento = $_GET['evento'];
$tipo = "Gasto";
$fecha = date("d/m/Y");

if (!empty($concepto) && !empty($descripcion) && !empty($precioCompra) &&!empty($cantidad) &&
    !empty($precioVenta) && !empty($evento) && !empty($tipo) && !empty($fecha)) {
  $conexion = dbConnect();
  $sqlCuenta = "INSERT INTO Cuenta (concepto, importe, descripcion, cantidad, evento, tipo, fecha)
                VALUES ('" + $concepto + "', '" + ($importe * (-1)) + "', '" + $descripcion + "', '" +
                $cantidad + "', '" + $evento + "', '" + $tipo + "', '" + $fecha + "');";
  $sqlProducto = "INSERT INTO Producto (nombre, precioCompra, precioVenta, cantidad, evento)
                  VALUES ('" + $concepto + "', '" + $precioCompra + "', '" + $precioVenta + "', '" + $cantidad + "', '" + $evento + "');";
  $resultadoCuenta = mysqli_query($conexion, $sqlCuenta);
  $resultadoProducto = mysqli_query($conexion, $sqlProducto);
  mysqli_close($conexion);
  if ($resultadoCuenta) {
    if ($resultadoProducto) {
      salir("La inversión se ha introducido correctamente", 0);
    } else {
      salir("Error introduciendo la inversión. No se pudo realizar la operación: " . $sqlProducto . "<br>" . mysql_error(), -1);
    }
  } else {
    salir("Error introduciendo la inversión. No se pudo realizar la operación: " . $sqlCuenta . "<br>" . mysql_error(), -1);
  }
} else {
  salir("No se ha podido introducir una inversión con esos datos", -1);
}

function salir($str, $code) {
  echo '<script>
    alert("' . $str . '");
    location.href= " ' . $_SERVER['HTTP_REFERER'] . '";
  </script>';
  return $code;
}

?>
