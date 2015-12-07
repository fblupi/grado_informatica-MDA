<?php include 'header.php';
if(isset($_GET['i'])){
	$idEvento = $_GET['i'];
}
?>
<body>
  <section>
      <article>
       <?php
				include 'libs/myLib.php';
				$conn = dbConnect();

				$sql = "SELECT nombre FROM Evento WHERE id = '$idEvento';";
        $sql2 = "SELECT * FROM Usuario WHERE Usuario.id;";
        $sql3 = "SELECT Usuario.login, Usuario.id FROM Usuario, Organizador, Evento WHERE Usuario.id = Organizador.usuario AND Organizador.evento = Evento.id AND Evento.id = '$idEvento';";
				$resultado = mysqli_query($conn, $sql);
        $resultado2 = mysqli_query($conn, $sql2);
        $resultado3 = mysqli_query($conn, $sql3);
        $organizadoresAux = mysqli_fetch_array($resultado3);
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
          echo '<div class="col-md-6 col-lg-6" id="mostrarUsuarios">';
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
          echo '<div class="col-md-6 col-lg-6" id="eliminarUsuarios">';
          echo '<form role="search" method="POST" action="" id="formularioEliminarOrganizador" name="formularioEliminarOrganizador">';
          echo '<fieldset>';
          echo '<legend>Eliminar organizadores</legend>';
          echo '<div class="contenidoFieldset">';
          $resultado3 = mysqli_query($conn, $sql3);
          while($organizadores = mysqli_fetch_assoc($resultado3)){
            $idUsuario = $organizadores['id'];
            $loginUsuario = $organizadores['login'];
            echo '<input type="checkbox" name="organizador" value="'.$idUsuario.'"/> '.$loginUsuario.'</br>';
          }
          echo '</div>';
          echo '</fieldset>';
          echo '<button type="submit" class="btn btn-danger" name="borrar" id="borrar">Eliminar</button>';
          echo '</form>';
          echo '</div>';
					echo '<a type="button" class="btn btn-primary btnVolver" onClick="history.go(-1);return true;">Volver</a>';
				}

				?>
      </article>
  </section>
</body>
<?php include 'footer.php'; ?>
