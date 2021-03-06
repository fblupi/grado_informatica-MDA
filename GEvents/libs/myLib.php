<?php

date_default_timezone_set('Europe/Madrid');

function dbConnect() {
 $servername = "127.0.0.1";
 $username = "root";
 $password = "";
 $dbname = "mda";

// Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  return $conn;
}

function salir($str, $code) {
    echo '<script>
            alert("' . $str . '");
            location.href= " ' . $_SERVER['HTTP_REFERER'] . '";
        </script>';
    return $code;
}

function salir3($str, $code) {
    echo '<script>
            alert("' . $str . '");
            location.href= " ' . $code . '";
        </script>';
    return $code;
}

function salir2($str, $code, $url) {
  switch ($code) {
    case '0':
      echo '<script>document.getElementById("resultado").className = "alertas animated bounceInDown";</script>';
      echo '<div class="alert alert-success alert-dismissible animated bounceInDown" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>'.$str.'</strong> En breves instantes será redirigido. Si no fuera así, puede acceder desde el siguiente <a href="'.$url.'.php" class="alert-link">enlace</a>';
      echo '</div>';
      echo '<script>
      setTimeout(function () {
         document.getElementById("resultado").className = "alertas animated zoomOut";}, 3000);
      setTimeout(function () {
         window.location.href = "'.$url.'.php";}, 3000);</script>';
      break;
    case '-1':
      echo '<script>document.getElementById("resultado").className = "alertas animated bounceInDown";</script>';
      echo '<div class="alert alert-danger alert-dismissible animated bounceInDown" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>'.$str.'</strong>';
      echo '</div>';
      echo '<script>
      setTimeout(function () {
         document.getElementById("resultado").className = "alertas animated zoomOut";}, 3000);</script>';
      break;
    default:
      echo '<script>document.getElementById("resultado").className = "alertas animated bounceInDown";</script>';
      echo '<div class="alert alert-danger alert-dismissible animated bounceInDown" role="alert">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo '<strong>Si estás viendo esto es porque algo muy malo acaba de pasar.</strong>';
      echo '</div>';
      echo '<script>
      setTimeout(function () {
         document.getElementById("resultado").className = "alertas animated zoomOut";}, 3000);</script>';
      break;
  }

}
