<!-- Lista de Usuarios -->
<section class="container-fluid py-4">
    <div class="style-div-titulo">
        <h2 class="style-titulo">LISTA DE USUARIOS</h2>
    </div>
    <?php if (session('mensaje')): ?>
        <div class="d-flex justify-content-center py-2">
            <div class="alert alert-success fade show py-2 px-2 small text-center" id="alertMensaje" style="min-width:200px; max-width:350px; width:auto; margin:auto;">
                <?= session('mensaje') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="container py-4">
        <div class="d-flex justify-content-end align-items-center mb-4">
            <button class="btn btn-black d-flex align-items-center gap-2 rounded-pill px-3 py-2" data-bs-toggle="modal" data-bs-target="#altaUsuarioModal">
                <img src="<?= base_url('assets/img/Iconos_layout/person-plus-fill.svg') ?>" width="25" height="25" alt="Agregar Usuario" style="filter: invert(1) brightness(2);">
                Agregar Usuario
            </button>
        </div>
        <!--Alta Usuario -->
        <div class="modal fade" id="altaUsuarioModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <?php $validation = \Config\Services::validation(); ?>
                <div class="modal-content">
                    <form method="post" action="<?= base_url('/enviar-form') ?>">
                        <?= csrf_field() ?>
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title">Alta de Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <?php if (session('validation')): ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session('validation')->getErrors() as $error): ?>
                                        <div><?= esc($error) ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label class="form-label" for="alta_nombre">Nombre</label>
                                <input type="text" class="form-control" id="alta_nombre" name="nombre" value="<?= old('nombre') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alta_apellido">Apellido</label>
                                <input type="text" class="form-control" id="alta_apellido" name="apellido" value="<?= old('apellido') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alta_email">Email</label>
                                <input type="email" class="form-control" id="alta_email" name="email" value="<?= old('email') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alta_usuario">Usuario</label>
                                <input type="text" class="form-control" id="alta_usuario" name="usuario" value="<?= old('usuario') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alta_pass">Contraseña</label>
                                <input type="password" class="form-control" id="alta_pass" name="pass" required>
                            </div>
                        </div>
                        <div class="modal-footer bg-light p-3">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-black">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= esc($usuario['id_usuario']) ?></td>
                            <td><?= esc($usuario['nombre']) ?></td>
                            <td><?= esc($usuario['apellido']) ?></td>
                            <td><?= esc($usuario['email']) ?></td>
                            <td><?= esc($usuario['perfil']) ?></td>
                            <td>
                                <?php if ($usuario['baja']): ?>
                                    <span class="badge bg-secondary">Deshabilitado</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Activo</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($usuario['perfil_id'] == 1): ?>
                                    <a href="<?= base_url('/usuarios/deshabilitar/' . $usuario['id_usuario']) ?>" class="btn btn-danger btn-sm disabled">
                                        <img src="<?= base_url('assets/img/Iconos_layout/ban.svg') ?>" width="20" height="20" alt="Deshabilitado" style="filter: invert(1) brightness(2);">
                                        Deshabilitar
                                    </a>
                                <?php else: ?>
                                    <?php if ($usuario['baja']): ?>
                                        <a href="<?= base_url('/usuarios/habilitar/' . $usuario['id_usuario']) ?>" class="btn btn-success btn-sm">Habilitar</a>
                                    <?php else: ?>
                                        <a href="<?= base_url('/usuarios/deshabilitar/' . $usuario['id_usuario']) ?>" class="btn btn-danger btn-sm">
                                            <img src="<?= base_url('assets/img/Iconos_layout/ban.svg') ?>" width="20" height="20" alt="Deshabilitado" style="filter: invert(1) brightness(2);">
                                            Deshabilitar
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <!-- Botón para abrir el modal de edición -->
                                <button class="btn btn-black btn-sm  align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal<?= $usuario['id_usuario'] ?>">
                                    <img src="<?= base_url('assets/img/Iconos_layout/pen.svg') ?>" width="20" height="20" alt="editar" style="filter: invert(1) brightness(2);">
                                    Editar
                                </button>
                                <!-- Modal de Edición -->
                                <div class="modal fade" id="editarUsuarioModal<?= $usuario['id_usuario'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url('/usuarios/actualizar/' . $usuario['id_usuario']) ?>" method="post">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title">Editar Usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" value="<?= esc($usuario['nombre']) ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Apellido</label>
                                                        <input type="text" class="form-control" value="<?= esc($usuario['apellido']) ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" value="<?= esc($usuario['email']) ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="perfil_id<?= $usuario['id_usuario'] ?>" class="form-label">Perfil</label>
                                                        <select class="form-select" id="perfil_id<?= $usuario['id_usuario'] ?>" name="perfil_id">
                                                            <option value="1" <?= $usuario['perfil_id'] == 1 ? 'selected' : '' ?>>Admin</option>
                                                            <option value="2" <?= $usuario['perfil_id'] == 2 ? 'selected' : '' ?>>Usuario</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light p-3">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-black">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>