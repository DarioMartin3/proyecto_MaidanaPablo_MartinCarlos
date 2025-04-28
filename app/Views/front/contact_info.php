<!-- Encabezado CONTACTO con fondo degradado -->
<section class="conteiner-fluid">
    <div class="style-div-titulo">
        <h2 class="style-titulo">CONTACTO</h2>
    </div>
    <div class="container mt-5 mb-5">
        <!-- Sección de contacto -->
        <div class="row align-items-center mb-5">
            <!-- Contenido alineado a la izquierda -->
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="./assets/img/Iconos_layout/envelope.svg" width="60" height="60" class="mb-3">
                <p class="fs-5">
                    <strong>Consultas:</strong><br>
                    <a href="mailto:ventas@404clothing.com.ar" class="text-decoration-none" style="color: #333; font-size: 1.2rem;">ventas@404clothing.com.ar</a>
                </p>
            </div>

            <div class="col-md-6 text-center">
                <a href="https://www.facebook.com" target="_blank" class="me-4">
                    <img src="./assets/img/Iconos_layout/facebook.svg" width="60" height="60" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="./assets/img/Iconos_layout/instagram.svg" width="60" height="60" alt="Instagram">
                </a>
            </div>
        </div>
</section>
<!-- Separador de Sección -->
<div class="d-flex align-items-center justify-content-center my-5 w-100">
    <img src="./assets/img/grafiti.jpg" alt="Separador" class="img-fluid w-100 img-separador">
</div>
<!-- Formulario de Consulta -->
<section class="conteiner-fluid">
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4" style="font-weight: bold;">Formulario de Consulta</h2>
    <form class="p-5 border rounded-4 shadow bg-white">
        <!-- Apellido y Nombre -->
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Apellido" aria-label="Apellido" required pattern="[A-Za-zÀ-ÿ\s]+">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="Nombre" required pattern="[A-Za-zÀ-ÿ\s]+">
            </div>
        </div>
        <!-- Correo Electrónico -->
        <div class="mb-4">
            <input type="email" class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Correo Electrónico" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
        </div>
        <!-- Número de Teléfono -->
        <div class="mb-4">
            <input type="tel" class="form-control form-control-lg" id="telefono" placeholder="Número de Teléfono" aria-label="Número de Teléfono" required pattern="[0-9]+" title="Por favor, ingresa solo números.">
        </div>
        <!-- Mensaje de Consulta -->
        <div class="mb-4">
            <textarea class="form-control form-control-lg" rows="5" placeholder="Mensaje de Consulta" aria-label="Mensaje de Consulta" required></textarea>
        </div>
        <!-- Botón de Enviar y Limpiar -->
        <div class="text-center">
            <button type="submit" class="btn btn-dark btn-lg me-3 px-5 py-2">Enviar</button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-5 py-2">Limpiar</button>
        </div>
    </form>
    </div>
    </div>
</section>


<script>
    document.getElementById('telefono').addEventListener('input', function(e) {
        // Elimina cualquier carácter que no sea un número
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
</script>