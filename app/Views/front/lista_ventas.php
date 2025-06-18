<div class="container mt-5">
    <h2 class="mb-4">Lista de Ventas</h2>
    <table class="table table-bordered table-striped">
        <thead>
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
                    <tr>
                        <td><?= esc($venta['id']) ?></td>
                        <td><?= esc($venta['nombre']) ?></td>
                        <td><?= esc($venta['apellido']) ?></td>
                        <td><?= esc($venta['email']) ?></td>
                        <td>$<?= number_format($venta['total_venta'], 2) ?></td>
                        <td><?= esc($venta['fecha']) ?></td>
                        <td>
                            <button class="btn btn-black btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#detalleVenta<?= $venta['id'] ?>" aria-expanded="false" aria-controls="detalleVenta<?= $venta['id'] ?>">
                                Ver Detalle
                            </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="detalleVenta<?= $venta['id'] ?>">
                        <td colspan="7">
                            <div>
                                <?php
                                $detallesModel = new \App\Models\VentasDetallesModel();
                                $productosModel = new \App\Models\ProductsModel();
                                $detalles = $detallesModel->where('venta_id', $venta['id'])->findAll();
                                ?>
                                <strong>Detalle de productos:</strong>
                                <table class="table table-sm mt-2">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detalles as $detalle): ?>
                                            <?php $producto = $productosModel->find($detalle['producto_id']); ?>
                                            <tr>
                                                <td><?= esc($producto['nombre'] ?? 'Producto eliminado') ?></td>
                                                <td><?= esc($detalle['cantidad']) ?></td>
                                                <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                                                <td>$<?= number_format($detalle['precio_unitario'] * $detalle['cantidad'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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