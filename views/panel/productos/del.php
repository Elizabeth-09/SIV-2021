<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];

    $tabla = "productos";
    $condicion = "idproducto='$idproducto'";

    $insert = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($insert)
    {
        echo '<script>
                alertify.success("Producto eliminado...");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error producto no eliminado...");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
    }
?>