


<footer class="footer mt-auto py-3 bg-body-tertiary">
    <!-- Sección de Arriba-->

    <section class="footer-top container-fluid">
        <!-- Carrusel-->
        <div id="footerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">

                <div class="carousel-item active text-center">
                    <div class="d-flex flex-column align-items-center ">
                        <img src="./assets/img/Iconos_layout/shipping.svg"
                            alt="Icono Envío Gratis" width="50" height="50" class="mb-2">
                        <h4>Envío Gratis</h4>
                        <p>a partir de $120.000</p>
                        <a href="<?= base_url('metodos_de_envios') ?>" class="btn btn-link">Ver más</a>
                    </div>
                </div>

                <div class="carousel-item text-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="./assets/img/Iconos_layout/credit-card.svg"
                            alt="Icono 3 cuotas sin interés" width="50" height="50" class="mb-2">
                        <h4>3 cuotas sin interés</h4>
                        <p>en todo el sitio</p>
                        <a href="<?= base_url('formas_de_pagos') ?>" class="btn btn-link">Ver más</a>
                    </div>
                </div>

                <div class="carousel-item text-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="./assets/img/Iconos_layout/returns.svg"
                            alt="Icono Cambios" width="50" height="50" class="mb-2">
                        <h4>¿Cambios?</h4>
                        <p>Cambio gratis hasta 7 días</p>
                        <a href="<?= base_url('cambios_y_devoluciones') ?>" class="btn btn-link">Ver más</a>
                    </div>
                </div>

            </div>

            <!-- Botones de navegación del carrusel -->
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
        <div class="d-none d-md-block" style="width: 100%;">
            <div class="row g-0">
                <!-- Columna Envío Gratis -->
                <div class="col-md-4 pe-md-3 border-end-md ">
                    <div class="d-flex flex-column align-items-center text-center h-100">
                        <img src="./assets/img/Iconos_layout/shipping.svg" alt="Icono Envío" width="40" height="40" class="mb-2">
                        <h5 class="mb-1">Envío Gratis</h5>
                        <p class="small mb-2">a partir de $120.000</p>
                        <a href="<?= base_url('metodos_de_envios') ?>" class="btn btn-sm btn-link p-0">Ver más</a>
                    </div>
                </div>

                <!-- Columna Cuotas -->
                <div class="col-md-4 px-md-3 border-end-md ">
                    <div class="d-flex flex-column align-items-center text-center h-100">
                        <img src="./assets/img/Iconos_layout/credit-card.svg" alt="Icono Tarjeta" width="40" height="40" class="mb-2">
                        <h5 class="mb-1">3 cuotas sin interés</h5>
                        <p class="small mb-2">en todo el sitio</p>
                        <a href="<?= base_url('formas_de_pagos') ?>" class="btn btn-sm btn-link p-0">Ver más</a>
                    </div>
                </div>

                <!-- Columna Cambios -->
                <div class="col-md-4 ps-md-3 ">
                    <div class="d-flex flex-column align-items-center text-center h-100">
                        <img src="./assets/img/Iconos_layout/returns.svg" alt="Icono Cambios" width="40" height="40" class="mb-2">
                        <h5 class="mb-1">Cambios?</h5>
                        <p class="small mb-2">Cambio gratis hasta 15 días</p>
                        <a href="<?= base_url('cambios_y_devoluciones') ?>" class="btn btn-sm btn-link p-0">Ver más</a>
                    </div>
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
        <form id="suscripcion-form" class="d-flex  align-items-center " action="" method="POST">
            <input type="email" class="form-control form-control-sm flex-grow-1 me-2"
                placeholder="Ingresá tu email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
            <button type="submit" class="btn btn-link text-dark p-0 d-flex align-items-center">
                <img src="./assets/img/Iconos_layout/arrow-right-square.svg" alt="icono mandar" width="29" height="29">
                <i class="bi bi-arrow-right"></i>
            </button>
        </form>
    </section>
    <!-- Sección de Abajo -->
    <section class="footer-bottom container-fluid">
        <div class="row">
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
                    <li><a href="<?php echo base_url('/formas_de_pagos') ?>" class="btn btn-link-bottom">Formas de pago</a></li>
                    <li><a href="<?= base_url('metodos_de_envios') ?>" class="btn btn-link-bottom">Metodos de envío</a></li>
                    <li><a href="<?= base_url('cambios_y_devoluciones') ?>" class="btn btn-link-bottom">Cambio y Devoluciones</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Legales</h5>
                <ul class="list-unstyled ">
                    <li><a href="<?= base_url('terminos_y_usos') ?>" class="btn btn-link-bottom">Termino y condiciones</a></li>
                    <li><a href="<?= base_url('construction_page') ?>" class="btn btn-link-bottom" style="display: flex; align-items: center;">
                            <img src="./assets/img/Iconos_layout/bag-x.svg"
                                alt="Icono Arrepentimiento"
                                width="20"
                                height="20">Boton de arrepentimiento</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer-margin-column">Siguenos</h5>
                <ul class="list-unstyled d-flex justify-content-start">
                    <li><a href="https://www.facebook.com" target="_blank" class="me-3" style="padding-left: 12px;"><img src="./assets/img/Iconos_layout/facebook.svg" alt="Icono Facebook" width="20" height="20"></a></li>
                    <li><a href="https://www.instagram.com" target="_blank" class="me-3"><img src="./assets/img/Iconos_layout/instagram.svg" alt="Icono Instagram" width="20" height="20"></a></li>
                    <li><a href="https://www.tiktok.com" target="_blank"><img src="./assets/img/Iconos_layout/tiktok.svg" alt="Icono Tiktok" width="20" height="20"></a></li>
                </ul>
            </div>
        </div>
    </section>
</footer>
<script>
    document.getElementById('suscripcion-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que se recargue o cambie de página

        const email = this.querySelector('input[type="email"]').value;
        console.log('Email enviado:', email);

        // Aquí podés hacer algo más, como enviar el email por AJAX

        // Limpiar el formulario
        this.reset();

        // Mostrar mensaje de confirmación
        const message = document.createElement('p');
        message.textContent = '¡Te suscribiste correctamente!';
        message.classList.add('text-success');
        this.appendChild(message);

        // Opcional: Si querés que el mensaje desaparezca después de unos segundos
        setTimeout(() => {
            message.remove();
        }, 3000); // 3000 milisegundos = 3 segundos
    });    
</script>
</body>


<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>