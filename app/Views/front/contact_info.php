<h2 style="text-align: center;">CONTACTO</h2>
<div class="container mt-4">
    <!-- Sección de contacto -->
    <div class="row align-items-center mb-4">
        <!-- Contenido alineado a la izquierda -->
        <div class="col-md-6 text-center mb-3 mb-md-0">
            <img src="./assets/img/Iconos_layout/envelope.svg" width="50" height="50">
            <p>
                <strong>Consultas:</strong><br>
                ventas@404clothing.com.ar
            </p>
        </div>

        <div class="col-md-6 text-center mb-3 mb-md-0">
            <a href="https://www.facebook.com" target="_blank">
                <!-- me-2 agrega un margen pequeño a la derecha -->
                <img src="./assets/img/Iconos_layout/facebook.svg" width="50" height="50" class="me-2" alt="Facebook">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="./assets/img/Iconos_layout/instagram.svg" width="50" height="50" alt="Instagram">
            </a>
        </div>
    </div>

    <!-- Formulario de Consulta -->
    <h2>Formulario de Consulta</h2>
    <form>
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

        <!-- Botón de Enviar -->
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<script>
    document.getElementById('telefono').addEventListener('input', function(e) {
        // Elimina cualquier carácter que no sea un número
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
</script>