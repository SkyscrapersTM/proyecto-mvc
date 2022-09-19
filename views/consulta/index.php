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
        <div class="container">
            <div id="respuesta" class="text-center"></div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Acción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tbody-items">
                    <?php 
                        include_once 'models/item.php';
                        foreach($this->datos as $row){
                            $item = new Item();
                            $item = $row;
                    ?>
                    <tr id="fila-<?php echo $item->id; ?>" class="active-row">
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->nombre; ?></td>
                        <td>S/<?php echo $item->precio; ?>.00</td>
                        <td><?php echo $item->categoria; ?></td>
                        <td><a href="<?php echo constant('URL') . 'consulta/verItem/' . $item->id; ?>">Editar</a></td>
                        <td><button class="bEliminar" data-id="<?php echo $item->id; ?>">Eliminar</button></td>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php constant('URL'); ?>public/js/main.js"></script>
</body>
</html>