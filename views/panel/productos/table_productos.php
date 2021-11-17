<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>
<table class="table table-borderless table-hover table-responsive">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="ch">N°</th>
            <th class="ch">Código de producto</th>
            <th class="ch">Producto</th>
            <th class="ch">Descripcion</th>
            <th class="ch">Categoria</th>
            <th class="ch">Precio de venta</th>
            <th class="ch">Precio de compra</th>
            <th class="ch">Proveedor</th>
            <th class="ch">Fecha de ingreso</th>
            <th class="ch">Producto en stock</th>
            <th class="ch">Imagen</th>
            <th class="ch">Estado</th>
            <th class="ch">Estado</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProduct as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['codproducto']; ?></td>
                <td class="ch"><?php echo $result['producto']; ?></td>
                <td class="ch"><?php echo $result['descripcion']; ?></td>
                <td class="ch"><?php echo $result['categoria']; ?></td>
                <td class="ch"><?php echo '$'. $result['precio_venta'] ; ?></td>
                <td class="ch"><?php echo '$'.$result['precio_compra']; ?></td>
                <td class="ch"><?php echo $result['idproveedor']; ?></td>
                <td class="ch"><?php echo $result['fecha_ingreso']; ?></td>
                <td class="ch"><?php echo $result['stock']; ?></td>
                <td class="ch">
                    <img src="./public/img/productos/<?php echo $imagen; ?>" width="90px" alt="">
                </td>
                <td class="ch">
                    <?php
                    if ($result['estado'] == 1) 
                    {
                        echo "Habilitado";
                    } 
                    else 
                    {
                        echo "Deshabilitado";
                    }
                    ?>
                </td>
                <td class="ch">
                    <?php if ($result['estado'] == 1): ?>
                        <a href="" class="btn btn-info estado-producto" id-producto="<?php echo $result['idproducto']; ?>" valor="0"><i class="fab fa-product-hunt"></i></a>
                    <?php else:?>
                        <a href="" class="btn btn-warning estado-producto" id-producto="<?php echo $result['idproducto']; ?>" valor="1"><i class="fab fa-product-hunt"></i></a>
                    <?php endif?>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-success upd-producto" data-toggle="modal" id-producto="<?php echo $result['idproducto']; ?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger del-product" id-producto="<?php echo $result['idproducto']; ?>"><i class="fas fa-user-times"></i></a>
                </td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>