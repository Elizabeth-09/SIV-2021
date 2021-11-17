<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idusuario = $_POST['idusuario'];
    $clave1 = $_POST['clave1'];
    
    $hash = password_hash($clave1,PASSWORD_DEFAULT);

    $tabla = "usuarios";
    $valores = "passw='$hash'";
    $condicion = "idusuario='$idusuario'";

    $update = CRUD("UPDATE $tabla SET $valores WHERE $condicion","u");

    if($update)
    {
        echo '<script>
                alertify.success("Clave usuario actualizado...");
                $("#modalKeyUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error clave usuario no actualizado...");
                $("#modalKeyUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
    
?>