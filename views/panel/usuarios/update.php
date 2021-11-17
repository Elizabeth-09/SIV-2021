<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $idusuario = $_POST['idusuario'];
    $user = $_POST['user'];
    $tipo = $_POST['tipo'];
    $correo = $_POST['email'];
    // Obtenemos los atributos del archivo
    $imgFile = $_FILES['imagen2']['name'];
    $tmp_dir = $_FILES['imagen2']['tmp_name'];
    $imgSize = $_FILES['imagen2']['size'];

    
    
if($imgSize == 0)
{
    $tabla = "usuarios";
    $campos = "usuario='$user',tipo='$tipo',correo='$correo'";
    $condicion = "idusuario='$idusuario'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
    
    if($update){
        echo '<script>
                alertify.success("Datos actualizados...");
                $("#UserUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
    else{
        echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#UserUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
    }
}
else
{
    $path = "../../../public/img/usuarios/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));//Obtenemos la extención del archivo
    $newName = $user.".".$imgExt;//Asignamos un nuevo nombre al archivo

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    $tabla = "usuarios";
    $campos = "usuario='$user',tipo='$tipo', foto='$newName',correo='$correo'";
    $condicion = "idusuario='$idusuario'";

    switch($carga_img)
    {
        case 0;
            echo '<script>
                    alertify.error("Error datos e Imagen no cargados...");
                    $("#UserUpd").modal("hide");
                    $("#contenido-panel").load("./views/panel/usuarios/principal.php");
                </script>';
            break;
        case 1:
            $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");

            if($update){
            echo '<script>
                    alertify.success("Datos actualizados...");
                    $("#UserUpd").modal("hide");
                    $("#contenido-panel").load("./views/panel/usuarios/principal.php");
                </script>';
            }
            else{
            echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#UserUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/usuarios/principal.php");
            </script>';
            }
        break;
    }
}
?>