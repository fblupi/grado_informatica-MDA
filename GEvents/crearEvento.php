<?php

include_once "dbConnect.php";

//inserto en evento, cojo su id e inserto en organizador la pareja usuario-evento

if (isset($_SESSION['idUsuario']) && isset($_POST['nombre']) &&
        isset($_POST['dscripcion']) && isset($_POST['lugar']) &&
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


    $resultado = mysql_query($sql, $conexion);

    if ($resultado == FALSE) {
        echo '<br>ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error();
    } else {
        $sql = "SELECT id FROM Evento WHERE nombre='" + $nombre + "' AND descripcion='" +
                $descripcion + "' AND lugar='" + $lugar + "' AND fechaInicio='" +
                $fechaInicio + "' AND fechaFin='" + $fechaFin + "' AND imagen='" + $imagen + "'";

        $resultado = mysql_query($sql, $conexion);

        if ($resultado == FALSE) {
            echo '<br>ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error();
        } else {
            $registro = mysql_fetch_array($resultado);

            $sql = "INSERT INTO Organizador (usuario, evento) VALUES ('" + $idUsuario + "', '" + $registro['id'] + "')";

            $resultado = mysql_query($sql, $conexion);

            if ($resultado == FALSE) {
                echo '<br>ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error();
            }
        }
    }

    mysql_close($conexion);
}
?>