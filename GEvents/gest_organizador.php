<?php
	$datos=$_POST['datos'];
	$opcion=$_POST['opcion'];
	$id_evento=$_POST['id_evento'];
	if(!empty($datos) && !empty($opcion) && !empty($id_evento) ){
		$datos=json_decode($datos);
		if(strcmp($opcion,"Añadir"==0){
			foreach( $datos as $nombre){
				$query="insert into Organizador (usuario,evento) VALUES ('$nombre','$id_evento');";
			}
		}
		if(strcmp($opcion,"Borrar")==0){
			foreach ($datos as $nombre) {
				$query="delete from Organizador where usuario='$nombre' and evento='$id_evento';";
			}


		}


	}// 


?>