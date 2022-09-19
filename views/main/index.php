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
        <section id="portada">
            <div class="container-home">
                <div class="d-flex align-self-center justify-content-center">
                    <div>
                        <h1>Science live</h1>
                        <p>Los mejores resultados en el tiempo adecuado</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="about-us">
            <div class="container">
                <div class="d-flex align-self-center justify-content-center">
                    <div class="w-50 text-center">
                        <img src="<?php echo constant('URL'); ?>public/img/doctor-485w.png" alt="Doctor Alpha">
                    </div>
                    <div class="w-50">
                        <div class="text-center">
                            <h2>#1 La mejor tecnología para ti</h2>
                            <br>
                            <p>
                                Contamos con la más moderna tecnología e infraestructura física para que se disfrute de todas las comodidades durante su tratamiento.
                            </p> 
                            <br> 
                            <p>
                                Certificados por **** y distruidos a Países como US, Japón, Alemania y muchos más.
                            </p>                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php require 'views/footer.php'; ?>
</body>
</html>