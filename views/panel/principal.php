<script src="./public/js/text-oculto.js"></script>
<script src="./public/js/funciones-usuarios.js"></script>
<script src="./public/js/funciones-categorias.js"></script>
<script src="./public/js/funciones-proveedores.js"></script>
<script src="./public/js/funciones-productos.js"></script>
<div class="row">
    <div class="col-md-4" style="margin-bottom:5px;">
        <div class="card">
            <div class="card-header">
                <b>Registro</b>
            </div>
            <div class="card-body">
                <div class="row center">
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        <a href="" class="btn btn-dark usuarios" id="iconuser"><i class="fas fa-users fa-2x"></i></a>
                        <p id="infoUser" style="display: none"><b>Usuarios</b></p>
                    </div>
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        <a href="" class="btn btn-dark categoria" id="iconcate"><i class="fas fa-sitemap fa-2x"></i></a>
                        <p id="infoCate" style="display: none"><b>Categorías</b></p>
                    </div>
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        <a href="" class="btn btn-dark proveedores" id="iconprove"><i class="fas fa-parachute-box fa-2x"></i></a>
                        <p id="infoProve" style="display: none"><b>Proveedores</b></p>
                    </div>
                </div>
                <div class="row center" style="margin-top: 10px;">
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        <a href="" class="btn btn-dark productos" id="iconproduct"><i class="fab fa-product-hunt fa-2x"></i></a>
                        <p id="infoProduct" style="display: none"><b>Productos</b></p>
                    </div>
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        
                    </div>
                    <div class="col-md-4 auto-md" style="margin-bottom:5px;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Procesos
            </div>
            <div class="card-body" id="contenido-panel">

            </div>
        </div>
    </div>
</div>
<?php
    include '../modals/new_user.php';
    include '../modals/new_passw.php';
    include '../modals/update_user.php';
    include '../modals/new_categoria.php';
    include '../modals/update_categoria.php';
    include '../modals/new_proveedor.php';
    include '../modals/update_proveedor.php';
    include '../modals/new_producto.php';
    include '../modals/update_producto.php';

?>
