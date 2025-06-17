<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Imagen del producto (full-width) -->
        <div class="col-12 col-md-8 mb-4">
            <img src="<?= base_url('./assets/uploads/' . esc($producto['nombre_imagen'])) ?>" 
                 alt="<?= esc($producto['nombre']) ?>" 
                class="producto-img w-100">
        </div>

            <!-- Detalles (centrado, ancho reducido) -->
        <div class="col-12 col-md-6">
            <div class="card p-4">
                <!-- Nombre y precio -->
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h1 class="h4 fw-light"><?= esc($producto['nombre']) ?></h1>
                    <span class="h5">$<?= number_format($producto['precio'], 2) ?></span>
                </div>

                    <!-- Descripción -->
                <p class="text-muted mb-4 small"><?= esc($producto['descripcion']) ?></p>

                    <!-- Metadatos (grid minimalista) -->
                <div class="row small g-2 mb-4">
                    <div class="col-6">
                        <div class="text-muted">Marca</div>
                        <div><?= esc($marca['marca']) ?></div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted">Color</div>
                        <div>
                            <span class="me-2" style="background-color: <?= esc($color['color']) ?>;"></span>
                            <?= esc($color['color']) ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted">Talla</div>
                        <div><?= esc($talla['talla']) ?></div>
                    </div>
                    <div class="col-6">
                        <div >Stock</div>
                        <div class="text-muted">
                            <?= esc($producto['stock']) ?> <?= $producto['stock'] == 1 ? 'unidad' : 'unidades' ?>
                        </div>
                    </div>
                </div>

                <!-- Selector de cantidad -->
                <div class="mb-4">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input 
                        type="number" 
                        id="cantidad" 
                        name="cantidad" 
                        class="form-control" 
                        value="1" 
                        min="1" 
                        max="<?= esc($producto['stock']) ?>" 
                        style="max-width: 120px;">
                </div>

                    <!-- Botón principal (acento minimalista) -->
                <button class="btn btn-dark w-100 rounded-0 py-3">
                    AÑADIR AL CARRITO
                </button>
            </div>
        </div>
    </div>
</div>