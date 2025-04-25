<div style="background-color: #e5e5e5; padding: 1rem;">
    <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 2rem;">CONTACTO</h2>
</div>
<div class="container mt-5">
    <!-- Sección de contacto -->
    <div class="row align-items-center mb-5">
        <!-- Contenido alineado a la izquierda -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="./assets/img/Iconos_layout/envelope.svg" width="50" height="50" class="mb-3">
            <p class="fs-5">
                <strong>Consultas:</strong><br>
                <a href="mailto:ventas@404clothing.com.ar" class="text-decoration-none text-dark">ventas@404clothing.com.ar</a>
            </p>
        </div>

        <div class="col-md-6 text-center">
            <a href="https://www.facebook.com" target="_blank" class="me-3">
                <img src="./assets/img/Iconos_layout/facebook.svg" width="50" height="50" alt="Facebook">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="./assets/img/Iconos_layout/instagram.svg" width="50" height="50" alt="Instagram">
            </a>
        </div>
    </div>

    <!-- Formulario de Consulta -->
    <h2 class="text-center mb-4">Formulario de Consulta</h2>
    <form class="p-4 border rounded shadow-sm bg-light">
        <!-- Apellido y Nombre -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" required>
            </div>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Correo Electrónico" aria-label="Correo Electrónico" required>
        </div>

        <!-- Número de Teléfono -->
        <div class="mb-3">
            <input type="tel" class="form-control" id="telefono" placeholder="Número de Teléfono" aria-label="Número de Teléfono" required pattern="[0-9]+" title="Por favor, ingresa solo números.">
        </div>

        <!-- Mensaje de Consulta -->
        <div class="mb-3">
            <textarea class="form-control" rows="4" placeholder="Mensaje de Consulta" aria-label="Mensaje de Consulta" required></textarea>
        </div>

        <!-- Botón de Enviar y Limpiar -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg me-3">Enviar</button>
            <button type="reset" class="btn btn-secondary btn-lg">Limpiar</button>
        </div>
    </form>
</div>
<script>
    document.getElementById('telefono').addEventListener('input', function(e) {
        // Elimina cualquier carácter que no sea un número
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
</script>