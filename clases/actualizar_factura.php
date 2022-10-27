<?php

require '../models/configuracion.php';
require '../models/database.php';


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if ($action == 'eliminar') {
        $datos['ok'] = eliminar($id);
    } else if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id, $cantidad);
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function eliminar($id)
{
    if ($id > 0) {
        if (isset($_SESSION['factura']['productos'][$id])) {
            unset($_SESSION['factura']['productos'][$id]);
            return true;
        }
    } else {
        return false;
    }
}

function agregar($id, $cantidad)
{
    $res = 0;
    if ($id > 0 && $cantidad > 0 && is_numeric($cantidad)) {
        if (isset($_SESSION['factura']['productos'][$id])) {
            $_SESSION['factura']['productos'][$id] = $cantidad;

            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT precio, descuento FROM productos WHERE id=? AND activo=1");
            $sql->execute([$id]);
            $producto = $sql->fetch(PDO::FETCH_ASSOC);
            $descuento = $producto['descuento'];
            $precio = $producto['precio'];
            $oferta= $precio - (($precio * $descuento) / 100);
            $res = $cantidad * $oferta;

            return $res;
        }
    } else {
        return $res;
    }
}
