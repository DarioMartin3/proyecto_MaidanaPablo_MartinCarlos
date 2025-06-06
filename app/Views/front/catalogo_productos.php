<section>
    <div class="container">
        <h1 class="text-center mb-4">Catálogo de Productos</h1>
        <div class="row">
            <?php if (empty($productos)): ?>
                <div class="col-12 text-center">
                    <p>No hay productos disponibles.</p>
                </div>
            <?php else: ?>
                <div class="d-grid gap-3 colum_responsive2">
                <?php foreach ($productos as $producto): ?>
                    
                    <div class="p-3">
                        <div class="card text-bg-dark float borde-card"  style="max-height: 400px;">
                            <img src="<?= base_url('/public/uploads/imagenes/' . $producto['nombre_imagen']) ?>" class="card-img" alt="..." style="max-height: 200px; max-width: 100%;">
                            <div class="card-body style-card-body">
                                <h4 class="card-title style-card-title" ><?= esc($producto['precio']) ?></h4>
                                <p class="card-text style-card-text">$<?= esc($producto['precio']) ?></p>
                                <a href="#" class="btn btn-light" >Ver</a>
                            </div>
                        </div>
                    </div>
                
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
</section>