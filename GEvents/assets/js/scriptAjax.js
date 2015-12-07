function MostrarConsultaEventos() {
		document.getElementById("ayuda").className = "ayudaMostrar";
    var busqueda = $('#busqueda').val();
    var parametros = {
        search : busqueda
    };
    $.ajax({
            data:  parametros,
            url:   'scripts/mostrarEventos.php',
            type:  'GET',
            success:  function (response) {
                    $("#todosEventos").html(response);
            }
    });
}

$('#formularioInicioSesion').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioInicioSesion").serialize(),
            url:   'scripts/login.php',
            type:  'POST',
            success:  function (response) {
                    $("#resultado").html(response);
            }
    });
});

$('#formularioRegistroUsuario').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioRegistroUsuario").serialize(),
            url:   'scripts/registrarUsuario.php',
            type:  'POST',
            success:  function (response) {
                    $("#resultado").html(response);
            }
    });
});

$('#formularioRecordarContraseña').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			data: $("#formularioRecordarContraseña").serialize(),
			url: 'scripts/recordarContraseña.php',
			type: 'POST',
			success: function (response){
				$("#resultado").html(response);
			}
		});
});

$('#formularioEditarPerfil').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioEditarPerfil").serialize(),
            url:   'scripts/editarPerfil.php',
            type:  'POST',
            success:  function (response) {
                    $("#resultado").html(response);
            }
    });
});

$('#formularioCrearEvento').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioCrearEvento").serialize(),
            url:   'scripts/crearEvento.php',
            type:  'POST',
            success:  function (response) {
                    $("#resultado").html(response);
            }
    });
});
