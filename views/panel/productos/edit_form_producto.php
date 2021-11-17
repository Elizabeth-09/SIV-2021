<?php
@session_start();
include '../../../models/conexion.php';
include '../../../controllers/funciones.php';
include '../../../models/procesos.php';

$idproducto = $_GET['idproducto'];

$DataProduct = CRUD("SELECT * FROM productos WHERE idproducto = '$idproducto'", "s");

foreach ($DataProduct as $result) {
    $codproducto = $result['codproducto'];
    $producto = $result['producto'];
    $descripcion = $result['descripcion'];
    $categoria = $result['categoria'];
    $precio_venta = $result['precio_venta'];
    $precio_compra = $result['precio_compra'];
    $idproveedor = $result['idproveedor'];
    $fecha_ingreso = $result['fecha_ingreso'];
    $stock = $result['stock'];
    $imagen = $result['imagen'];
    $estado = $result['estado'];
}
$DataCate = CRUD("SELECT * FROM categorias WHERE categoria != '$categoria'", "s");
$categoria = buscavalor("categorias", "categoria", "categoria = '$categoria'");

$DataProve = CRUD("SELECT * FROM proveedores WHERE idproveedor != '$idproveedor'", "s");
$proveedor = buscavalor("proveedores", "idproveedor", "idproveedor = '$idproveedor'");

?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>

<form id="UpdateProducto" enctype="multipart/formdata">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
            <input type="hidden" name="idproducto" value="<?php echo $idproducto;?>">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Codigo de Producto: </span>
                </div>
                <input type="number" name="codproducto" class="form-control" value="<?php echo $codproducto; ?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Producto: </span>
                </div>
                <input type="text" name="producto" class="form-control" value="<?php echo $producto; ?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripcion: </span>
                </div>
                <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
                </div>
                <select class="custom-select" name="categoria" id="tipo-categoria">
                    <option value="<?php echo $categoria; ?>" selected><?php echo $categoria; ?></option>
                    <?php foreach ($DataCate as $result) : ?>
                        <option value="<?php echo $result['categoria']; ?>"><?php echo $result['categoria']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio venta: </span>
                </div>
                <input type="number" name="precio_venta" value="<?php echo $precio_venta; ?>" class="form-control" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio compra: </span>
                </div>
                <input type="number" name="precio_compra" value="<?php echo $precio_compra; ?>" class="form-control" required="ON">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Id Proveedor:</label>
                </div>
                <select class="custom-select" name="idproveedor" id="tipo-proveedor">
                    <option value="<?php echo $proveedor; ?>" selected><?php echo $proveedor; ?></option>
                    <?php foreach ($DataProve as $result) : ?>
                        <option value="<?php echo $result['idproveedor']; ?>"><?php echo $result['idproveedor']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha ingreso: </span>
                </div>
                <input type="date" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>" class="form-control" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Stock: </span>
                </div>
                <input type="text" name="stock" class="form-control" value="<?php echo $stock; ?>" required="ON">
            </div>
            <div class=""style=" text-align: center;">
                <img src="./public/img/productos/<?php echo $imagen; ?>" width="200px" alt="" >
            </div>
            </br>
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
        </div>
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>