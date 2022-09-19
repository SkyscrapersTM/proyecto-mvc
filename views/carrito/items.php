<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $item->id;  ?>">
    <img src="<?php echo constant('URL') . 'public/img/' . $item->imagen; ?>" alt="Doctor Alpha">
    <div class="titulo"><?php echo $item->nombre;  ?></div>
    <div class="precio">S/<?php echo $item->precio;  ?>.00</div>
    <div class="botones">
        <button class='btn-add'>Agregar al carrito</button>
    </div>
</div>