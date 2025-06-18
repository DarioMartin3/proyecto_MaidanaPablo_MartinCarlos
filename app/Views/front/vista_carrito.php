<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('/catalogo') ?>" class="btn btn-secondary">Seguir comprando</a>
    </div>
    <h2>Carrito de Compras</h2>
    <?php if (isset($cartItems) && !empty($cartItems)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= esc($item['name']) ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <form action="<?= site_url('carrito/eliminar') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">-</button>
                                </form>
                                <span class="mx-2" style="min-width: 30px; display: inline-block; text-align: center;">
                                    <?= esc($item['qty']) ?>
                                </span>
                                <form action="<?= site_url('carrito/agregar') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-success btn-sm">+</button>
                                </form>
                            </div>
                        </td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>$<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                        <td>
                            <form action="<?= site_url('carrito/eliminar_todo') ?>" method="post" style="display:inline;">
                                <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                <button type="submit" class="btn btn-dark btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total += $item['price'] * $item['qty']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Total: $<?= number_format($total, 2) ?></h4>
        <form action="<?= site_url('carrito/finalizar') ?>" method="post" style="display:inline;">
            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
        </form>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</div>