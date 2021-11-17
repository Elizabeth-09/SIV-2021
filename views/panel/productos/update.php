<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $idproducto = $_POST['idproducto'];
    $codproducto = $_POST['codproducto'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio_venta = $_POST['precio_venta'];
    $precio_compra = $_POST['precio_compra'];
    $idproveedor = $_POST['idproveedor'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $stock = $_POST['stock'];

    // Obtenemos los atributos del archivo
    $imgFile = $_FILES['imagen2']['name'];
    $tmp_dir = $_FILES['imagen2']['tmp_name'];
    $imgSize = $_FILES['imagen2']['size'];

    
    
if($imgSize == 0)
{
    $tabla = "productos";
    $campos = "codproducto='$codproducto', producto='$producto', descripcion='$descripcion', categoria='$categoria', precio_venta='$precio_venta', precio_compra='$precio_compra', idproveedor='$idproveedor', fecha_ingreso='$fecha_ingreso', stock='$stock'";
    $condicion = "idproducto='$idproducto'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");
    
    if($update){
        echo '<script>
                alertify.success("Datos actualizados...");
                $("#ProductUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
    }
    else{
        echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#ProductUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
    }
}
else
{
    $path = "../../../public/img/productos/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));//Obtenemos la extención del archivo
    $newName = $producto.".".$imgExt;//Asignamos un nuevo nombre al archivo

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    $tabla = "productos";
    $campos = "codproducto='$codproducto', producto='$producto', descripcion='$descripcion', categoria='$categoria', precio_venta='$precio_venta', precio_compra='$precio_compra', idproveedor='$idproveedor', fecha_ingreso='$fecha_ingreso', stock='$stock', imagen='$newName'";
    $condicion = "idproducto='$idproducto'";

    switch($carga_img)
    {
        case 0;
            echo '<script>
                    alertify.error("Error datos e Imagen no cargados...");
                    $("#ProductUpd").modal("hide");
                    $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
            break;
        case 1:
            $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");

            if($update){
            echo '<script>
                    alertify.success("Datos actualizados...");
                    $("#ProductUpd").modal("hide");
                    $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
            }
            else{
            echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#ProductUpd").modal("hide");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
            }
        break;
    }
}
?>