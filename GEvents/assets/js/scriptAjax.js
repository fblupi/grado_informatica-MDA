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
