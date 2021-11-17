<?php 
    @session_start();
    
    include '../models/conexion.php';
    include '../models/login.php';
    include '../models/procesos.php';
    include '../controllers/funciones.php';
    
    if(isset($_POST['acclogin']))
    {
        $user = $_POST['user'];
        $passw = $_POST['passw'];
        $tabla = "usuarios";
        $campo = "usuario";
        AccesoLogin($user, $passw, $tabla,$campo);
    }
    elseif(isset($_POST['cambioClave']))
    {
        echo $token = $_POST['token'];
        echo $passw1 = $_POST['passw1'];
        echo $passw2 = $_POST['passw2'];

    CambioClave($token,$passw1,$passw2);
    }
    else
    {
        header("Location: ../index.php");
    }
?>