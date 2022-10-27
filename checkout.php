<?php

 
require 'models/configuracion.php';
require 'models/database.php';

$productos = isset($_SESSION['factura']['productos']) ? $_SESSION['factura']['productos'] : null;

$db = new Database();
$con = $db->conectar();

$list_facture = array();

if ($productos != null) {
    foreach ($productos as $key => $producto) {
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $producto AS cantidad FROM productos WHERE id=? AND activo=1");
        $sql->execute([$key]);
        $list_facture[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="assets/css/estilos.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav id="head-color" class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <img class="avatar" src="./assets/img/logo.png">
                <a class="navbar-brand text-dark" href="#">MiniMarket<br>Kevin</a>
                

                <div class="collapse navbar-collapse" id="navBarTop">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="products.php"> Productos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($list_facture == null) {
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach ($list_facture as $producto) {
                                $_id = $producto['id'];
                                $descuento = $producto['descuento'];
                                $precio = $producto['precio'];
                                $cantidad = $producto['cantidad'];
                                $oferta = $precio - (($precio * $descuento) / 100);
                                $subtotal = $cantidad * $oferta;
                                $total += $subtotal;
                        ?>
                                <tr>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo MONEDA . number_format($oferta, 2, '.', ','); ?></td>
                                    <td><input type="number" id="cantidad_<?php echo $_id; ?>" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)" /></td>

                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                                    </td>
                                    <td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"> Eliminar</a></td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">
                                    <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
 
            <?php if ($list_facture != null) { ?>
                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <a href=" #" class="btn btn-primary btn-lg">Realizar venta</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btn-elimina" class="btn btn-danger" onclick="elimina()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event) {
           
            let button = event.relatedTarget
             
            let recipient = button.getAttribute('data-bs-id')
            let botonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            botonElimina.value = recipient
        })

        function actualizaCantidad(cantidad, id) {

            let url = 'clases/actualizar_factura.php';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let divSubtotal = document.getElementById('subtotal_' + id)
                        divSubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for (var i = 0; i < list.length; ++i) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }

                        total = new Intl.NumberFormat('en-COP', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById("total").innerHTML = '<?php echo MONEDA ?>' + total
                    }
                })
        }

        function elimina() {
            let botonElimina = document.getElementById('btn-elimina')
            let recipient = botonElimina.value

            let url = 'clases/actualizar_factura.php';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id', recipient);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload();
                    }
                })
            $('#eliminaModal').modal('hide')
        }
    </script>
    
</body>

</html>