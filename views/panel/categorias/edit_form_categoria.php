<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcategoria = $_GET['idcategoria'];
    
    $DataCategoria = CRUD("SELECT * FROM categorias WHERE idcategoria = '$idcategoria'","s");

    foreach ($DataCategoria AS $result)
    {
        $categoria = $result['categoria'];
    }
?>
<script src="./public/js/funciones-categorias.js"></script>
<script src="./public/js/funciones.js"></script>

<form id="UpdateCategoria" enctype="multipart/formdata">
    <input type="hidden" name="idcategoria" value="<?php echo $idcategoria;?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Categoria: </span>
        </div>
        <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>" required="ON">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>