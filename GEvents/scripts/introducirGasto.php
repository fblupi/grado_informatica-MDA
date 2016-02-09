<?php

include_once "../libs/myLib.php";

//introducir un registro en Cuenta sobre un evento con importe negativo (gasto)

$concepto = $_POST["concepto"];
$importe = $_POST["importe"];
$descripcion = $_POST["descripcion"];
$cantidad = $_POST["cantidad"];
$evento = $_POST["evento"];
$tipo = 0;
$fecha = date('Y/m/d H:i:s');

if (!empty($concepto) && !empty($importe) && !empty($descripcion) &&
        !empty($cantidad) && !empty($evento) && !empty($fecha)) {

    //realizo la conexión
    $conexion = dbConnect();

    //inserto los datos introducidos
    $sql = "INSERT INTO Cuenta (concepto, importe, descripcion, cantidad, evento, tipo, fecha)
                VALUES ('$concepto', $importe, '$descripcion', $cantidad, '$evento', $tipo, '$fecha')";

    //almaceno en $resultado
    $resultado = mysqli_query($conexion, $sql);

    //si hay error al insertar el gasto, muestro el error y salgo
    if (!$resultado) {
    		mysqli_close($conexion);
        salir('ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1);

    //si no hay error, muestro que se ha insertado correctamente
    } else {
    		mysqli_close($conexion);
        salir3('Se insertó el gasto correctamente', '../consultarBalance.php?i='.$evento);
    }
}else{
  salir('ERROR: Faltan datos.');
}

//cierra la conexión, muestra el resultado y devuelve el control a la página desde la que se referencia

?>
