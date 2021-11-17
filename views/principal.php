<?php 
    include './views/navbar/navbar.php';
?>
<div id="contenido" style="margin-top: 10px;">
    <div class="alert alert-info" style="width:500px; text-align: center;">
        <h5>Bienvenido/a: <?php echo $_SESSION["user"];?></h5>
</br>
        <img src="./public/img/usuarios/<?php echo $_SESSION["user"];?>.png" width="200px" alt="">
    </div>
</div>