<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idusuario = $_GET['idusuario'];

    $tabla = "usuarios";
    $condicion = "idusuario='$idusuario'";

    $insert = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($insert)
    {
        echo '<script>
                alertify.success("Usuario eliminado...");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error usuario no eliminado...");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
?>