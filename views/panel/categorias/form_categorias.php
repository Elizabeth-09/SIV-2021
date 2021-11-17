<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
?>
<script src="./public/js/funciones-categorias.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewCategoria" enctype="multipart/formdata">
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Categoria: </span>
        </div>
        <input type="text" name="categoria" class="form-control" placeholder="Categoria" required="ON">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>