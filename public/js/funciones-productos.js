$(document).ready(function() {
    /* carga contenido Usuarios*/
    $(".productos").click(function(event) {
        $("#contenido-panel").load("./views/panel/productos/principal.php");
        event.preventDefault();
    });
    /* Editar Estado del Producto*/
    $("a.estado-producto").click(function(event) {
        var idproducto, valor;
        idproducto = $(this).attr("id-producto");
        valor = $(this).attr("valor");
        $("#contenido-panel").load("./views/panel/productos/update_estado_producto.php?idproducto=" + idproducto + "&valor=" + valor);
        event.preventDefault();
    });
    /* Despliega Modal Registro Producto*/
    $("a.new-product").click(function(event) {
        $("#ModalNewProducto").modal("show");
        $("#DataFormProducto").load("./views/panel/productos/form_producto.php");
        event.preventDefault();
    });
    
    /* Despliega Modal Editar Producto*/
    $(".upd-producto").click(function() {
        var idproducto = $(this).attr("id-producto");
        $('#ProductUpd').modal('show');
        $("#dataProduct").load("./views/panel/productos/edit_form_producto.php?idproducto=" + idproducto);
    });
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/productos/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/productos/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca Producto*/
    $("#like-product").on('change', function(event) {
        var valor;
        valor = $("#like-product").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Producto", "No ingreso el nombre ó código de producto a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/productos/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
    /* Eliminar Producto */
    $("a.del-product").click(function(event) {
        var idproducto = $(this).attr("id-producto");
        alertify.confirm('Eliminar Producto', 'Seguro/a de eliminar producto',
            function() {
                $("#contenido-panel").load("./views/panel/productos/del.php?idproducto=" + idproducto);
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
        var tipo = $('#tipo-producto option:selected').val();
        var clave = $('#clave').val();
        if (tipo == 0) {
            alertify.alert("Registro Producto", "No seleciono el codigo  de proveedor...");
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
    /* Editar Producto*/
    $("#UpdateProducto").on("submit", function(event) {
        var categoria = $('#tipo-categoria').val();
        var idproveedor = $('#tipo-proveedor').val();
        event.preventDefault();
        if(idproveedor ==0){
            alertify.alert("Registro de idproveedor", "No seleciono el idproveedor de Producto...");
            event.preventDefault();
        }
        if (categoria == 0) {
            alertify.alert("Registro Categoria", "No seleciono la categoria de Producto...");
            event.preventDefault();
        } 
        else {
            var formData = new FormData(document.getElementById("UpdateProducto"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/update.php",
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