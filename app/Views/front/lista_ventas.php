<section class="container-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">LISTA DE VENTAS</h2>
    </div>
    <div class="container py-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>N° Venta</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ventas)): ?>
                    <?php foreach ($ventas as $venta): ?>
                        <tr class="text-center">
                            <td><?= esc($venta['id']) ?></td>
                            <td><?= esc($venta['nombre']) ?></td>
                            <td><?= esc($venta['apellido']) ?></td>
                            <td><?= esc($venta['email']) ?></td>
                            <td>$<?= number_format($venta['total_venta'], 2) ?></td>
                            <td><?= esc($venta['fecha']) ?></td>
                            <td>
                                <button class="btn btn-black btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#detalleVenta<?= $venta['id'] ?>" aria-expanded="false" aria-controls="detalleVenta<?= $venta['id'] ?>">
                                    <img src="<?= base_url('./assets/img/iconos_layout/clipboard2-check.svg') ?>" alt="Ver Detalle" class="me-1" style="filter: invert(1) brightness(2);" width="20" height="20">
                                    Ver Detalle
                                </button>
                            </td>
                        </tr>
                        <tr class="collapse" id="detalleVenta<?= $venta['id'] ?>">
                            <td colspan="7">
                                <div class="bg-light rounded shadow-sm p-3 mb-2 border border-1 border-secondary-subtle">
                                    <div class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-list-ul me-2 text-secondary"></i>
                                        <span class="fw-semibold text-secondary">Detalle de productos:</span>
                                    </div>
                                    <table class="table table-sm align-middle mb-0" style="background: #fff;">
                                        <thead class="table-secondary">
                                            <tr class="text-center">
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $detallesModel = new \App\Models\VentasDetallesModel();
                                            $productosModel = new \App\Models\ProductsModel();
                                            $detalles = $detallesModel->where('venta_id', $venta['id'])->findAll();
                                            foreach ($detalles as $detalle):
                                                $producto = $productosModel->find($detalle['producto_id']);
                                            ?>
                                                <tr class="text-center">
                                                    <td><?= esc($producto['nombre'] ?? 'Producto eliminado') ?></td>
                                                    <td><?= esc($detalle['cantidad']) ?></td>
                                                    <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                                                    <td class="fw-semibold">$<?= number_format($detalle['precio_unitario'] * $detalle['cantidad'], 2) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr class="table-light text-end align-middle">
                                                <td colspan="4" class="fw-bold fs-5 border-0 text-dark" style="border-bottom: none !important;">
                                                    Total de la venta: <span class="fs-4 text-success">$<?= number_format($venta['total_venta'], 2) ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay ventas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>