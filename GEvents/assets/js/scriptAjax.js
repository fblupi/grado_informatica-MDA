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

function MostrarUsuarios(id) {
		document.getElementById("ayuda").className = "ayudaMostrar";
    var busqueda = $('#busqueda').val();
    var parametros = {
        search : busqueda,
				i : id
    };
    $.ajax({
            data:  parametros,
            url:   'scripts/mostrarUsuarios.php',
            type:  'GET',
            success:  function (response) {
                    $("#mostrarUsuarios").html(response);
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

$('#formularioEditarEvento').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioEditarEvento").serialize(),
            url:   'scripts/editarEvento.php',
            type:  'POST',
            success:  function (response) {
                    	$("#resultado").html(response);
            }
    });
});


$('#formularioaddOrganizador').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioaddOrganizador").serialize(),
            url:   'scripts/gest_organizadorAdd.php',
            type:  'POST',
            success:  function (response) {
            					$("#divGestionarOrganizadores").html(response);
            }
    });
});

$('#formularioEliminarOrganizador').on('submit', function(e){
    e.preventDefault();
    $.ajax({
            data:  $("#formularioEliminarOrganizador").serialize(),
            url:   'scripts/gest_organizadorEliminar.php',
            type:  'POST',
            success:  function (response) {
            					$("#divGestionarOrganizadores").html(response);
            }
    });
});
