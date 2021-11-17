<?php
include '../../../models/conexion.php';
include '../../../controllers/funciones.php';
include '../../../models/procesos.php';

$categoria = $_POST['categoria'];

$tabla = "categorias";
$campos = "categoria";
$valores = "'$categoria'";

$query1 = "SELECT * FROM categorias WHERE categoria = '$categoria'";
$query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

?>
<?php if (CountReg($query1) != 0) : ?>
    <script>
        alertify.error("Categoria ya registrado intente con uno nuevo...");
        $("#ModalNewCategoria").modal("hide");
        $("#contenido-panel").load("./views/panel/categorias/principal.php");
    </script>
<?php else : ?>
    <?php
    if (CRUD($query2, "i")) {
        echo '<script>
                alertify.success("Datos registrados...");
                $("#ModalNewCategoria").modal("hide");
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
                </script>';
    } else {
        echo '<script>
                alert("Error al registrar datos...");
                $("#ModalNewCategoria").modal("hide");
                $("#contenido-panel").load("./views/panel/categorias/principal.php");
                </script>';
    }
    ?>
<?php endif ?>