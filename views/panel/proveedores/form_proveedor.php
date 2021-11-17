<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
?>
<script src="./public/js/funciones-proveedores.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewProveedor" enctype="multipart/formdata">
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nombre proveedor: </span>
        </div>
        <input type="text" name="proveedor" class="form-control" placeholder="Proveedor" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Direccion: </span>
        </div>
        <input type="text" name="direccion"  id="basic-addon1" class="form-control" placeholder="Direccion" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Telefono: </span>
        </div>
        <input type="number" name="telefono" id="basic-addon1" class="form-control" placeholder="Telefono" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Correo: </span>
        </div>
        <input type="email" name="correo" placeholder="Correo Electrónico" class="form-control" required="ON">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>