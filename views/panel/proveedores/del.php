<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproveedor = $_GET['idproveedor'];

    $tabla = "proveedores";
    $condicion = "idproveedor='$idproveedor'";

    $insert = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($insert)
    {
        echo '<script>
                alertify.success("Proveedor eliminado...");
                $("#contenido-panel").load("./views/panel/proveedores/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error proveedor no eliminado...");
                $("#contenido-panel").load("./views/panel/proveedores/principal.php");
            </script>';
    }
?>