<?php
include_once('../libs/myLib.php');
$conn=dbConnect();
$nombre_filtro = $_GET['search'];

$todosEventos = "SELECT * FROM evento WHERE evento.nombre like '%$nombre_filtro%' ORDER BY fechaInicio;";

$result = mysqli_query($conn, $todosEventos);

while ($eventos = mysqli_fetch_assoc($result)) {
  echo '<div class="contenidoEvento row">';
	echo '<a class="contenidoEvento linkEventos" href="evento.php?i=';
	echo $eventos['id'];
	echo '">';
	echo '<img class="evento" src="';
	echo $eventos['imagen'];
	echo '">';
	echo '<h2 class="nombreEvento">';
	echo $eventos['nombre'];
	echo '</h2>';
	echo '<div class="col-lg-10 col-md-10 textoEvento">';
	echo '<p>';
	echo $eventos['lugar'];
	echo '</p>';
	echo '<p>';
	$fechaInicio = strtotime($eventos['fechaInicio']);
	$fechaFin = strtotime($eventos['fechaFin']);
	echo date('j F, Y', $fechaInicio). ' - '.date('j F, Y', $fechaFin);
	echo '</p>';
	echo '<p>';
	$descripcion = explode(".",$eventos['descripcion']);
	echo $descripcion[0].'.';
	echo $descripcion[1].'.';
	echo $descripcion[2];
	echo '...';
	echo '</p>';
	echo '</div>';
	echo '</div>';
}
?>
