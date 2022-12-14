<?php

 
require 'models/configuracion.php';
require 'models/database.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->prepare("SELECT producto_id, producto_nombre,producto_descripcion, producto_precio FROM productoInv WHERE producto_activo=1");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
 
    <link href="assets/css/estilos.css" rel="stylesheet">
</head>

<body>
   
    <header>
        <nav   class="navbar navbar-expand-lg bg-primary">
            <div  class="container">
                <img class="avatar"src="./assets/img/logo.png">
                <p class="navbar-brand text-dark" > MiniMarket<br>Kevin</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navBarTop">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="./index.php">Inicio </a>
                        </li>

                        
                    </ul>

                    <a href="checkout.php" class="btn btn-primary">
                         <span id="num_select" class="badge bg-secondary"><?php echo $num_select; ?></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
 
    <main>
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  row-cols-md-4 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">

                            <?php
                            $id = $row['producto_id'];
                            $imagen = "assets/img/productos/$id/vanish.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "assets/img/no_photo.jpg";
                            }
                            ?>
                            <a href="details.php?id=<?php echo $row['producto_id']; ?>&token=<?php echo hash_hmac('sha1', $row['producto_id'], KEY_TOKEN); ?>">
                                <img src="<?php echo $imagen; ?>" class="card-img-top img-thumbnail">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['producto_nombre']; ?></h5>
                                <h6 class="card-title"><?php echo $row['producto_descripcion']; ?></h6>
                                <p class="card-text"><?php echo MONEDA . ' ' . number_format($row['producto_precio'], 2, '.', ','); ?></p>

                                <div class=" ">
                                    <div class="btn-group">
 
                                    </div>
                                    <a class="btn btn-primary d-block" onClick="addProducto(<?php echo $row['producto_id']; ?>, '<?php echo hash_hmac('sha1', $row['producto_id'], KEY_TOKEN); ?>')">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function addProducto(producto_id, token) {
            var url = 'clases/factura.php';
            var formData = new FormData();
            formData.append('producto_id', producto_id);
            formData.append('token', token);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_select")
                        elemento.innerHTML = data.numero;
                    }
                })
        }
    </script>
</body>

</html>