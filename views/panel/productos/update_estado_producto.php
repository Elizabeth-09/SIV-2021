<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];
    $valor = $_GET['valor'];

    $update = CRUD("UPDATE productos SET estado = '$valor' WHERE idproducto = '$idproducto'","u");
?>

<?php if($update):?>
    <?php if($valor == 0):?>
        <script>
            alertify.error("Producto Deshabilitado");
            $("#contenido-panel").load("./views/panel/productos/principal.php");
        </script>
    <?php else:?>
        <script>
            alertify.success("Producto Habilitado");
            $("#contenido-panel").load("./views/panel/productos/principal.php");
        </script>
    <?php endif ?>
<?php else:?>
    <script>
            alertify.error("Error al actualizar estado...");
            $("#contenido-panel").load("./views/panel/productos/principal.php");
        </script>
<?php endif ?>