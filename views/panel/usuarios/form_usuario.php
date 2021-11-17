<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $DataTipo = CRUD("SELECT * FROM tipo_usuario","s");
?>
<script src="./public/js/funciones-usuarios.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewUser" enctype="multipart/formdata">
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario: </span>
        </div>
        <input type="text" name="user" class="form-control" placeholder="Usuario" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contraseña: </span>
        </div>
        <input type="password" name="clave" id="clave" class="form-control" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Tipo Usuario:</label>
        </div>
        <select class="custom-select" name="tipo" id="tipo-user">
            <option value="0"  selected>Seleccione Tipo</option>
        <?php foreach($DataTipo AS $result):?>
            <option value="<?php echo $result['tipo'];?>"><?php echo $result['nombre_tipo'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Correo: </span>
        </div>
        <input type="email" name="email" placeholder="Correo Electrónico" class="form-control" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input imagen" name="imagen" id="" aria-describedby="inputGroupFileAddon01">
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