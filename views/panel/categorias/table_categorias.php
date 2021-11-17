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
            <th class="ch">Codigo</th>
            <th class="ch">Categoria</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataCate as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['idcategoria']; ?></td>
                <td class="ch"><?php echo $result['categoria']; ?></td>
                <td class="ch">
                    <a href="" class="btn btn-success upd-cate" data-toggle="modal" id-categoria="<?php echo $result['idcategoria']; ?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger del-cate" id-categoria="<?php echo $result['idcategoria']; ?>"><i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>