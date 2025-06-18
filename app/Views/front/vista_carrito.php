<div class="container mt-5">
    <h2 class="mb-3">Carrito de Compras</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('/catalogo') ?>" class="btn btn-secondary">Seguir comprando</a>
    </div>
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error_stock')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('error_stock') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (isset($cartItems) && !empty($cartItems)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
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
                        <td>
                            <?php if (!empty($item['imagen'])): ?>
                                <img src="<?= esc($item['imagen']) ?>" alt="<?= esc($item['name']) ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td><?= esc($item['name']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <form action="<?= site_url('carrito/eliminar') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <?php
                                    $disableEliminar = ($item['qty'] <= 1);
                                    ?>
                                    <button type="submit" class="btn btn-danger btn-sm" <?= $disableEliminar ? 'disabled' : '' ?>>-</button>
                                </form>
                                <span class="mx-2" style="min-width: 30px; display: inline-block; text-align: center;">
                                    <?= esc($item['qty']) ?>
                                </span>
                                <form action="<?= site_url('carrito/agregar') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <?php
                                    $stock = null;
                                    if (isset($item['id'])) {
                                        $productModel = new \App\Models\ProductsModel();
                                        $producto = $productModel->find($item['id']);
                                        $stock = $producto ? $producto['stock'] : null;
                                    }
                                    $disableAgregar = ($stock !== null && $item['qty'] >= $stock);
                                    ?>
                                    <button type="submit" class="btn btn-success btn-sm" <?= $disableAgregar ? 'disabled' : '' ?>>+</button>
                                </form>
                            </div>
                        </td>
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
        <div class="d-flex flex-column align-items-end gap-2 mt-3">
            <h4 class="mb-0">Total: $<?= number_format($total, 2) ?></h4>
            <form action="<?= site_url('carrito/finalizar') ?>" method="post" style="display:inline;">
                <button type="submit" class="btn btn-black">Finalizar Compra</button>
            </form>
        </div>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</div>