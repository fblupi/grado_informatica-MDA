<?php
$datos=$_POST['datos'];
$id_evento=$_POST['idEvento'];
//Realizo la conexión si tenemos todos los datos necesarios
include '../libs/myLib.php';
$conexion = dbConnect();

if(!empty($datos) && !empty($id_evento) ){
foreach ($datos as $idUsuario) {
  $query="DELETE FROM Organizador where usuario = '$idUsuario' AND evento = '$id_evento';";
	mysqli_query($conexion, $query);
}
$sql2 = "SELECT DISTINCT Usuario.id FROM Usuario WHERE Usuario.id NOT IN (SELECT DISTINCT Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$id_evento');";
$sql3 = "SELECT Usuario.login, Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$id_evento';";
$resultado2 = mysqli_query($conexion, $sql2);
$resultado3 = mysqli_query($conexion, $sql3);
echo '<div class="col-md-6 col-lg-6" id="mostrarUsuarios">';
echo '<form role="search" method="POST" action="" id="formularioaddOrganizador" name="formularioaddOrganizador">';
echo '<fieldset>';
echo '<legend>Añadir organizadores</legend>';
echo '<div class="contenidoFieldset">';
echo '<input type="text" class="idEvento" name="idEvento" id="idEvento" value="'.$id_evento.'"/>';
	while($usuarios = mysqli_fetch_assoc($resultado2)){ //Solo muestro los usuarios que no son organizadores
		$idUsuario = $usuarios['id'];
		$sql4 = "SELECT login FROM Usuario WHERE Usuario.id = '$idUsuario';";
		$resultado4 = mysqli_query($conexion, $sql4);
		$loginUsuario = mysqli_fetch_assoc($resultado4);
		$login = $loginUsuario['login'];
		echo '<input type="checkbox" name="datos[]" id="datos" value="'.$idUsuario.'"/> '.$login.'</br>';
}
echo '</div>';
echo '</fieldset>';
echo '<input type="submit" name="add" class="btn btn-success" value="Añadir">';
echo '</form>';
echo '</div>';
echo '<div class="col-md-6 col-lg-6" id="eliminarUsuarios">';
echo '<form role="search" method="POST" action="" id="formularioEliminarOrganizador" name="formularioEliminarOrganizador">';
echo '<fieldset>';
echo '<legend>Eliminar organizadores</legend>';
echo '<div class="contenidoFieldset">';
echo '<input type="text" class="idEvento" name="idEvento" id="idEvento" value="'.$id_evento.'"/>';
$resultado3 = mysqli_query($conexion, $sql3);
while($organizadores = mysqli_fetch_assoc($resultado3)){
	$idUsuario = $organizadores['id'];
	$loginUsuario = $organizadores['login'];
	echo '<input type="checkbox" name="datos[]" id="datos" value="'.$idUsuario.'"/> '.$loginUsuario.'</br>';
}
echo '</div>';
echo '</fieldset>';
echo '<input type="submit" name="borrar" class="btn btn-danger" value="Eliminar">';
echo '</form>';
echo '</div>';
//Cierro conexión
mysqli_close($conexion);
}//
?>
