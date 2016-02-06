<?php
include_once('../libs/myLib.php');
$conn=dbConnect();
$nombre_filtro = $_GET['search'];

$todosEventos = "SELECT * FROM evento WHERE evento.nombre like '%$nombre_filtro%' OR evento.lugar like '%$nombre_filtro%' ORDER BY fechaInicio;";

$result = mysqli_query($conn, $todosEventos);

$todosEventos = Array();

while($eventos = mysqli_fetch_assoc($result)){
  array_push($todosEventos,$eventos);
}

foreach(array_chunk($todosEventos, 2, true) as $todosLosEventos) {
  echo '<div class="contenidoEvento row">';
    foreach ($todosLosEventos as $evento) {
      echo '<div class="col-md-6 col-lg-6">';
      echo '<a class="contenidoEvento linkEventos" href="evento.php?i=';
      echo $evento['id'];
      echo '">';
      echo '<img class="evento" src="';
      echo $evento['imagen'];
      echo '">';
      echo '<h2 class="nombreEvento">';
      echo $evento['nombre'];
      echo '</h2>';
      echo '<div class="textoEvento">';
      echo '<p class="lugarEvento">';
      echo $evento['lugar'];
      echo '</p>';
      echo '<p class="fechaEvento">';
      $fechaInicio = strtotime($evento['fechaInicio']);
      $fechaFin = strtotime($evento['fechaFin']);
      echo date('j/m/Y', $fechaInicio). ' - '.date('j/m/Y', $fechaFin);
      echo '</p>';
      echo '<p class="descripcionEvento">';
      $descripcion = str_split($evento['descripcion'], 150);
      echo $descripcion[0].'...';
      echo '</p>';
      echo '</div>';
      echo '</div>';

    }
  echo '</div>';
}
echo '</div>';
?>
