$(document).ready(function () {
    /* carga contenido Usuarios*/
    $(".proveedores").click(function (event) {
        $("#contenido-panel").load("./views/panel/proveedores/principal.php");
        event.preventDefault();
    });
    /* Despliega Modal Registro Proveedor*/
    $("a.new-prove").click(function (event) {
        $("#ModalNewProveedor").modal("show");
        $("#DataFormProveedor").load("./views/panel/proveedores/form_proveedor.php");
        event.preventDefault();
    });
    /* Despliega Modal Editar Proveedor*/
    $(".upd-prove").click(function () {
        var idproveedor = $(this).attr("id-proveedor");
        $('#ProveUpd').modal('show');
        $("#dataProve").load("./views/panel/proveedores/edit_form_proveedor.php?idproveedor=" + idproveedor);
    });
    /* Paginado*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/proveedores/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/proveedores/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca Proveedor*/
    $("#like-prove").on('change', function (event) {
        var valor;
        valor = $("#like-prove").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Proveedor", "No ingreso el nombre ó código de proveedor a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/proveedores/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

    /* Eliminar Proveedor */
    $("a.del-prove").click(function (event) {
        var idproveedor = $(this).attr("id-proveedor");
        alertify.confirm('Eliminar Proveedor', 'Seguro/a de eliminar proveedor',
            function () {
                $("#contenido-panel").load("./views/panel/proveedores/del.php?idproveedor=" + idproveedor);
                event.preventDefault();
            },
            function () {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });

    /* Nuevo Proveedor*/
    $("#FormNewProveedor").on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("FormNewProveedor"));
        formData.append("dato", "valor");
        $.ajax({
            url: "./views/panel/proveedores/insert.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (res) {
                $("#contenido-panel").html(res);
            });
    });
    /* Editar Proveedor*/
    $("#UpdateProveedor").on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("UpdateProveedor"));
        formData.append("dato", "valor");
        $.ajax({
            url: "./views/panel/proveedores/update.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (res) {
                $("#contenido-panel").html(res);
            });
    });
});