<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $proveedor = $_POST['proveedor'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $tabla = "proveedores";
    $campos = "proveedor, direccion, telefono, correo";
    $valores = "'$proveedor','$direccion','$telefono','$correo'";

    $query1 = "SELECT * FROM proveedores WHERE proveedor = '$proveedor'";

?>
<?php if(CountReg($query1)!= 0):?>
    <script>
        alertify.error("Proveedor ya registrado intente con uno nuevo...");
        $("#ModalNewProveedor").modal("hide");
        $("#contenido-panel").load("./views/panel/proveedores/principal.php");
    </script>
<?php else:?>
    <?php 
                $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

                if(CRUD($query2,"i")){
                    echo '<script>
                            alertify.success("Datos registrados...");
                            $("#ModalNewProveedor").modal("hide");
                            $("#contenido-panel").load("./views/panel/proveedores/principal.php");
                        </script>';
                }
                else{
                    echo '<script>
                        alert("Error al registrar datos...");
                        $("#ModalNewProveedor").modal("hide");
                        $("#contenido-panel").load("./views/panel/proveedores/principal.php");
                    </script>';
                }
    ?>
<?php endif?>
