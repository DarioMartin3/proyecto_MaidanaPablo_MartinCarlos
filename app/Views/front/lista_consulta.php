<!-- Lista de Consultas -->
<div class="container-fluid py-4">
    <h2 class="mb-4">Lista de Consultas</h2>
    <?php if (session('mensaje_consultaLista')): ?>
        <div class="alert alert-success text-center"> <?= session('mensaje_consultaLista') ?> </div>
    <?php endif; ?>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Consulta</th>
                <th>Respondido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($consultas)): ?>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= esc($consulta['id']) ?></td>
                        <td><?= esc($consulta['apellido']) ?></td>
                        <td><?= esc($consulta['nombre']) ?></td>
                        <td><?= esc($consulta['email']) ?></td>
                        <td><?= esc($consulta['telefono']) ?></td>
                        <td><?= esc($consulta['consulta']) ?></td>
                        <td>
                            <?php if ($consulta['respondido']): ?>
                                <span class="badge bg-success">Sí</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/consultas/cambiar_respondido/' . $consulta['id']) ?>"
                                class="btn btn-sm <?= $consulta['respondido'] ? 'btn-black' : 'btn-danger' ?>">
                                <?= $consulta['respondido'] ? 'Respondido' : 'No respondido' ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay consultas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>