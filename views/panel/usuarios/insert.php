<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $user = $_POST['user'];
    $clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];
    $correo = $_POST['email'];
    // Obtenemos los atributos del archivo
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $path = "../../../public/img/usuarios/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));//Obtenemos la extención del archivo
    $newName = $user.".".$imgExt;//Asignamos un nuevo nombre al archivo

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    $tabla = "usuarios";
    $campos = "usuario, passw, token, tipo, foto, estado,correo";
    $valores = "'$user','$clave',NULL,'$tipo','$newName',1,'$correo'";

    $query1 = "SELECT * FROM usuarios WHERE usuario = '$user'";

?>
<?php if(CountReg($query1)!= 0):?>
    <script>
        alertify.error("Usuario ya registrado intente con uno nuevo...");
        $("#ModalNewUsuario").modal("hide");
        $("#contenido-panel").load("./views/panel/usuarios/principal.php");
    </script>
<?php else:?>
    <?php 
        switch($carga_img)
        {
            case 0;
                echo '<script>
                        alertify.error("Error datos e Imagen no cargados...");
                        $("#ModalNewUsuario").modal("hide");
                        $("#contenido-panel").load("./views/panel/usuarios/principal.php");
                    </script>';
                break;
            case 1:
                $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

                 if(CRUD($query2,"i")){
                    echo '<script>
                            alertify.success("Datos registrados...");
                            $("#ModalNewUsuario").modal("hide");
                            $("#contenido-panel").load("./views/panel/usuarios/principal.php");
                        </script>';
                 }
                 else{
                    echo '<script>
                        alert("Error al registrar datos...");
                        $("#ModalNewUsuario").modal("hide");
                        $("#contenido-panel").load("./views/panel/usuarios/principal.php");
                    </script>';
                 }
            break;
        }
    ?>
<?php endif?>
