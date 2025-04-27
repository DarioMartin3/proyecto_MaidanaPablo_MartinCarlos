</body>
<footer class="footer mt-auto py-3 bg-body-tertiary">
    <!-- Sección de Arriba-->

    <section class="footer-top container-fluid">
        <!-- Carrusel-->
        <div id="footerCarousel" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/Iconos_layout/shipping.svg"
                        alt="Icono Arrepentimiento" width="15" height="15">
                    <h4>Envío Gratis</h4>
                    <p>a partir de $120.000</p>
                    <button type="button" class="btn btn-link">Ver más</button>
                </div>
                <div class="carousel-item ">
                    <img src="./assets/img/Iconos_layout/credit-card.svg"
                        alt="Icono Arrepentimiento" width="15" height="15">
                    <h4>3 cuotas sin interés</h4>
                    <p>en todo el sitio</p>
                    <button type="button" class="btn btn-link">Ver más</button>
                </div>
                <div class="carousel-item ">

                    <img src="./assets/img/Iconos_layout/returns.svg"
                        alt="Icono Arrepentimiento" width="15" height="15">
                    <h4>Cambios?</h4>
                    <p>Cambio gratis hasta 7 días</p>
                    <button type="button" class="btn btn-link">Ver más</button>
                </div>
            </div>
            <!--Botones del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#footerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#footerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        <!-- Iconos de la sección superior -->
        <div class="row">
            <div class="col-auto">
                <div class="icon-item">
                    <img src="./assets/img/Iconos_layout/shipping.svg" alt="Icono Arrepentimiento" width="50" height="50">
                    <h4>Envío Gratis</h4>
                    <p>a partir de $120.000</p>
                    <button type="button" class="btn btn-link">Ver más</button>
                </div>
            </div>
            <div class="col-auto">
                <div class="icon-item">
                    <img src="./assets/img/Iconos_layout/credit-card.svg" alt="Icono Arrepentimiento" width="50" height="50">
                    <h4>3 cuotas sin interés</h4>
                    <p>en todo el sitio</p>
                    <button type="button" class="btn btn-link">Ver más</button>
                </div>
            </div>
            <div class="col-auto">
                <div class="icon-item">
                    <img src="./assets/img/Iconos_layout/returns.svg" alt="Icono Arrepentimiento" width="50" height="50">
                    <h4>Cambios?</h4>
                    <p >Cambio gratis hasta 7 días</p>
                    <button type="button " class="btn btn-link" style="padding: 0;">Ver más</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Sección intermedia -->
    <section class="footer-middle d-flex align-items-center justify-content-center text-center">
        <div class="me-3 mb-md-0">
            <h5 class="mb-1 fw-bold">OBTENÉ UN DESCUENTO</h5>
            <small class="text-muted">Suscribiéndote</small>
        </div>
        <form class="d-flex flex-wrap align-items-center " action="#" method="POST">
            <input type="email" class="form-control form-control-sm flex-grow-1 me-2"
                placeholder="Ingresá tu email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
            <button type="submit" class="btn btn-link text-dark p-0">
                <i class="bi bi-arrow-right"></i>
            </button>
        </form>
    </section>
    <!-- Sección de Abajo -->
    <section class="footer-bottom container-fluid">
        <div class="row ">
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Nosotros</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('/quienes_somos'); ?>" class="btn btn-link-bottom">Sobre Nosotros</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Ayuda</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('contact_info') ?>" class="btn btn-link-bottom">Contacto</a></li>
                    <li><a class="btn btn-link-bottom" href="<?php echo base_url('/formas_de_pagos'); ?>">Formas de pago</a></li>
                    <li><a href="metodos_de_envios" class="btn btn-link-bottom">Metodos de envío</a></li>
                    <li><a href="cambios_y_devoluciones" class="btn btn-link-bottom">Cambio y Devoluciones</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Legales</h5>
                <ul class="list-unstyled ">
                    <li><a href="<?= base_url('terminos_y_usos') ?>" class="btn btn-link-bottom">Termino y condiciones</a></li>
                    <li><button type="button" class="btn btn-link-bottom" style="display: flex; align-items: center;">
                            <img src="./assets/img/Iconos_layout/bag-x.svg"
                                alt="Icono Arrepentimiento"
                                width="20"
                                height="20">Boton de arrepentimiento</button></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Siguenos</h5>
                <ul class="list-unstyled d-flex justify-content-start">
                    <li><a href="https://www.facebook.com" target="_blank" class="me-3"><img src="./assets/img/Iconos_layout/facebook.svg" alt="Icono Facebook" width="20" height="20"></a></li>
                    <li><a href="https://www.instagram.com" target="_blank" class="me-3"><img src="./assets/img/Iconos_layout/instagram.svg" alt="Icono Instagram" width="20" height="20"></a></li>
                    <li><a href="https://www.tiktok.com" target="_blank"><img src="./assets/img/Iconos_layout/tiktok.svg" alt="Icono Tiktok" width="20" height="20"></a></li>
                </ul>
            </div>
        </div>
    </section>
</footer>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>