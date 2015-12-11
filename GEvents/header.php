<html lang="es">
<head>
<?php if(!isset($_SESSION)){ session_start();} ?>
<meta charset="utf-8">
<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<link href="assets/css/style.css" rel="stylesheet"/>
<link href="assets/css/animate.css" rel="stylesheet"/>
<link href="assets/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css">
</head>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" class="logo" alt="GEvents"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
					<?php
				if(isset($_SESSION['login'])){
          echo '<li class="dropdown">';
          echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span></a>';
          echo '<ul class="dropdown-menu animated fadeInDown">';
          echo '<li><a href="miCuenta.php"><i class="fa fa-user usuario"></i>Mi perfil</a></li>';
          echo '<li><a href="eventosUsuario.php"><i class="fa fa-calendar usuario"></i>Mis eventos</a></li>';
          echo '<li role="separator" class="divider"></li>';
          echo '<li><a href="scripts/cerrarSesion.php">Cerrar sesión</a></li>';
          echo '</ul>';
          echo '</li>';
				}else {
					echo '<li><a href="signin.php"><i class="fa fa-user usuario"></i>Identifícate</a></li>'; } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="resultado" class="alertas"></div>
