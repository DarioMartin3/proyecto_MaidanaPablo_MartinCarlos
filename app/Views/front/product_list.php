<!-- Lista de Productos -->
<section class="container-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">Lista de Productos</h2>
    </div>
    <?php if (session('mensaje')): ?>
        <div class="d-flex justify-content-center py-2">
            <div class="alert alert-success fade show py-2 px-2 small text-center" id="alertMensaje" style="min-width:200px; max-width:350px; width:auto; margin:auto;">
                <?= session('mensaje') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="container py-4">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark text-center">
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
            <tbody class="text-center">
                <?php foreach ($productos_habilitados as $producto): ?>
                    <tr>
                        <td><?= esc($producto['id']) ?></td>
                        <td>
                            <div class="text-center">
                                <img src="./assets/uploads/<?= $producto['nombre_imagen'] ?>" alt="Imagen del producto" style="max-width: 200px;max-height:200px">
                            </div>
                        </td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['descripcion']) ?></td>
                        <td>$<?= esc($producto['precio']) ?></td>
                        <td><?= esc($producto['stock']) ?></td>
                        <td>
                            <span class="badge bg-success">Activo</span>
                        </td>
                        <td>
                            <a href="<?= base_url('/productos/deshabilitar/' . $producto['id']) ?>" class="btn btn-danger btn-sm">
                                <img src="<?= base_url('assets/img/Iconos_layout/ban.svg') ?>" width="20" height="20" alt="Deshabilitar" style="filter: invert(1) brightness(2);">
                                Deshabilitar</a>
                            <!-- Modal de Edición -->
                            <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Encabezado -->
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title">Editar Producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Cuerpo del Modal -->
                                        <div class="modal-body p-4">
                                            <form id="editarProductoForm<?= $producto['id'] ?>" action="<?= base_url('/productos/modificar/' . $producto['id']) ?>" method="POST" enctype="multipart/form-data">
                                                <!-- Fila 1: Nombre y Categoría -->
                                                <div class="row mb-3">
                                                    <div class="col-md-8">
                                                        <label class="form-label fw-bold">Nombre del Producto</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto['nombre'] ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="categoria" class="form-label">Categoria</label>
                                                        <select id="categoria" class="form-select" name="categoria">
                                                            <option value="<?= $producto['id_categoria'] ?>">Selecciona...</option>
                                                            <?php foreach ($categorias as $categoria): ?>
                                                                <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $producto['id_categoria'] ? 'selected' : '' ?>>
                                                                    <?= $categoria['categoria']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Fila 2: Talla, Stock y Precio -->
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label for="talla" class="form-label">Talla</label>
                                                        <select id="talla" class="form-select" name="talla">
                                                            <option value="<?= $producto['id_talla'] ?>">Selecciona...</option>
                                                            <?php foreach ($tallas as $talla): ?>
                                                                <option value="<?= $talla['id'] ?>"><?= $talla['talla']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label fw-bold">Stock</label>
                                                        <input type="number" class="form-control" name="stock" id="stock" value="<?= $producto['stock'] ?>" min="0" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Precio</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">$</span>
                                                            <input type="number" class="form-control" name="precio" id="precio" value="<?= $producto['precio'] ?>" step="0.01" min="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fila 3: Marca y Color -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="marca" class="form-label">Marca</label>
                                                        <select id="marca" class="form-select" name="marca">
                                                            <option value="<?= $producto['id_marca'] ?>">Selecciona...</option>
                                                            <?php foreach ($marcas as $marca): ?>
                                                                <option value="<?= $marca['id'] ?>"><?= $marca['marca']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="color" class="form-label">color</label>
                                                        <select id="color" class="form-select" name="color">
                                                            <option value="<?= $producto['id_color'] ?>">Selecciona...</option>
                                                            <?php foreach ($colores as $color): ?>
                                                                <option value="<?= $color['id'] ?>"><?= $color['color']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Descripción -->
                                                <div class="mb-3">
                                                    <label for="descripcion<?= $producto['id'] ?>" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion<?= $producto['id'] ?>" name="descripcion" rows="3"><?= esc($producto['descripcion']) ?></textarea>
                                                </div>

                                                <!-- Cambiar imagen justo después de descripción -->
                                                <div class="mb-3">
                                                    <label for="nueva_imagen<?= $producto['id'] ?>" class="form-label">Cambiar imagen</label>
                                                    <input class="form-control" type="file" id="nueva_imagen<?= $producto['id'] ?>" name="nueva_imagen" accept="image/*">
                                                </div>

                                                <!-- Imagen actual del producto -->
                                                <div class="mb-3 text-center">
                                                    <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>"
                                                         alt="Imagen actual"
                                                         class="img-fluid"
                                                         style="max-width:150px; max-height:150px; object-fit:contain;">
                                                    <div class="small text-muted mt-1">Imagen actual</div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Pie del Modal -->
                                        <div class="modal-footer bg-light p-3">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" form="editarProductoForm<?= $producto['id'] ?>" class="btn btn-black">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-black btn-sm  align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#editarProductoModal">
                                <img src="<?= base_url('assets/img/Iconos_layout/pen.svg') ?>" width="20" height="20" alt="editar" style="filter: invert(1) brightness(2);">
                                Editar
                            </button>

                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($productos_deshabilitados as $producto): ?>
                    <tr>
                        <td><?= esc($producto['id']) ?></td>
                        <td>
                            <div class="text-center">
                                <img src="./assets/uploads/<?= $producto['nombre_imagen'] ?>" alt="Imagen del producto" style="max-width: 200px;max-height:200px">
                            </div>
                        </td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['descripcion']) ?></td>
                        <td>$<?= esc($producto['precio']) ?></td>
                        <td><?= esc($producto['stock']) ?></td>
                        <td>
                            <span class="badge bg-secondary">Deshabilitado</span>
                        </td>
                        <td>
                            <a href="<?= base_url('/productos/habilitar/' . $producto['id']) ?>" class="btn btn-success btn-sm">
                                <img src="<?= base_url('assets/img/Iconos_layout/check-circle.svg') ?>" width="20" height="20" alt="Habilitar" style="filter: invert(1) brightness(2);">
                                Habilitar
                            </a>
                            <!-- Modal de Edición -->
                            <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Encabezado -->
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title">Editar Producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Cuerpo del Modal -->
                                        <div class="modal-body p-4">
                                            <form id="editarProductoForm<?= $producto['id'] ?>" action="<?= base_url('/productos/modificar/' . $producto['id']) ?>" method="POST" enctype="multipart/form-data">
                                                <!-- Fila 1: Nombre y Categoría -->
                                                <div class="row mb-3">
                                                    <div class="col-md-8">
                                                        <label class="form-label fw-bold">Nombre del Producto</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto['nombre'] ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="categoria" class="form-label">Categoria</label>
                                                        <select id="categoria" class="form-select" name="categoria">
                                                            <option value="<?= $producto['id_categoria'] ?>">Selecciona...</option>
                                                            <?php foreach ($categorias as $categoria): ?>
                                                                <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $producto['id_categoria'] ? 'selected' : '' ?>>
                                                                    <?= $categoria['categoria']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Fila 2: Talla, Stock y Precio -->
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label for="talla" class="form-label">Talla</label>
                                                        <select id="talla" class="form-select" name="talla">
                                                            <option value="<?= $producto['id_talla'] ?>">Selecciona...</option>
                                                            <?php foreach ($tallas as $talla): ?>
                                                                <option value="<?= $talla['id'] ?>"><?= $talla['talla']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label fw-bold">Stock</label>
                                                        <input type="number" class="form-control" name="stock" id="stock" value="<?= $producto['stock'] ?>" min="0" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Precio</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">$</span>
                                                            <input type="number" class="form-control" name="precio" id="precio" value="<?= $producto['precio'] ?>" step="0.01" min="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fila 3: Marca y Color -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="marca" class="form-label">Marca</label>
                                                        <select id="marca" class="form-select" name="marca">
                                                            <option value="<?= $producto['id_marca'] ?>">Selecciona...</option>
                                                            <?php foreach ($marcas as $marca): ?>
                                                                <option value="<?= $marca['id'] ?>"><?= $marca['marca']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="color" class="form-label">color</label>
                                                        <select id="color" class="form-select" name="color">
                                                            <option value="<?= $producto['id_color'] ?>">Selecciona...</option>
                                                            <?php foreach ($colores as $color): ?>
                                                                <option value="<?= $color['id'] ?>"><?= $color['color']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="sexo" class="form-label">sexo</label>
                                                        <select id="sexo" class="form-select" name="sexo">
                                                            <option value="<?= $producto['id_sexo'] ?>">Selecciona...</option>
                                                            <?php foreach ($sexos as $sexo): ?>
                                                                <option value="<?= $sexo['id'] ?>"><?= $sexo['sexo']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Descripción -->
                                                <div class="mb-3">
                                                    <label for="descripcion<?= $producto['id'] ?>" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion<?= $producto['id'] ?>" name="descripcion" rows="3"><?= esc($producto['descripcion']) ?></textarea>
                                                </div>

                                                <!-- Cambiar imagen justo después de descripción -->
                                                <div class="mb-3">
                                                    <label for="nueva_imagen<?= $producto['id'] ?>" class="form-label">Cambiar imagen</label>
                                                    <input class="form-control" type="file" id="nueva_imagen<?= $producto['id'] ?>" name="nueva_imagen" accept="image/*">
                                                </div>

                                                <!-- Imagen actual del producto -->
                                                <div class="mb-3 text-center">
                                                    <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>"
                                                         alt="Imagen actual"
                                                         class="img-fluid"
                                                         style="max-width:150px; max-height:150px; object-fit:contain;">
                                                    <div class="small text-muted mt-1">Imagen actual</div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Pie del Modal -->
                                        <div class="modal-footer bg-light p-3">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" form="editarProductoForm<?= $producto['id'] ?>" class="btn btn-black">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-black btn-sm  align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#editarProductoModal">
                                <img src="<?= base_url('assets/img/Iconos_layout/pen.svg') ?>" width="20" height="20" alt="editar" style="filter: invert(1) brightness(2);">
                                Editar
                            </button>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>