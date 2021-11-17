<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcategoria = $_GET['idcategoria'];

    $tabla = "categorias";
    $condicion = "idcategoria='$idcategoria'";

    $insert = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($insert)
    {
        echo '<script>
                alertify.success("Categoria eliminada...");
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error categoria no eliminada...");
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
            </script>';
    }
?>