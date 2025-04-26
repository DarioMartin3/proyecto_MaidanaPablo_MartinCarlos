<section class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg" style"background-color: rgba(255, 255, 255, 0.473)">
        <div class="container-fluid">
            <!--Logo en la barra-->

            <!--Boton para moviles-->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--Boton Categoria-->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorias
                        </a>
                        <!--Contenido del menu desplegable-->
                        <ul class="dropdown-menu">
                            <li class="dropdown-columns">
                                <ul class="column">
                                    <li><a class="dropdown-item" href="#">Remeras</a></li>
                                    <li><a class="dropdown-item" href="#">Musculosas</a></li>
                                    <li><a class="dropdown-item" href="#">Camisas</a></li>
                                </ul>
                                <ul class="column">
                                    <li><a class="dropdown-item" href="#">Pantalons</a></li>
                                    <li><a class="dropdown-item" href="#">Bermudas</a></li>
                                    <li><a class="dropdown-item" href="#">Zapatillas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--Boton Coleeccion del momento-->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Colección </a>
                    </li>
                    <!--Boton Outlet-->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Outlet
                        </a>
                        <!--Contenido del menu desplegable-->
                        <ul class="dropdown-menu">
                            <li class="dropdown-columns">
                                <ul class="column">
                                    <li><a class="dropdown-item" href="#">Remeras</a></li>
                                    <li><a class="dropdown-item" href="#">Musculosas</a></li>
                                    <li><a class="dropdown-item" href="#">Camisas</a></li>
                                    <li><a class="dropdown-item" href="#">Pantalones</a></li>
                                    <li><a class="dropdown-item" href="#">Bermudas</a></li>
                                    <li><a class="dropdown-item" href="#">Zapatillas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="btn-group d-flex align-items-center" role="group">
                <div class="search-container position-relative me-3 d-flex align-items-center">
                    <div id="searchBar" class="d-none">
                        <input type="text" class="form-control form-control-sm me-2" placeholder="Buscar..." style="width: 200px;">
                    </div>
                    <button class="btn btn-link p-0" id="searchButton" onclick="toggleSearchBar()">
                        <img src="./assets/img/Iconos_layout/search.svg" width="30" height="30" alt="Search">
                    </button>
                </div>
                <!-- Botón de Login -->
                <button href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <img src="./assets/img/Iconos_layout/person-circle.svg" width="30" height="30" alt="Login">
                </button>
                <!-- Botón de carrito -->
                <button href="#" class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#carritoOffcanvas" aria-controls="carritoOffcanvas">
                    <img src="./assets/img/Iconos_layout/bag.svg" width="30" height="30" alt="Carrito">
                </button>
            </div>
        </div>
    </nav>
</section>
<script>
    function toggleSearchBar() {
        const searchBar = document.getElementById('searchBar');
        searchBar.classList.toggle('d-none');
    }
</script>
<!-- Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                <form>
                    <!-- Campo de Usuario -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario" required>
                    </div>
                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <!-- Botón de Iniciar Sesión -->
                    <button type="submit" class="btn btn-dark w-100">Iniciar Sesión</button>
                </form>
                <hr>
                <!-- Botón de Registro -->
                <div class="text-center">
                    <p>¿No tienes una cuenta?</p>
                    <a href="<?php echo base_url('/register'); ?>" class="btn btn-outline-secondary">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offcanvas del carrito -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="carritoOffcanvas" aria-labelledby="carritoOffcanvasLabel">
    <div class="offcanvas-header">

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
        <i class="bi bi-bag" style="font-size: 3rem;"></i>
        <img src="./assets/img/Iconos_layout/bag.svg" width="30" height="30" alt="Carrito">
        <p class="mt-2">Tu carrito está vacío.</p>
    </div>
</div>
</header>