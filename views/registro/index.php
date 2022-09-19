<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
        <section id="registro">
            <div class="container">
                <form action="<?php echo constant('URL'); ?>/registro/registrarItem" method="POST" class="form text-center">
                    <h2 class="text-center">Registro de Items</h2>
                    <div class="d-flex">
                        <label for="nombre">Nombre</label><br>
                        <input type="text" name="nombre" required>
                    </div>
                    <div class="d-flex">
                        <label for="precio">Precio</label><br>
                        <input type="text" name="precio" required> 
                    </div>
                    <div class="d-flex">
                        <label for="imagen">Imagen</label><br>
                        <input type="text" name="imagen" required>
                    </div>
                    <div class="d-flex">
                        <label for="categoria">Categoria</label><br>
                        <input type="text" name="categoria" required>
                    </div>
                    <div class="">
                        <input type="submit" value="registrar">
                    </div>
                    <div class="text-center">
                        <?php echo $this->mensaje; ?>
                    </div>
                </form>
            </div>
        </section>
    <?php require 'views/footer.php'; ?>
</body>
</html>