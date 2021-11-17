<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>
<table class="table table-borderless table-hover table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="ch">N°</th>
            <th class="ch">Código</th>
            <th class="ch">Usuario</th>
            <th class="ch">Imagen</th>
            <th class="ch">Correo</th>
            <th class="ch">Tipo</th>
            <th class="ch">Estado</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
            <th class="ch">Editar <br>Clave</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataUser as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['idusuario']; ?></td>
                <td class="ch"><?php echo $result['usuario']; ?></td>
                <td class="ch">
                    <img src="./public/img/usuarios/<?php echo $result['foto']; ?>" width="40px;" alt="">
                </td>
                <td class="ch"><?php echo $result['correo']; ?></td>
                <td class="ch">
                    <?php
                    if ($result['tipo'] == 1) 
                    {
                        echo "Administrador";
                    } 
                    else 
                    {
                        echo "Operador";
                    }
                    ?>
                </td>
                <td class="ch">
                    <?php if ($result['estado'] == 1): ?>
                        <a href="" class="btn btn-info estado-user" id-usuario="<?php echo $result['idusuario']; ?>" valor="0"><i class="fas fa-user-check"></i></a>
                    <?php else:?>
                        <a href="" class="btn btn-warning estado-user" id-usuario="<?php echo $result['idusuario']; ?>" valor="1"><i class="fas fa-user-alt-slash"></i></a>
                    <?php endif?>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-success upd-user" data-toggle="modal" id-usuario="<?php echo $result['idusuario']; ?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger del-user" id-usuario="<?php echo $result['idusuario']; ?>"><i class="fas fa-user-times"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-dark upd-key" data-toggle="modal" id-usuario="<?php echo $result['idusuario']; ?>"><i class="fas fa-key"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>