$(document).ready(function() {
    /* Verifica envio datos de Formulario Login*/
    $("#form-login").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(document.getElementById("form-login"));

        formData.append("dato", "valor");
        $('#data').html('<div class="loading" style="margin-top:100px;text-align:center;"><img src="./public/img/login/load.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        $.ajax({
                url: "./controllers/login.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#data").html(res);
            });
    });

    /* Cambiar clave */
    $("#form-cc").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(document.getElementById("form-cc"));

        formData.append("dato", "valor");
        $('#data').html('<div class="loading" style="margin-top:100px;text-align:center;"><img src="./public/img/login/load.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        $.ajax({
                url: "./controllers/login.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#data").html(res);
            });
    });

    /* Generar Token*/
    $("#g-token").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(document.getElementById("g-token"));

        formData.append("dato", "valor");
        //$('#data').html('<div class="loading" style="margin-top:100px;text-align:center;"><img src="./public/img/login/load.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        $.ajax({
                url: "./views/token.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#data").html(res);
            });
    });

    /* Carga Formulario olvide*/
    $("a.olvide-clave").click(function(e) {
        $("#data").load("./index.php?olvide=1");
       e.preventDefault();
    });
});