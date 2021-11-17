<?php
include '../../../models/conexion.php';
include '../../../controllers/funciones.php';
include '../../../models/procesos.php';

$DataProve = CRUD("SELECT * FROM proveedores", "s");
$DataCate = CRUD("SELECT * FROM categorias", "s");
?>
<script src="./public/js/funciones-usuarios.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewProducto" enctype="multipart/formdata">

    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Código Producto: </span>
                </div>
                <input type="text" name="codproducto" class="form-control" placeholder="Código Producto" required="ON">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre Producto: </span>
                </div>
                <input type="text" name="producto" class="form-control" placeholder="Nombre Producto" required="ON">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripción: </span>
                </div>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripción Producto" required="ON">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
                </div>
                <select class="custom-select" name="categoria" id="tipo-categoria">
                    <option value="0" selected>Seleccione Categoria</option>
                    <?php foreach ($DataCate as $result) : ?>
                        <option value="<?php echo $result['categoria']; ?>"><?php echo $result['categoria']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Venta: </span>
                </div>
                <input type="number" name="precio_venta" class="form-control" placeholder="Precio Venta" required="ON">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Compra: </span>
                </div>
                <input type="number" name="precio_compra" class="form-control" placeholder="Precio Compra" required="ON">
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Codigo Proveedor:</label>
                </div>
                <select class="custom-select" name="idproveedor" id="tipo-proveedor">
                    <option value="0" selected>Seleccione Codigo Proveedor</option>
                    <?php foreach ($DataProve as $result) : ?>
                        <option value="<?php echo $result['idproveedor']; ?>"><?php echo $result['idproveedor']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha de ingreso: </span>
                </div>
                <input type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha" required="ON">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Productos en stock: </span>
                </div>
                <input type="number" name="stock" class="form-control" placeholder="Stock" required="ON">
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
        </div>
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>