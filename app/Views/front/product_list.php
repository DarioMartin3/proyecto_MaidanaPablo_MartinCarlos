<!-- Lista de Productos -->
<div class="container py-4">
    <h2 class="mb-4">Lista de Productos</h2>
    <?php if (session('mensaje')): ?>
        <div class="alert alert-success"> <?= session('mensaje') ?> </div>
    <?php endif; ?>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['id']) ?></td>
                    <td><img ></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td><?= esc($producto['descripcion']) ?></td>
                    <td>$<?= esc($producto['precio']) ?></td>
                    <td><?= esc($producto['stock']) ?></td>
                    <td>
                        <?php if ($producto['estado']): ?>
                            <span class="badge bg-success">Activo</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Deshabilitado</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($producto['estado']): ?>
                            <a href="<?= base_url('/productos/deshabilitar/' . $producto['id']) ?>" class="btn btn-warning btn-sm">Deshabilitar</a>
                        <?php else: ?>
                            <a href="<?= base_url('/productos/habilitar/' . $producto['id']) ?>" class="btn btn-success btn-sm">Habilitar</a>
                        <?php endif; ?>
                        <a href="<?= base_url('/productos/modificar/' . $producto['id']) ?>" class="btn btn-black btn-sm">Modificar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>