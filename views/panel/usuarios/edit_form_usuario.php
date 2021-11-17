<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idusuario = $_GET['idusuario'];
    
    $DataUsuario = CRUD("SELECT * FROM usuarios WHERE idusuario = '$idusuario'","s");

    foreach ($DataUsuario AS $result)
    {
        $usuario = $result['usuario'];
        $tipo = $result['tipo'];
        $correo = $result['correo'];
        $foto = $result['foto'];
    }
    $DataTipo = CRUD("SELECT * FROM tipo_usuario WHERE tipo != '$tipo'","s");
    $nombre_tipo = buscavalor("tipo_usuario","nombre_tipo","tipo = '$tipo'");
?>
<script src="./public/js/funciones-usuarios.js"></script>
<script src="./public/js/funciones.js"></script>

<form id="UpdateUsuario" enctype="multipart/formdata">
    <input type="hidden" name="idusuario" value="<?php echo $idusuario;?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario: </span>
        </div>
        <input type="text" name="user" class="form-control" value="<?php echo $usuario; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Tipo Usuario:</label>
        </div>
        <select class="custom-select" name="tipo" id="tipo-user">
            <option value="<?php echo $tipo;?>"  selected><?php echo $nombre_tipo; ?></option>
        <?php foreach($DataTipo AS $result):?>
            <option value="<?php echo $result['tipo'];?>"><?php echo $result['nombre_tipo'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Correo: </span>
        </div>
        <input type="email" name="email" value="<?php echo $correo; ?>" class="form-control" required="ON">
    </div>
    <div class="">
        <img src="./public/img/usuarios/<?php echo $foto;?>" width="90px" alt="">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Cambiar Foto</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input imagen" name="imagen2" id="" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <div>
        <img src="" width="200px" alt="" id="muestraimagen">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>