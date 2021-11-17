<script src="./public/js/funciones-usuarios.js"></script>
<?php $idusuario = $_GET['idusuario']; ?>
<form id="NewPassw">
    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nueva Contraseña</span>
        </div>
        <input type="password" name="clave1" id="c1" class="form-control" placeholder="Contraseña"  required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Repita Contraseña</span>
        </div>
        <input type="password" name="clave2" id="c2" class="form-control" placeholder="Repita Contraseña"  required="ON">
    </div>
    <div>
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>