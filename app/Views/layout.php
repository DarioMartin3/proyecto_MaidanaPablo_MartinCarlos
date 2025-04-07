<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Clothing</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/mystyle.css" rel="stylesheet" />
</head>

<body>
    <!--Barra de navegacion-->
    <section class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!--Logo en la barra-->
                <a class="navbar-brand" href="#">
                    <img
                        src="./assets/img/logo2.png"
                        alt="404 Clothing"
                        width="150"
                        height="100" />
                </a>
                <!--<a class="navbar-brand" href="#">404 Clothing</a>-->
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
                                        <li>
                                            <a class="dropdown-item highlight-item" href="#">Parte de Arriba</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Remeras</a></li>
                                        <li><a class="dropdown-item" href="#">Musculosas</a></li>
                                        <li><a class="dropdown-item" href="#">Camisas</a></li>
                                    </ul>
                                    <ul class="column">
                                        <li>
                                            <a class="dropdown-item highlight-item" href="#">Parte de Abajo</a>
                                        </li>
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
                    <!--Buscador-->
                    <form class="d-flex" role="search">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search" />
                        <button class="btn btn-dark" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </section>

    <?php echo $this->renderSection('content'); ?>
    <!--Footer-->
    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="footer-margin-column">Nosotros</h5>
                    <ul class="list-unstyled">
                        <li><button type="button" class="btn">Local</button></li>
                        <li><button type="button" class="btn">Venta Mayorista</button></li>
                        <li><button type="button" class="btn">Sobre Nosotros</button></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-margin-column">Ayuda</h5>
                    <ul class="list-unstyled">
                        <li><button type="button" class="btn">Contacto</button></li>
                        <li><button type="button" class="btn">Formas de pago</button></li>
                        <li><button type="button" class="btn">Metodos de envío</button></li>
                        <li><button type="button" class="btn">Cambio y Devoluciones</button></li>
                        <li><button type="button" class="btn">Preguntas precuentes</button></li>
                        <li><button type="button" class="btn">Promociones</button></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-margin-column">Legales</h5>
                    <ul class="list-unstyled ">
                        <li><button type="button" class="btn">Politica de privacidad</button></li>
                        <li><button type="button" class="btn">Termino y condiciones</button></li>
                        <li><button type="button" class="btn" style="display: flex; align-items: center;">
                                <img src="./assets/img/Iconos_layout/bag-x.svg"
                                    alt="Icono Arrepentimiento"
                                    width="20"
                                    height="20">Boton de arrepentimiento</button></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-margin-column">Siguenos</h5>
                    <ul class="list-unstyled d-flex justify-content-start">
                        <li><button type="button" class="btn"><img src="./assets/img/Iconos_layout/facebook.svg" alt="Icono Facebook" width="20" height="20"></button></li>
                        <li><button type="button" class="btn"><img src="./assets/img/Iconos_layout/instagram.svg" alt="Icono Instagram" width="20" height="20"></button></li>
                        <li><button type="button" class="btn"><img src="./assets/img/Iconos_layout/tiktok.svg" alt="Icono Tiktok" width="20" height="20"></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>