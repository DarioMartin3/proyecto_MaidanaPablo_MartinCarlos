<?php // ...existing code... ?>
<section class="container-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">MIS COMPRAS</h2>
    </div>
    <div class="container py-4">
        <?php if (!empty($compras)): ?>
            <table class="table table-bordered table-striped mb-4">
                <thead class="table-dark text-center">
                    <tr>
                        <th>N° Orden</th>
                        <th>Cantidad de productos</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra): ?>
                        <?php $cantidad_total = 0; foreach ($compra['detalles'] as $detalle) { $cantidad_total += $detalle['cantidad']; } ?>
                        <tr class="text-center">
                            <td><?= esc($compra['id']) ?></td>
                            <td><?= $cantidad_total ?></td>
                            <td>$<?= number_format($compra['total_venta'], 2) ?></td>
                            <td>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#detalleCompra<?= $compra['id'] ?>" aria-expanded="false" aria-controls="detalleCompra<?= $compra['id'] ?>">
                                    Ver Detalle
                                </button>
                            </td>
                        </tr>
                        <tr class="collapse bg-light" id="detalleCompra<?= $compra['id'] ?>">
                            <td colspan="4">
                                <div class="mb-2 text-end text-secondary">Fecha: <?= esc($compra['fecha']) ?></div>
                                <table class="table table-sm align-middle mb-0" style="background: #fff;">
                                    <thead class="table-secondary">
                                        <tr class="text-center">
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Costo Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($compra['detalles'] as $detalle): ?>
                                            <tr class="text-center">
                                                <td><?= esc($detalle['nombre_producto']) ?></td>
                                                <td><?= esc($detalle['cantidad']) ?></td>
                                                <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                                                <td class="fw-semibold">$<?= number_format($detalle['precio_unitario'] * $detalle['cantidad'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="table text-end align-middle">
                                            <td colspan="4" class="fw-bold fs-5 border-0 text-dark" >
                                                <div class="d-flex justify-content-end">
                                                    <span>Total de la compra: <span class="fs-4 text-success">$<?= number_format($compra['total_venta'], 2) ?></span></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center">No realizaste compras aún.</div>
        <?php endif; ?>
    </div>
</section>
<?php // ...existing code... ?>