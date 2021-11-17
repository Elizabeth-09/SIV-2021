<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $idcategoria = $_POST['idcategoria'];
    $categoria = $_POST['categoria'];  
    

    $tabla = "categorias";
    $campos = "categoria='$categoria'";
    $condicion = "idcategoria='$idcategoria'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
    
    if($update){
        echo '<script>
                alertify.success("Datos actualizados...");
                $("#CateUpd").modal("hide");    
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
            </script>';
    }
    else{
        echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#CateUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
            </script>';
    }

?>