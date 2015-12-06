<?php
// ********************** INICIO DE IMAGENES **************************

$n_fotos = $_POST['num_fotos'];
for ($i = 0; $i < $n_fotos; $i++) {
    if ($_FILES['foto' . $i]["error"] > 0) {
        salir("Ha ocurrido un error en la carga de la imagen", -3);
    } else {
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 2048;
        if (in_array($_FILES['foto' . $i]['type'], $permitidos) && $_FILES['foto' . $i]['size'] <= $limite_kb * 1024) {
            $carpeta = "../imagenes/" . $_POST['nombre_alojamiento'];
            if (!is_dir($carpeta)) {
                mkdir($carpeta);
            }
            $nombre_archivo = $_FILES['foto' . $i]['name'];
            $ruta = $carpeta . "/" . $nombre_archivo;
            if (!file_exists($ruta)) {
                $resultado_subida = @move_uploaded_file($_FILES['foto' . $i]['tmp_name'], $ruta);
                if ($resultado_subida) {
                    $url = $url = "imagenes/" . $_POST['nombre_alojamiento'] . "/" . $_FILES['foto' . $i]['name'];
                    $descripcion = $_POST['descripcion' . $i];
                    insertar_imagen($id_alojamiento, $url, $descripcion);
                }
            }
        }
    }
}
// ********************** FIN DE IMAGENES ************************** 