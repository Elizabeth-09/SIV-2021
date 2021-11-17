$(document).ready(function() {
    /* carga contenido Usuarios*/
    $(".usuarios").click(function(event) {
        $("#contenido-panel").load("./views/panel/usuarios/principal.php");
        event.preventDefault();
    });
    /* Editar Estado*/
    $("a.estado-user").click(function(event) {
        var idusuario, valor;
        idusuario = $(this).attr("id-usuario");
        valor = $(this).attr("valor");
        $("#contenido-panel").load("./views/panel/usuarios/update_estado_usuario.php?idusuario=" + idusuario + "&valor=" + valor);
        event.preventDefault();
    });
    /* Despliega Modal Registro Usuario*/
    $("a.new-user").click(function(event) {
        $("#ModalNewUsuario").modal("show");
        $("#DataFormUsuario").load("./views/panel/usuarios/form_usuario.php");
        event.preventDefault();
    });
    /* Cargar Modal para actualizar clave..*/
    $(".upd-key").click(function() {
        var idusuario = $(this).attr("id-usuario");
        $('#modalKeyUpd').modal('show');
        $("#dataKey").load("./views/panel/usuarios/form_passw.php?idusuario=" + idusuario);
    });
    /* Despliega Modal Editar Usuario*/
    $(".upd-user").click(function() {
        var idusuario = $(this).attr("id-usuario");
        $('#UserUpd').modal('show');
        $("#dataUser").load("./views/panel/usuarios/edit_form_usuario.php?idusuario=" + idusuario);
    });
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/usuarios/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/usuarios/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca Usuario*/
    $("#like-user").on('change', function(event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Usuario", "No ingreso el nombre ó código de usuario a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/usuarios/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
    /* Eliminar Usuario */
    $("a.del-user").click(function(event) {
        var idusuario = $(this).attr("id-usuario");
        alertify.confirm('Eliminar Usuario', 'Seguro/a de eliminar usuario',
            function() {
                $("#contenido-panel").load("./views/panel/usuarios/del.php?idusuario=" + idusuario);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });
    /* Nuevo Usuario*/
    $("#FormNewUser").on("submit", function(event) {
        event.preventDefault();
        var tipo = $('#tipo-user option:selected').val();
        var clave = $('#clave').val();
        if (tipo == 0) {
            alertify.alert("Registro Usuario", "No seleciono el tipo de usuario...");
            event.preventDefault();
        } else if (clave.length < 6) {
            alertify.alert("Registro Usuario", "La clave debe contener 6 o mas caracteres...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("FormNewUser"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/usuarios/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
        }
        
    });
    /* Editar Usuario*/
    $("#UpdateUsuario").on("submit", function(event) {
        var tipo = $('#tipo-user').val();
        event.preventDefault();
        if (tipo == 0) {
            alertify.alert("Registro Usuario", "No seleciono el tipo de usuario...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("UpdateUsuario"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/usuarios/update.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
        }
    });
    /* Editar Password Usuario*/
    $("#NewPassw").on("submit", function(event) {
        var c1, c2;
        c1 = $("#c1").val();
        c2 = $("#c2").val();

        if (c1 !== c2) {
            alertify.alert("Actualizar Clave", "Las contraseñas no coinciden....");
            event.preventDefault();
        } else if (c1.length < 6 || c2.length < 6) {
            alertify.alert("Actualizar Clave", "La contraseña debe contener 6 o mas caracteres...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("NewPassw"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/usuarios/passw_update.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
        }
        event.preventDefault();
    });
});