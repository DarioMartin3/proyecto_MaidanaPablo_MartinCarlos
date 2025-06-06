<section>
    <h1 class="text-center mb-4">Catálogo de Productos</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-1">
        <form method="post" action="<?= base_url('/productos/catalogo') ?>" class="p-3">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="marca" class="form-label">Marca</label>
                    <?php foreach($marcas as $marca):?>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $marca['id'] ?>" id="marca">
                        <label class="form-check-label" for="marca">
                            <?= $marca['marca'];?>
                        </label>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="col-md-12">
                    <label for="categoria" class="form-label">Categorias</label>
                    <?php foreach($categorias as $categoria):?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $categoria['id'] ?>" id="categoria">
                        <label class="form-check-label" for="categoria">
                            <?= $categoria['categoria'];?>
                        </label>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="col-md-12">
                    <label for="talla" class="form-label">Tallas</label>
                    <?php foreach($tallas as $talla):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $talla['id'] ?>" id="talla">  
                            <label class="form-check-label" for="talla">
                                <?= $talla['talla'];?>
                            </label>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
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
                            <div class="card text-bg-dark float borde-card"  style="max-height: 400px;">                                                <img src="<?= base_url('./assets/uploads/' . $producto['nombre_imagen']) ?>" class="card-img" alt="..." style="max-height: 200px; max-width: 100%;">
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
        </div>                     
    </div>
</div>
</section>
