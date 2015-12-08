<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
if(!isset($_SESSION['login'])){
	echo '<script>location.href="signin.php";</script>';
}

?>
<body>
  <section>
      <article>
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
        $sql2 = "SELECT DISTINCT Usuario.id FROM Usuario WHERE Usuario.id NOT IN (SELECT DISTINCT Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$idEvento');";
        $sql3 = "SELECT Usuario.login, Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
        $resultado2 = mysqli_query($conn, $sql2);
        $resultado3 = mysqli_query($conn, $sql3);

				while($eventos = mysqli_fetch_assoc($resultado)){
					echo '<h1>';
					echo 'Gestionar organizadores <small class="tituloGestionEvento">('.$eventos['nombre'].')</small>';
					echo '<hr></h1>';
          echo '<form role="search">';
          echo '<div class="input-group">';
          echo '<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>';
          echo '<input type="text" id="busqueda" name="busqueda" onkeyup="MostrarUsuarios('.$idEvento.');" class="form-control" placeholder="Buscar...">';
          echo '</div>';
          echo '<span class="help-block ayudaEsconder" id="ayuda">Puedes realizar la búsqueda por nombre de usuario, nombre, apellidos o por correo electrónico</span>';
          echo '</form>';
					echo '<div id="divGestionarOrganizadores">';
          echo '<div class="col-md-6 col-lg-6" id="mostrarUsuarios">';
          echo '<form role="search" method="POST" action="" id="formularioaddOrganizador" name="formularioaddOrganizador">';
          echo '<fieldset>';
          echo '<legend>Añadir organizadores</legend>';
          echo '<div class="contenidoFieldset">';
          echo '<input type="text" class="idEvento" name="idEvento" id="idEvento" value="'.$idEvento.'"/>';
	          while($usuarios = mysqli_fetch_assoc($resultado2)){ //Solo muestro los usuarios que no son organizadores
              $idUsuario = $usuarios['id'];
							$sql4 = "SELECT login FROM Usuario WHERE Usuario.id = '$idUsuario';";
							$resultado4 = mysqli_query($conn, $sql4);
							$loginUsuario = mysqli_fetch_assoc($resultado4);
              $login = $loginUsuario['login'];

              echo '<input type="checkbox" name="datos" id="datos" value="'.$idUsuario.'"/> '.$login.'</br>';
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
          echo '<input type="text" class="idEvento" name="idEvento" id="idEvento" value="'.$idEvento.'"/>';
          $resultado3 = mysqli_query($conn, $sql3);
          while($organizadores = mysqli_fetch_assoc($resultado3)){
            $idUsuario = $organizadores['id'];
            $loginUsuario = $organizadores['login'];
            echo '<input type="checkbox" name="datos" id="datos" value="'.$idUsuario.'"/> '.$loginUsuario.'</br>';
          }
          echo '</div>';
          echo '</fieldset>';
					echo '<input type="submit" name="borrar" class="btn btn-danger" value="Eliminar">';
          echo '</form>';
          echo '</div>';
					echo '</div>';
					echo '<a type="button" class="btn btn-primary btnVolver" onClick="history.go(-1);return true;">Volver</a>';
				}

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
