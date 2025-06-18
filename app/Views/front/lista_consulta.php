<!-- Lista de Consultas -->
<section class="container-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">LISTA DE CONSULTAS</h2>
    </div>
    <?php if (session('mensaje_consultaLista')): ?>
        <div class="alert alert-success text-center"> <?= session('mensaje_consultaLista') ?> </div>
    <?php endif; ?>
    <div class="container py-4">
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-center">
                <tr>
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
                        <tr class="text-center">
                            <td><?= esc($consulta['apellido']) ?></td>
                            <td><?= esc($consulta['nombre']) ?></td>
                            <td><?= esc($consulta['email']) ?></td>
                            <td><?= esc($consulta['telefono']) ?></td>
                            <td class="text-start"><?= esc($consulta['consulta']) ?></td>
                            <td>
                                <?php if ($consulta['respondido']): ?>
                                    <span class="badge bg-success">Sí</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">No</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('/consultas/cambiar_respondido/' . $consulta['id']) ?>"
                                    class="btn btn-sm <?= $consulta['respondido'] ? 'btn-outline-danger disabled' : 'btn-danger' ?>">
                                    <?= $consulta['respondido'] ? 'Responder' : 'Responder' ?>
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
</section>