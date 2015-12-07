<?php
if(!isset($_SESSION['idUsuario'])){
  session_start();
}
include_once "../libs/myLib.php";

//inserto en evento, cojo su id e inserto en Organizador la pareja usuario-evento

$idUsuario = $_SESSION["idUsuario"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$lugar = $_POST["lugar"];
if (!empty($_POST['fechaInicio'])) {
$fechaInicio = date('Y-m-d', strtotime($_POST['fechaInicio']));
}
if (!empty($_POST['fechaInicio'])) {
$fechaFin = date('Y-m-d', strtotime($_POST['fechaFin']));
}
if(!empty($_POST['imagen'])){
  $imagen = $_POST['imagen'];
}else{
  $imagen = 'assets/img/evento.png';
}

//si las variables no están vacías
if (!empty($idUsuario) && !empty($nombre) && !empty($descripcion) &&
        !empty($lugar) && !empty($fechaInicio) && !empty($fechaFin) && !empty($imagen)) {

    //realizo la conexión
    $conexion = dbConnect();

    //inserto los datos introducidos
    $sql = "INSERT INTO Evento (nombre, descripcion, lugar, fechaInicio, fechaFin, imagen)
                VALUES ('$nombre', '$descripcion', '$lugar', '$fechaInicio', '$fechaFin', '$imagen')";

    //si hay error al insertar el evento, muestro el error y salgo
    if (!mysqli_query($conexion, $sql)) {
        salir2('1 ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1, 0);

    //si no hay error, intento coger su id
    } else {
        $sql = "SELECT id FROM Evento WHERE nombre='$nombre' AND descripcion='$descripcion' AND lugar='$lugar' AND fechaInicio='$fechaInicio' AND fechaFin='$fechaFin' AND imagen='$imagen'";

        //almaceno el estado de la consulta en $resultado
        $resultado = mysqli_query($conexion, $sql);

        //si hay error al intentar coger el id, muestro el error y salgo
        if (!$resultado) {
            salir2('2 ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1, 0);

        //si no hay error, inserto la pareja usuario-evento en la tabla Organizador
        } else {
            $registro = mysqli_fetch_assoc($resultado);
            $idEvento = $registro['id'];
            $sql = "INSERT INTO Organizador (usuario, evento) VALUES ('$idUsuario', '$idEvento');";

            //si hay error lo muestro
            if (!mysqli_query($conexion, $sql)) {
							  mysqli_close($conexion);
                salir2('3 ERROR: No se pudo realizar la operación: ' . $sql . '<br>' . mysql_error(), -1, 0);

            //si se llega hasta aquí el evento se ha creado correctamente
          } else {
							  mysqli_close($conexion);
                salir2('Se creó el evento correctamente', 0, 'eventosUsuario');
            }
        }
    }
}

//cierra la conexión, muestra el resultado y devuelve el control a la página desde la que se referencia

?>
