<script>
    
</script>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="padre">
            <div class="hijo">
                <div>
                <?php if(isset($_GET['msj'])):?>
                    <div class="alert alert-danger" style="margin-bottom: 10px;">
                    <?php 
                        echo $_GET['msj'];
                    ?>
                    </div>
                <?php endif?>
                </div>
                <div class="center">
                    <img  src="./public/img/login/ET.png" width="200px" alt="Logo">
                </div>
                <h4 class="ctext-fb">Iniciar Sesión</h4>
                
                <form id="form-login">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="user" placeholder="Usuario" required="ON">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="passw" placeholder="Contraseña" required="ON">
                    </div>
                    <input type="hidden" name="acclogin" value="1">
                    <div class="center">
                        <button class="btn btn-primary">Acceder <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </form>
                <div style="float:right;margin-top:20px;">
                    <a href="" class="btn btn-link olvide-clave">Olvide contraseña</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>