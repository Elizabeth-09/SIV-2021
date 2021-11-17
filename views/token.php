<?php 
    include '../models/conexion.php';
    include '../controllers/funciones.php';
    include '../models/procesos.php';
    
    $user = $_POST['user'];
    $email = $_POST['email'];

    $buscaUser = buscavalor("usuarios","COUNT(usuario)","usuario = '$user'");
    $buscaEmail = buscavalor("usuarios","COUNT(correo)","usuario = '$user' AND correo = '$email'");
?>

<?php if($buscaUser != 0 AND $buscaEmail != 0):?>
    <?php 
         $token = Token(8);
         Email($email,$token);
 
         $update =  CRUD("UPDATE usuarios SET token='$token' WHERE usuario='$user'","u");    
    ?>
    <?php if(update):?>
        <script>
            alertify.success("Token envíado favor verificar su correo...");
            $("#data").load("./index.php?cc=1");
        </script>
    <?php else:?>
        <script>
            alertify.success("Error vuelva a intentar generar el token");
            $("#data").load("./index.php?olvide=1");
        </script>
    <?php endif ?>
<?php else:?>
    <script>
        alertify.error("Error usuario ó email no coinciden con los de la base de datos..");
        $("#data").load("./index.php?olvide=1p");
    </script>
<?php endif ?>