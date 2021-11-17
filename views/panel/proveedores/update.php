<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $idproveedor = $_POST['idproveedor'];
    $proveedor = $_POST['proveedor'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];  
    
    $tabla = "proveedores";
    $campos = "proveedor='$proveedor',direccion='$direccion',telefono='$telefono',correo='$correo'";
    $condicion = "idproveedor='$idproveedor'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
    
    if($update){
        echo '<script>
                alertify.success("Datos actualizados...");
                $("#ProveUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/proveedores/principal.php");
            </script>';
    }
    else{
        echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#ProveUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/proveedores/principal.php");
            </script>';
    }

?>