<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<?php 
    function AccesoLogin($user,$passw,$tabla,$campo)
    {
        $consultas = new Login();
        $data = $consultas->getDataUser($user,$tabla,$campo);

        if($data)
        {
            foreach ($data AS $result)
            {
                $idusuario = $result['idusuario'];
                $hash = $result['passw'];
                $tipo = $result['tipo'];
                $estado = $result['estado'];
            }

            if($estado == 1)
            {
                if(password_verify($passw,$hash))
                {
                    $_SESSION["idusuario"] = $idusuario;
                    $_SESSION["user"] = $user;
                    $_SESSION["tipo"] = $tipo;
                    $_SESSION["login_ok"] = 1;
                   // header("Location: ../index.php");
                    echo '<script>
                            $("#data").html("<div style=\'margin-top:100px;text-align:center;\'><img src=\'./public/img/login/load.gif\' alt=\'loading\' /><br/>Un momento, por favor...</div>");
                            var msj = "Bienvenido/a";
                            alertify.success(msj);
                            setTimeout(function() {
                                window.location.href = "index.php";
                            }, 2000);
                        </script>';
                }
                else
                {
                    echo '<script>
                            var msj = "Contraseña incorrecta...";
                            alertify.error(msj);
                            setTimeout(function() {
                                window.location.href = "index.php";
                            }, 1000);
                        </script>';
                }
            }
            else
            {
                echo '<script>
                        var msj = "El usuario no tiene permisos de acceso...";
                        alertify.error(msj);
                        setTimeout(function() {
                            window.location.href = "index.php";
                            }, 1000);
                    </script>';
            }
        }
        else
        {
            echo '<script>
                var msj = "El usuario no existe....";
                alertify.error(msj);
                setTimeout(function() {
                    window.location.href = "index.php";
                    }, 1000);
            </script>';
        }
    }

    function CRUD($query,$tipo){
        $consultas = new Procesos();
        $data = $consultas->isdu($query,$tipo);
        return $data;
    }

    function CountReg($query)
    {
        $consultas = new Procesos();
        $data = $consultas->row_data($query);
        return $data;
    }

    function buscavalor($tabla,$campo,$condicion)
    {
        $valor = NULL;
        $consultas = new Procesos();
        $datos = $consultas->BuscaValor($tabla,$campo,$condicion);
        if($datos)
        {
            foreach ($datos AS $result)
            {
                $valor = $result[0];
            }
            return $valor;
        }
    }

    function Token($length)
    {
        $key = '';
        $cadena = "0123456789abcdefghijklmnopqrstuwxyz";
        for ($i=0;$i < $length;$i++)
        {
            $key .= $cadena[rand(0,35)];
        }
        return $key;
    }

    function Email($email,$token)
    {
        $desde = "paw@gmail.com";
        $cabecera = 'From: Soporte <'.$desde.'>'."\r\n".'Reply-To'.$desde."\r\n";
        $cabecera .= 'Content-type: text/html; charset=utf-8'."\r\n";

        $sms = "<b>Token: </b>".$token;

        mail($email,"Solicitud de Token",$sms,$cabecera);
    }

    function CambioClave($token,$passw1,$passw2)
    {
        $buscaToken = buscavalor("usuarios","COUNT(token)","token='$token'");
        $iduduario = buscavalor("usuarios","idusuario","token='$token'");

        if($buscaToken != 0)
        {
            if($passw1 === $passw2)
            {
                $newpassw = password_hash($passw2,PASSWORD_DEFAULT);

                $update = CRUD("UPDATE usuarios SET passw='$newpassw',token='' WHERE idusuario='$iduduario'","u");

                if($update)
                {
                    echo '<script>
                        alertify.success("Contraseña actualizada...");
                        $("#data").load("./index.php");
                    </script>';
                }
                else
                {
                    echo '<script>
                        alertify.error("Error contraseña no actualizada...");
                        $("#data").load("./index.php?olvide=1");
                    </script>';
                }
            }
            else
            {
                echo '<script>
                    alertify.error("Error contaseñas no coinciden...");
                    $("#data").load("./index.php?cc=1");
                </script>';
            }
        }
        else{
            echo '<script>
                    alertify.error("Token no coincide...");
                    $("#data").load("./index.php?cc=1");
                </script>';
        }
    }
    /* Funcion para cargar Imagenes*/
    function CargaIMG($tmp_dir,$newName,$path)
    {
        if(!is_dir($path))
        {
            mkdir($path, 0777, true);
        }

        if(is_uploaded_file($tmp_dir))
        {
            copy($tmp_dir,$path.$newName);
            return true;
        }
        else{
            return false;
        }
    }
?>

