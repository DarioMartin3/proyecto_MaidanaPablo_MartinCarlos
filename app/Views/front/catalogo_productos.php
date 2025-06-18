<section>
    <h1 class="text-center mb-4">Catálogo de Productos</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <form method="get" action="<?= base_url('/catalogo') ?>" class="p-3">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="sexo" class="form-label">Sexo</label>
                            <?php foreach($sexos as $sexo): ?>
                                <!-- Aquí deberías poner un input, por ejemplo: -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sexo[]" value="<?= esc($sexo['id']) ?>" id="sexo<?= esc($sexo['id']) ?>">
                                    <label class="form-check-label" for="sexo<?= esc($sexo['id']) ?>">
                                        <?= esc($sexo['nombre']) ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="color" class="form-label">Color</label>
                            <?php foreach($colores as $color): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="color[]" value="<?= esc($color['id']) ?>" id="color<?= esc($color['id']) ?>">
                                    <label class="form-check-label" for="color<?= esc($color['id']) ?>">
                                        <?= esc($color['color']) ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <label for="marca" class="form-label">Marca</label>
                            <?php foreach($marcas as $marca): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="marca[]" value="<?= esc($marca['id']) ?>" id="marca<?= esc($marca['id']) ?>">
                                    <label class="form-check-label" for="marca<?= esc($marca['id']) ?>">
                                        <?= esc($marca['marca']) ?>
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
                            <div class="col-12">
                                <p class="text-center">No hay productos para mostrar.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach($productos as $producto): ?>
                                <div class="col-md-4 mb-4">
                                    <!-- Aquí va la tarjeta o presentación de cada producto -->
                                    <div class="card h-100">
                                        <img src="<?= base_url('assets/uploads/' . esc($producto['nombre_imagen'])) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                                            <p class="card-text">$<?= number_format($producto['precio'], 2) ?></p>
                                            <!-- Otros detalles del producto -->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>