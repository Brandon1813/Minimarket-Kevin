<?php

 
define("SITE_URL", "http://localhost/");//nombre del sitio
define("KEY_TOKEN", "CREAR_TOKEN");//crear contraseña para encriptar envio de datos por url
define("MONEDA", "$");

 

session_start();

$num_select = 0;
if (isset($_SESSION['factura']['productos'])) {
    $num_select= count($_SESSION['factura']['productos']);
}
