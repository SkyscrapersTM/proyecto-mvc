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
    <section id="carrito">
        <div class="container text-center">        
            <?php 
                include_once 'models/item.php';
                foreach($this->datos as $row){
                    $item = new Item();
                    $item = $row;
                    require 'views/carrito/items.php';
                }
            ?>
        </div>
    </section>
    <?php require 'views/footer.php'; ?>
    <script src="<?php constant('URL'); ?>public/js/carrito.js"></script>
</body>
</html>