$(document).ready(function() {
    /*Boton Clientes*/
    $("a.clientes").click(function(event) {
        $("#contenido").load("./views/clientes/cliente.php");
        event.preventDefault();
    });
    /*Boton Adminsitrador*/
    $("a.p-admin").click(function(event) {
        $('#contenido').html('<div class="loading" style="margin-top:100px;text-align:center;"><img src="./public/img/login/load.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        $("#contenido").load("./views/panel/principal.php");
        event.preventDefault();
    });
    /*Boton Inventarios*/
    $("a.inventarios").click(function(event) {
        $("#contenido").load("./views/panel/inventarios/principal.php");
        event.preventDefault();
    });
    /* Btn Salir */
    $("a.salir").click(function(event) {
        event.preventDefault();
        alertify.confirm('Cerrar Sesión', 'Seguro/a en cerrar sesión',
            function() {
                $("#data").load("index.php?off=1");
            },
            function() {
                alertify.error('Cierre de sesión cancelado...');
            }
        );
        
    });
});