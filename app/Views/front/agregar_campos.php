<h1>Agregar Categorias</h1>
<section style="justify-content: center;display: flex;">
    <div class="col-md-6" style="justify-content: center;">
        <form method="POST" action="<?php echo base_url('/categoria');?>">
            <div class="form-floating mb-3 col-md-11" style="margin-left:20px">
                <input type="text" class="form-control mb-3" id="categoria" placeholder="Remera" name="categoria">
                <label for="categoria">Agregar Categoria</label>
                <button type="submit" class="btn btn-primary">Agregar Categoria</button>
            </div>
        </form>
        <form method="POST" action="<?php echo base_url('/marca');?>">
            <div class="form-floating mb-3 col-md-11" style="margin-left:20px">
                <input type="text" class="form-control mb-3" id="marca" placeholder="Marca" name="marca">
                <label for="marca">Agregar Marca</label>
                <button type="submit" class="btn btn-primary" >Agregar Marca</button>
            </div>
        </form><br>
    </div>

    <div class="col-md-6" style="justify-content: center;" >
        <form method="POST" action="<?php echo base_url('/talla');?>">
            <div class="form-floating mb-3 col-md-11" style="margin-left:20px">
                <input type="text" class="form-control mb-3" id="talla" placeholder="talla" name="talla">
                <label for="talla">Agregar Talla</label>
                <button type="submit" class="btn btn-primary">Agregar Talla</button>
            </div>
        </form>
        <form method="POST" action="<?php echo base_url('/color');?>">
            <div class="form-floating mb-3 col-md-11" style="margin-left:20px">
                <input type="text" class="form-control mb-3" id="color" placeholder="Color" name="color">
                <label for="color">Agregar Color</label>
                <button type="submit" class="btn btn-primary">Agregar Color</button>
            </div>
        </form>
    </div>
</section>