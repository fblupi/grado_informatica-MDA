<?php

include_once "dbConnect.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
    session_start();
}

$login = $_POST['login'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
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
	$fechaNacimiento = $_POST['fechaNacimiento'];
}
if(!empty($_FILES['imagen'])){
	if ($_FILES['imagen']["error"] > 0) {
        salir("Ha ocurrido un error en la carga de la imagen", -2);
    } else {
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 2048;
        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
            $carpeta = "./images/users";
            if (!is_dir($carpeta)) {
                mkdir($carpeta);
            }
            $nombre_archivo = $login . ' - ' . $_FILES['imagen']['name'];
            $ruta = $carpeta . "/" . $nombre_archivo;
            if (!file_exists($ruta)) {
                $resultado_subida = @move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                if ($resultado_subida) {
                    $imagen = $ruta;
                }
            }
        }
    }
}

$conexion = dbConnect();
$sql = "INSERT INTO usuario (login, correo, pass, nombre, apellidos, direccion,
	telefono, localizacion, fechaNacimiento, imagen) VALUES ('" . $login . "', '" .
	$correo . "', '" . $pass . "', '" . $nombre . "', '" . $apellidos . "', '" . $direccion . "', '"
	. $telefono . "', '" . $localizacion . "', '" . $fechaNacimiento . "', '" . $imagen . "');";

$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);
echo $sql;
if(!$resultado){
	salir("El usuario ya existe", -1);
}else{
	$_SESSION['login'] = $login; //Con esto iniciará conexión automaticamente.
	//Si hace falta más datos para la sesión sólo hay que añadirlos aquí.
	salir("Se ha registrado correctamente", 0);
}


function salir($str, $code) {
    echo '<script>
            alert("' . $str . '");
            //location.href= " ' . $_SERVER['HTTP_REFERER'] . '";
        </script>';
    return $code;
}