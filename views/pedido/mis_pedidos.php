<h1>Mis Pedidos</h1>

<?php if(isset($gestion)): ?>
    <h3>Gestionar pedidos</h3>
<?php else: ?>
    <h3>Mis pedidos</h3>
<?php endif; ?>

<table>
    <tr>
        <th>Número de pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php 
        while($pedido = $pedidos->fetch_object()): 
    ?>
        <tr>
            <td>
                <a href="<?=base_url?>pedido/detalle&id=<?=$pedido->id?>"><?=$pedido->id?></a>
            </td>
            <td>
                <?=$pedido->coste?> €
            </td>
            <td>
                <?=$pedido->fecha?>
            </td>
            <td>
            <?=Utils::showStatus($pedido->estado)?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
