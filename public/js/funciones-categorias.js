$(document).ready(function() {
    /* Carga contenido Categoria*/
    $(".categoria").click(function(event) {
        $("#contenido-panel").load("./views/panel/categorias/principal.php");
        event.preventDefault();
    });
    /* Despliega Modal Registro de Categoria*/
    $("a.new-cate").click(function(event) {
        $("#ModalNewCategoria").modal("show");
        $("#DataFormCategoria").load("./views/panel/categorias/form_categorias.php");
        event.preventDefault();
    });
    /* Despliega Modal Editar Usuario*/
    $(".upd-cate").click(function() {
        var idcategoria = $(this).attr("id-categoria");
        $('#CateUpd').modal('show');
        $("#dataCate").load("./views/panel/categorias/edit_form_categoria.php?idcategoria=" + idcategoria);
    });
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/categorias/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/categorias/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca Categoria*/
    $("#like-categoria").on('change', function(event) {
        var valor;
        valor = $("#like-categoria").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Categoria", "No ingreso el nombre ó código de categoria a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/categorias/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

    /* Eliminar Categoria */
    $("a.del-cate").click(function(event) {
        var idcategoria = $(this).attr("id-categoria");
        alertify.confirm('Eliminar Categoria', 'Seguro/a de eliminar la categoria',
            function() {
                $("#contenido-panel").load("./views/panel/categorias/del.php?idcategoria=" + idcategoria);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });

    /* Nueva Categoria*/
    $("#FormNewCategoria").on("submit", function(event) {
        event.preventDefault();
        
            var formData = new FormData(document.getElementById("FormNewCategoria"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/categorias/insert.php",
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
        
    });
    /* Editar Categoria*/
    $("#UpdateCategoria").on("submit", function(event) {
        event.preventDefault();
            var formData = new FormData(document.getElementById("UpdateCategoria"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/categorias/update.php",
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
    });
});