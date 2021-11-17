$(document).ready(function() {
    $(".dui").inputmask("99999999-9");
    $(".tel").inputmask("9999-9999");
    $(".nit").inputmask("9999-999999-999-9");
});

// Funcion para pre-visualizar imagen antes de guardar Productos
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // Asignamos el atributo src a la tag de imagen
            $('#muestraimagen').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// El listener va asignado al input
$(".imagen").change(function() {
    readURL(this);
});

/* Imprimir DIV */
$(document).ready(function () {
    $('.print_btn').click(function () {
        $('.pagina').printThis();
    });
});

function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
}