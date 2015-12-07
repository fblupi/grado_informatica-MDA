<?php
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}

$nombre_filtro = $_GET['search'];

include '../libs/myLib.php';
$conn = dbConnect();

$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
$sql2 = "SELECT * FROM Usuario WHERE Usuario.nombre like '%$nombre_filtro%' OR Usuario.apellidos like '%$nombre_filtro%' OR Usuario.correo like '%$nombre_filtro%' OR Usuario.login like '%$nombre_filtro%';";
$sql3 = "SELECT Usuario.login, Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$idEvento';";
$resultado = mysqli_query($conn, $sql);
$resultado2 = mysqli_query($conn, $sql2);
$resultado3 = mysqli_query($conn, $sql3);
$organizadoresAux = mysqli_fetch_array($resultado3);
while($eventos = mysqli_fetch_assoc($resultado)){
  echo '<form role="search" method="POST" action="" id="formularioaddOrganizador" name="formularioaddOrganizador">';
  echo '<fieldset>';
  echo '<legend>Añadir organizadores</legend>';
  echo '<div class="contenidoFieldset">';
  while($usuarios = mysqli_fetch_assoc($resultado2)){ //Solo muestro los usuarios que no son organizadores
    if(!in_array($usuarios['id'], $organizadoresAux)){
      $idUsuario = $usuarios['id'];
      $loginUsuario = $usuarios['login'];
      echo '<input type="checkbox" name="organizador" value="'.$idUsuario.'"/> '.$loginUsuario.'</br>';
    }
  }
  echo '</div>';
  echo '</fieldset>';
  echo '<button type="submit" class="btn btn-success" name="add" id="add">Añadir</button>';
  echo '</form>';
  echo '</div>';
  echo '</form>';
}

?>
