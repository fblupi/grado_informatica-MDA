<?php

include_once "dbConnect.php"


$login = "";
$correo = "";
$pass = "";
$nombre = "";
$apellidos = "";
$direccion = "";
$telefono = "";
$localizacion = "";
$fechaNacimiento = null;
$imagen = "";

$conexion = dbConnect();
$sql = "INSERT INTO Usuario (login, correo, pass, nombre, apellidos, direccion,
	telefono, localizacion, fechaNacimiento, imagen) VALUES " . $login . ", " .
	$correo . ", " . $pass . ", " . $nombre . ", " . $apellidos . ", " . $direccion . ", "
	. $telefono . ", " . $localizacion . ", " . $fechaNacimiento . ", " . $imagen . ";";

$resultado = mysqli_query($sql, $conexion);