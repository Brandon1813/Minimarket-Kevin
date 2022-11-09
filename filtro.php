<?php
sleep(1);
include('./models/config.php');
/* Formato de fecha*/
$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

/* Tabla que se desea mostrar */
$minimarket_kevin = ("SELECT * FROM ventas WHERE  `Ven_Fecha` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY Ven_Fecha ASC");
$query = mysqli_query($con, $minimarket_kevin);
//print_r($minimarket_kevin);
$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total  .')';
?>

<!-- Muestra la tabla  -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">FECHA</th>
            <th scope="col">VENTA TOTAL</th>
            
        </tr>
    </thead>
    <!-- Para llamar las tablas de sql que se quieren mostrar  -->
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dataRow['ID'];?></td>
                <td><?php echo $dataRow['Ven_Nombre']; ?></td>
                <td><?php echo $dataRow['Ven_Fecha']; ?></td>
                <td><?php echo '$ ' . $dataRow['Ven_Total']; ?></td>
                
            </tr>
        </tbody>
    <?php } ?>
</table>