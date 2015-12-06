<?php

include_once "../libs/myLib.php";

//inserto en evento, cojo su id e inserto en Organizador la pareja usuario-evento

$idUsuario = $_SESSION["idUsuario"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$lugar = $_POST["lugar"];
$fechaInicio = $_POST["fechaInicio"];
$fechaFin = $_POST["fechaFin"];
$imagen = $_POST['imagen'];

//si las variables no están vacías
if (!empty($idUsuario) && !empty($nombre) && !empty($descripcion) &&
        !empty($lugar) && !empty($fechaInicio) && !empty($fechaFin) && !empty($imagen)) {

    //realizo la conexión
    $conexion = dbConnect();

    //inserto los datos introducidos
    $sql = "INSERT INTO Evento (nombre, descripcion, lugar, fechaInicio, fechaFin, imagen)
                VALUES ('" + $nombre + "', '" + $descripcion + "', '" + $lugar + "', '" +
            $fechaInicio + "', '" + $fechaFin + "', '" + $imagen + "')";

    //almaceno el estado de la inserción en $resultado
    $resultado = mysqli_query($conexion, $sql);

    //si hay error al insertar el evento, muestro el error y salgo
    if (!$resultado) {
        salir('ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1);

    //si no hay error, intento coger su id
    } else {
        $sql = "SELECT id FROM Evento WHERE nombre='" + $nombre + "' AND descripcion='" +
                $descripcion + "' AND lugar='" + $lugar + "' AND fechaInicio='" +
                $fechaInicio + "' AND fechaFin='" + $fechaFin + "' AND imagen='" + $imagen + "'";

        //almaceno el estado de la consulta en $resultado
        $resultado = mysqli_query($conexion, $sql);

        //si hay error al intentar coger el id, muestro el error y salgo
        if (!$resultado) {
            salir('ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1);
            
        //si no hay error, inserto la pareja usuario-evento en la tabla Organizador
        } else {
            $registro = mysql_fetch_array($resultado);

            $sql = "INSERT INTO Organizador (usuario, evento) VALUES ('" + $idUsuario + "', '" + $registro['id'] + "')";

            //almaceno el estado de la inserción en $resultado
            $resultado = mysql_query($sql, $conexion);

            //si hay error lo muestro
            if (!$resultado) {
							  mysqli_close($conexion);
                salir('ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1);
            
            //si se llega hasta aquí el evento se ha creado correctamente
            } else 
							  mysqli_close($conexion);
                salir('Se creó el evento correctamente', 0);
            }
        }
    }
}

//cierra la conexión, muestra el resultado y devuelve el control a la página desde la que se referencia

?>