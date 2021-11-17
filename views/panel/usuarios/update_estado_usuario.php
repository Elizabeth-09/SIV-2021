<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idusuario = $_GET['idusuario'];
    $valor = $_GET['valor'];

    $update = CRUD("UPDATE usuarios SET estado = '$valor' WHERE idusuario = '$idusuario'","u");
?>

<?php if($update):?>
    <?php if($valor == 0):?>
        <script>
            alertify.error("Usuario Deshabilitado");
            $("#contenido-panel").load("./views/panel/usuarios/principal.php");
        </script>
    <?php else:?>
        <script>
            alertify.success("Usuario Habilitado");
            $("#contenido-panel").load("./views/panel/usuarios/principal.php");
        </script>
    <?php endif ?>
<?php else:?>
    <script>
            alertify.error("Error al actualizar estado...");
            $("#contenido-panel").load("./views/panel/usuarios/principal.php");
        </script>
<?php endif ?>