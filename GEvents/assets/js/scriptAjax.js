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
				var login = $('#login').val();
				var pass = $('#pass').val();
		    var parametros = {
		        login : login,
						pass : pass
		    };
		    $.ajax({
		            data:  parametros,
		            url:   'scripts/login.php',
		            type:  'POST',
		            success:  function (response) {
		                    $("#resultado").html(response);
		            }
		    });
    });
