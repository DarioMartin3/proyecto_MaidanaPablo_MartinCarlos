<h1>
        Ingreso de Nuevo Producto
</h1>
<section  style="justify-content: center;display: flex;">
    <br>
    <form class="row g-3" style="width: 70%;">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nombre del Producto</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Categoria</label>
            <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Talla</label>
            <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Marca</label>
            <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">stock</label>
            <input type="number" class="form-control" id="inputCity" min=1>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">color</label>
            <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Precio</label>
            <input type="number" class="form-control" id="inputZip" min=1>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-12 conteiner-flex" style="justify-content: center;display: flex;">
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </div>
    </form>
</section>