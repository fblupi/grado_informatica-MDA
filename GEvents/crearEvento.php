<?php

include_once "dbConnect.php";

//inserto en evento, cojo su id e inserto en organizador

if (isset($_POST['nombre']) && isset($_POST['dscripcion']) && isset($_POST['lugar']) &&
        isset($_POST['fechaInicio']) && isset($_POST['fechaFin']) && isset($_POST['imagen'])) {

    $idUsuario = $_SESSION["idUsuario"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $lugar = $_POST["lugar"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $imagen = $_POST['imagen'];

    $conexion = dbConnect();

    $sql = "INSERT INTO Evento (nombre, descripcion, lugar, fechaInicio, fechaFin, imagen)
VALUES ('" + $nombre + "', '" + $descripcion + "', '" + $lugar + "', '" +
            $fechaInicio + "', '" + $fechaFin + "', '" + $imagen + "')";

    // Ejecutamos el código SQL
    $resultado = mysql_query($sql, $conexion);

    if ($resultado == FALSE) {
        echo '<br>ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error();
    } else {


        $sql = "SELECT id FROM Evento WHERE nombre='" + $nombre + "' AND descripcion='" +
        $descripcion + "' AND lugar='" + $lugar + "' AND fechaInicio='" +
        $fechaInicio + "' AND fechaFin='" + $fechaFin + "' AND imagen='" + $imagen + "'";
    }

    mysql_close($conexion);
}
?>