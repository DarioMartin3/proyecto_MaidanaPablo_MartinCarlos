<section class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg" style="background-color: rgba(255, 255, 255, 0.473)">
        <div class="container-fluid">
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
                            class="nav-link dropdown-toggle fs-4 "
                            style="color: black;"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorías
                        </a>
                        <!--Contenido del menu desplegable-->
                        <ul class="dropdown-menu">
                            <!-- Sección Mujeres -->
                            <div class="p-3 rounded">
                                <li>
                                    <h3 class="dropdown-item disabled" style="color: black; font-weight: bold;">Mujeres</h3>
                                </li>
                                <li>
                                    <?php foreach ($categorias as $categoria): ?>

                                        <?php if ($categoria['mujer'] == 1): ?>
                                            <form action="<?= base_url('/catalogo') ?>" method="get">
                                                <input type="hidden" name="categorias[]" value="<?= $categoria['id'] ?>">
                                                <input type="hidden" name="sexo[]" value="2">
                                                <button type="submit" class="dropdown-item"><?= $categoria['categoria'] ?></button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </li>

                            </div>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Sección Hombres -->
                            <div class="p-3 rounded">
                                <li>
                                    <h3 class="dropdown-item disabled" style="color: black; font-weight: bold;">Hombres</h3>
                                </li>
                                <li>
                                    <?php foreach ($categorias as $categoria): ?>

                                        <?php if ($categoria['hombre'] == 1): ?>
                                            <form action="<?= base_url('/catalogo') ?>" method="get">
                                                <input type="hidden" name="categorias[]" value="<?= $categoria['id'] ?>">
                                                <input type="hidden" name="sexo[]" value="1">
                                                <button type="submit" class="dropdown-item"><?= $categoria['categoria'] ?></button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </li>

                            </div>
                        </ul>
                    </li>
                    <!--Boton Coleeccion del momento-->
                    <li class="nav-item">
                        <a class="nav-link fs-4" href="#" style="color: black;">Colección </a>
                    </li>
                    <!--Boton Outlet-->
                    <li class="nav-item dropdown fs-4">
                        <a
                            class="nav-link dropdown-toggle"
                            style="color: black;"
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
                                    <li><a class="dropdown-item style-color" href="#">Remeras</a></li>
                                    <li><a class="dropdown-item style-color" href="#">Camisas</a></li>
                                    <li><a class="dropdown-item style-color" href="#">Abrigo y Camperas</a></li>
                                    <li><a class="dropdown-item style-color" href="#">Pantalones</a></li>
                                    <li><a class="dropdown-item style-color" href="#">Shorts</a></li>
                                    <li><a class="dropdown-item style-color" href="#">Zapatillas</a></li>
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
                        <img src="<?= base_url('assets/img/Iconos_layout/search.svg') ?>" width="30" height="30" alt="Search">
                    </button>
                </div>
                <?php if (session()->get('usuario')): ?>
                    <span class="me-2">Hola, <b><?= esc(session()->get('nombre')) ?></b></span>
                    <?php if (session()->get('perfil_id') == 1): ?>
                        <!-- Opciones solo para administrador -->
                        <a href="<?= base_url('/admin_menu') ?>" class="btn btn-black btn-sm me-2 rounded-pill">Panel Admin</a>
                    <?php elseif (session()->get('perfil_id') == 2): ?>
                        <!-- Opciones solo para cliente -->
                        <a href="<?= base_url('/compras') ?>" class="btn btn-black btn-sm me-2 rounded-pill">Mis compras</a>
                        <a href="<?= base_url('/carrito') ?>" class="btn btn-link">
                            <img src="./assets/img/Iconos_layout/bag.svg" width="30" height="30" alt="Carrito">
                        </a>
                    <?php endif; ?>
                    <a href="<?= base_url('/logout') ?>" class="btn btn-danger btn-sm rounded p-1 d-flex align-items-center">
                        <img src="./assets/img/Iconos_layout/box-arrow-in-right.svg" width="20" height="20" alt="out" style="filter: invert(1) brightness(2);">
                    </a>
                <?php else: ?>
                    <!-- Botón de Login -->
                    <button href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <img src="<?= base_url('assets/img/Iconos_layout/person-circle.svg') ?>" width="30" height="30" alt="Login">
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</section>
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
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('/login') ?>">
                    <?= csrf_field() ?>
                    <!-- Campo de Usuario -->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electronico" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
                    </div>
                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <!-- Botón de Iniciar Sesión -->
                    <button type="submit" class="btn btn-dark w-100">Iniciar Sesión</button>
                </form>
                <hr>
                <!-- Botón de Registro -->
                <div class="text-center">
                    <p>¿No tienes una cuenta?</p>
                    <a href="#" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del Modal -->
            <?php $validation = \Config\Services::validation(); ?>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/enviar-form') ?>">
                    <?= csrf_field() ?>
                    <!-- Campo de Apellido -->
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="apellido" placeholder="Ingresa tu apellido" required>
                    </div>
                    <!-- Campo de Nombre -->
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="firstname" name="nombre" placeholder="Ingresa tu nombre" required>
                    </div>
                    <!-- Campo de Usuario -->
                    <div class="mb-3">
                        <label for="registerUsername" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="registerUsername" name="usuario" placeholder="Ingresa tu usuario" required>
                    </div>
                    <!-- Campo de Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu email" required>
                    </div>
                    <!-- Campo de Contraseña -->
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="registerPassword" name="pass" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <!-- Botón de Registrarse -->
                    <button type="submit" class="btn btn-dark w-100">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>
</header>

<body>