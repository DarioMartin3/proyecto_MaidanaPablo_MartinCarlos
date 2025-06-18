<section>
    <h1 class="text-center mb-4">Catálogo de Productos</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <form method="get" action="<?= base_url('/catalogo') ?>" class="p-3">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="marca" class="form-label">sexo</label>
                            <?php foreach ($sexos as $sexo): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $sexo['id'] ?>" id="marca_<?= $sexo['sexo'] ?>" name="sexo[]">
                                    <label class="form-check-label" for="marca_<?= $sexo['id'] ?>">
                                        <?= $sexo['sexo']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="marca" class="form-label">Color</label>
                            <?php foreach ($colores as $color): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $color['id'] ?>" id="marca_<?= $color['color'] ?>" name="color[]">
                                    <label class="form-check-label" for="marca_<?= $color['id'] ?>">
                                        <?= $color['color']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="marca" class="form-label">Marca</label>
                            <?php foreach ($marcas as $marca): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $marca['id'] ?>" id="marca_<?= $marca['id'] ?>" name="marca[]">
                                    <label class="form-check-label" for="marca_<?= $marca['id'] ?>">
                                        <?= $marca['marca']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="categoria" class="form-label">Categorias</label>
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $categoria['id'] ?>" id="categoria_<?= $categoria['id'] ?>" name="categorias[]">
                                    <label class="form-check-label" for="categoria_<?= $categoria['id'] ?>">
                                        <?= $categoria['categoria']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="talla" class="form-label">Tallas</label>
                            <?php foreach ($tallas as $talla): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $talla['id'] ?>" id="talla_<?= $talla['id'] ?>" name="talla[]">
                                    <label class="form-check-label" for="talla_<?= $talla['id'] ?>">
                                        <?= $talla['talla']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
            <div class="col-10">
                <div class="container">
                    <div class="row">
                        <?php if (empty($productos)): ?>
                            <div class="col-12 text-center">
                                <p>No hay productos disponibles.</p>
                            </div>
                        <?php else: ?>
                            <div class="d-grid gap-3 colum_responsive2">
                                <?php foreach ($productos as $producto): ?>
                                    <div class="p-3">
                                        <div class="card text-bg-dark float borde-card" style="max-height: 400px;"> <img src="<?= base_url('./assets/uploads/' . $producto['nombre_imagen']) ?>" class="card-img" alt="..." style="max-height: 200px; max-width: 100%;">
                                            <div class="card-body style-card-body">
                                                <h4 class="card-title style-card-title"><?= esc($producto['precio']) ?></h4>
                                                <p class="card-text style-card-text">$<?= esc($producto['precio']) ?></p>
                                                <div class="container-flex text-center">
                                                    <div class="container-flex row">
                                                        <div class="col-6 col-sm-6"><a href="<?= base_url('/detalle_producto' . $producto['id']) ?>" class="btn btn-light">Ver</a></div>
                                                        <div class="col-6 col-sm-6">
                                                            <form action="<?= base_url('/carrito_agregar') ?>" method="post">
                                                                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                                                <input type="hidden" name="qty" value="1">
                                                                <button type="submit" class="btn btn-light">Agregar al carrito</button>
                                                            </form>
                                                        </div>

                                                        <!-- Force next columns to break to new line at md breakpoint and up -->
                                                        <div class="w-100 d-none d-md-block"></div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</section>