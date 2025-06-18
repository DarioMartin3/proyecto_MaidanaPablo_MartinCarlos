<section class="container-fluid ">
    <div class="style-div-titulo">
        <h1 class="style-titulo">Carrito de Compras</h1>
    </div>
    <div class="container mt-5">
        <?php if (session('mensaje')): ?>
            <div class="d-flex justify-content-center py-2">
                <div class="alert alert-success fade show py-2 px-2 small text-center" id="alertMensaje" style="min-width:200px; max-width:350px; width:auto; margin:auto;">
                    <?= session('mensaje') ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($cartItems)): ?>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('/catalogo') ?>" class="btn btn-secondary">Seguir comprando</a>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('/catalogo') ?>" class="btn btn-secondary">Ir al catálogo</a>
            </div>
        <?php endif; ?>
        <?php if (isset($cartItems) && !empty($cartItems)): ?>
            <table class="table table-bordered text-center align-middle">
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
                            <td class="align-middle">
                                <?php if (!empty($item['imagen'])): ?>
                                    <img src="<?= esc($item['imagen']) ?>" alt="<?= esc($item['name']) ?>" width="50">
                                <?php endif; ?>
                            </td>
                            <td class="align-middle"><?= esc($item['name']) ?></td>
                            <td class="align-middle">$<?= number_format($item['price'], 2) ?></td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <form action="<?= site_url('carrito_eliminar') ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                        <?php $disableEliminar = ($item['qty'] <= 1); ?>
                                        <button type="submit" style="background: transparent; border: none; padding: 0; margin: 0;" <?= $disableEliminar ? 'disabled' : '' ?>>
                                            <img src="<?= base_url('assets/img/Iconos_layout/dash-circle-fill.svg') ?>" width="20" height="20" alt="restar" style="filter: invert(18%) sepia(99%) saturate(7492%) hue-rotate(357deg) brightness(92%) contrast(92%); display: block;">
                                        </button>
                                    </form>
                                    <span class="mx-2" style="min-width: 30px; display: inline-block; text-align: center; position: relative; top: -2px;">
                                        <?= esc($item['qty']) ?>
                                    </span>
                                    <form action="<?= site_url('carrito_agregar') ?>" method="post" style="display:inline;">
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
                                        <button type="submit" style="background: transparent; border: none; padding: 0; margin: 0;" <?= $disableAgregar ? 'disabled' : '' ?>>
                                            <img src="<?= base_url('assets/img/Iconos_layout/plus-circle-fill.svg') ?>" width="20" height="20" alt="agregar" style="filter: invert(41%) sepia(97%) saturate(749%) hue-rotate(74deg) brightness(92%) contrast(92%); display: block;">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="align-middle">$<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                            <td class="align-middle">
                                <form action="<?= site_url('carrito_eliminar_todo') ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <button type="submit" class="btn btn-dark btn-sm">
                                        <img src="<?= base_url('assets/img/Iconos_layout/trash.svg') ?>" width="20" height="20" alt="Eliminar" class="me-1" style="filter: invert(1) brightness(2);">
                                        Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total += $item['price'] * $item['qty']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex flex-column align-items-end gap-2 mt-3">
                <h4 class="mb-0">Total: $<?= number_format($total, 2) ?></h4>
                <form action="<?= site_url('carrito_finalizar') ?>" method="post" style="display:inline;">
                    <button type="submit" class="btn btn-black">Finalizar Compra</button>
                </form>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <img src="./assets/img/Iconos_layout/bag-x.svg" width="50" alt="Carrito vacío" class="mb-3" style="opacity:0.5;">
                <h4 class="text-secondary">Tu carrito está vacío</h4>
                <p class="text-muted">¡Agrega productos para comenzar tu compra!</p>
            </div>
        <?php endif; ?>
    </div>
</section>