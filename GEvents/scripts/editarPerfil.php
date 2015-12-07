<?php

include_once "../libs/myLib.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
    session_start();
}

$login = $_SESSION['login'];
$nombre = "";
$apellidos = "";
$direccion = "";
$telefono = "";
$localizacion = "";
$fechaNacimiento = null;
$imagen = "assets/img/usuario.png";

if (!empty($_POST['nombre'])) {
	$nombre = $_POST['nombre'];
}
if (!empty($_POST['apellidos'])) {
	$apellidos = $_POST['apellidos'];
}
if (!empty($_POST['direccion'])) {
	$direccion = $_POST['direccion'];
}
if (!empty($_POST['telefono'])) {
	$telefono = $_POST['telefono'];
}
if (!empty($_POST['localizacion'])) {
	$localizacion = $_POST['localizacion'];
}
if (!empty($_POST['fechaNacimiento'])) {
  $fechaNacimiento = date('Y-m-d', strtotime($_POST['fechaNacimiento']));
}
$subidaCorrecta = false;
if(isset($_FILES['imagen']) && $_FILES['imagen']['name']){
	if ($_FILES['imagen']['error'] > 0) {
        salir2("Ha ocurrido un error en la carga de la imagen", -2, 0);
    } else {
        $permitidos = array("image/jpg", "image/jpeg", "image/png");
        $limite_kb = 2048;
        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
            $carpeta = "../assets/img/users";
            if (!is_dir($carpeta)) {
                mkdir($carpeta);
            }
            $formato = "." . split("/", $_FILES['imagen']['type'])[1];
            $nombreArchivo = $login . $formato;
            $ruta = $carpeta . "/" . $nombreArchivo;
            if (!file_exists($ruta)) {
                $subidaCorrecta = @move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                if($subidaCorrecta){
                    $imagen = substr($ruta, 3); //para que quite el ../
                }
            }
        }
    }
}

$conexion = dbConnect();
$sql = "UPDATE usuario SET  nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion',
	telefono = '$telefono', localizacion = '$localizacion', fechaNacimiento = '$fechaNacimiento', imagen = '$imagen' WHERE usuario.login = '$login';";

if(!mysqli_query($conexion, $sql)){
    if($subidaCorrecta){//Si no se ha podido registrar borra la foto en caso de que se haya subido.
        unlink($ruta);
    }
	salir2("Hemos encontrado un problema", -1, 0);
}else{
	salir2("Se han modificado los datos correctamente", 0, "miCuenta");
}
