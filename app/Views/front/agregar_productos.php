<section class="container-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">AGREGAR PRODUCTO</h2>
    </div>
    <div style="justify-content: center;display: flex;">
        <br>
        <form class="row g-3" style="width: 70%;" action="<?php echo base_url('ingresar_producto'); ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select id="categoria" class="form-select" name="categoria">
                    <option selected>Selecciona...</option>
                    <?php foreach ($categorias as $categorias): ?>
                        <option value="<?= $categorias['id'] ?>"><?= $categorias['categoria']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="talla" class="form-label">Talla</label>
                <select id="talla" class="form-select" name="talla">
                    <option selected>Selecciona...</option>
                    <?php foreach ($tallas as $talla): ?>
                        <option value="<?= $talla['id'] ?>"><?= $talla['talla']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <select id="marca" class="form-select" name="marca">
                    <option selected>Selecciona...</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca['id'] ?>"><?= $marca['marca']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">stock</label>
                <input type="number" class="form-control" id="stock" min=1 name="stock" value="1">
            </div>
            <div class="col-md-2">
                <label for="color" class="form-label">color</label>
                <select id="color" class="form-select" name="color">
                    <option selected>Selecciona...</option>
                    <?php foreach ($colores as $color): ?>
                        <option value="<?= $color['id'] ?>"><?= $color['color']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="sexo" class="form-label">sexo</label>
                <select id="sexo" class="form-select" name="sexo">
                    <option selected>Selecciona...</option>
                    <?php foreach ($sexos as $sexo): ?>
                        <option value="<?= $sexo['id'] ?>"><?= $sexo['sexo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" min=1 name="precio">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="imagen" class="form-label">Imagen del Producto</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                <small class="text-muted">Formatos aceptados: JPG, PNG, JPEG (Max. 2MB)</small>
            </div>
            <div class="col-12 conteiner-flex" style="justify-content: center;display: flex;">
                <button type="submit" class="btn btn-black">Agregar Producto</button>
            </div>
        </form>
    </div>
</section>