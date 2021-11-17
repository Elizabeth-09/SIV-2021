//Funcion para pre-visualizar imagen antes de guardar Productos
function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            //Asignamos el atributo src a la tag de imagen
            $('#muestraimagen').attr('src',e.target.result);

        }
        reader.readAsDataURL(input.files[0]);
    }

}
//El listener va asignado al input
$("#imagen").change(function(){
    readURL(this);
});
