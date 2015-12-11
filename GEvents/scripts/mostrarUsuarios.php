<?php
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}

$nombre_filtro = $_GET['search'];

include '../libs/myLib.php';
$conn = dbConnect();

$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
$sql2 = "SELECT DISTINCT Usuario.id, Usuario.login FROM Usuario WHERE (Usuario.nombre like '%$nombre_filtro%' OR Usuario.login like '%$nombre_filtro%' OR Usuario.apellidos like '%$nombre_filtro%' OR Usuario.correo like '%$nombre_filtro%') AND Usuario.id NOT IN (SELECT DISTINCT Organizador.usuario FROM Organizador WHERE Organizador.evento = '$idEvento');";

$resultado = mysqli_query($conn, $sql);
$resultado2 = mysqli_query($conn, $sql2);
while($eventos = mysqli_fetch_assoc($resultado)){
  echo '<form role="search" method="POST" action="" id="formularioaddOrganizador" name="formularioaddOrganizador">';
  echo '<fieldset>';
  echo '<legend>Añadir organizadores</legend>';
  echo '<div class="contenidoFieldset">';
  while($usuarios = mysqli_fetch_assoc($resultado2)){ //Solo muestro los usuarios que no son organizadores
		$idUsuario = $usuarios['id'];
		$login = $usuarios['login'];
		echo '<input type="checkbox" name="datos[]" id="datos" value="'.$idUsuario.'"/> '.$login.'</br>';
  }
  echo '</div>';
  echo '</fieldset>';
  echo '<button type="submit" class="btn btn-success" name="add" id="add">Añadir</button>';
  echo '</form>';
  echo '</div>';
  echo '</form>';
}

?>
