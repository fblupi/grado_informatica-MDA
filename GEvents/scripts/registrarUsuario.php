<?php

include_once "../libs/myLib.php";

if (!isset($_SESSION['login'])) {//Si no se puede acceder a $_SESSION['login'] es porque hace falta iniciar sesión.
	session_start();
}

$login = $_POST['login'];
$correo = $_POST['correo'];
$pass = md5($_POST['pass']);

if(!empty($login) && !empty($correo) && !empty($pass)){
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
	$subidaCorrecta = false;
	if(isset($_FILES['imagen']) && $_FILES['imagen']['name']){
		if ($_FILES['imagen']['error'] > 0) {
			salir("Ha ocurrido un error en la carga de la imagen", -2);
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
	$sql = "INSERT INTO Usuario (login, correo, pass, nombre, apellidos, direccion,
		telefono, localizacion, fechaNacimiento, imagen) VALUES ('" . $login . "', '" .
		$correo . "', '" . $pass . "', '" . $nombre . "', '" . $apellidos . "', '" . $direccion . "', '"
		. $telefono . "', '" . $localizacion . "', '" . $fechaNacimiento . "', '" . $imagen . "');";

	$resultado = mysqli_query($conexion, $sql);

	if(!$resultado){
		if($subidaCorrecta){//Si no se ha podido registrar borra la foto en caso de que se haya subido.
			unlink($ruta);
		}
		mysqli_close($conexion);
		salir2("El usuario ya existe", -1, 0);
	}else{
		$_SESSION['login'] = $login; //Con esto iniciará conexión automaticamente.
		$_SESSION['idUsuario'] = mysqli_insert_id($resultado);
		mysqli_close($conexion);
		//Si hace falta más datos para la sesión sólo hay que añadirlos aquí.
		salir2("Se ha registrado correctamente", 0, "index");
	}
}
