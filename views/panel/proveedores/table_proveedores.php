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
            <th class="ch">Nombre Proveedor</th>
            <th class="ch">Direccion</th>
            <th class="ch">Telefono</th>
            <th class="ch">Correo</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProve as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['idproveedor']; ?></td>
                <td class="ch"><?php echo $result['proveedor']; ?></td>
                <td class="ch"><?php echo $result['direccion']; ?></td>
                <td class="ch"><?php echo $result['telefono']; ?></td>
                <td class="ch"><?php echo $result['correo']; ?></td>
                <td class="ch">
                    <a href="" class="btn btn-success upd-prove" data-toggle="modal" id-proveedor="<?php echo $result['idproveedor']; ?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger del-prove" id-proveedor="<?php echo $result['idproveedor']; ?>"><i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>