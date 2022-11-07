<?php
//cuando la sesion está iniciada lo envia a index.php/login//
session_start();
if(isset($_SESSION['usuario'])){
    header("location: index.php");
}

?>
