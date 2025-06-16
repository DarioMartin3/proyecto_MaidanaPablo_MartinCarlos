<!-- Menú de Administrador -->
<div class="container py-5">
    <h2 class="mb-4 text-center">Panel de Administrador</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <!--Lista de productos -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lista de productos</h5>
                    <p class="card-text">Visualiza, edita o elimina los productos existentes en el sistema.</p>
                    <a href="<?= base_url('/productos') ?>" class="btn btn-black mt-auto">Ver productos</a>
                </div>
            </div>
        </div>
        <!--Agregar categorías -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Agregar categorías</h5>
                    <p class="card-text">Crea nuevas categorías para organizar los productos de tu tienda.</p>
                    <a href="<?= base_url('/agregar_campos') ?>" class="btn btn-black mt-auto">Agregar categoría</a>
                </div>
            </div>
        </div>
        <!--Agregar productos -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Agregar productos</h5>
                    <p class="card-text">Añade nuevos productos al catálogo de la tienda.</p>
                    <a href="<?= base_url('/agregar_productos') ?>" class="btn btn-black mt-auto">Agregar producto</a>
                </div>
            </div>
        </div>
        <!--Lista usuarios -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Lista de usuarios</h5>
                    <p class="card-text">Visualiza, edita o elimina los usuarios existentes en el sistema.</p>
                    <a href="<?= base_url('/usuarios') ?>" class="btn btn-black mt-auto">Ver usuarios</a>
                </div>
            </div>
        </div>
        <!--Gráficos -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Gráficos</h5>
                    <p class="card-text">Visualiza estadísticas y gráficos sobre ventas y productos.</p>
                    <a href="<?= base_url('/construction_page') ?>" class="btn btn-black mt-auto">Ver gráficos</a>
                </div>
            </div>
        </div>
    </div>
</div>