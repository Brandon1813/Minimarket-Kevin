<?php

session_start();
include_once 'conexion_login.php';

$db = mysqli_connect("localhost", "root", "", "minimarket_kevin");

$correo = $_POST['correo'];
$contrasena= $_POST['contrasena'];
/* $password = md5($contrasena, ); */



$validar_login = mysqli_query($db, "SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario']= $correo;
    header("location: ../index.php"); 
    exit();
}else{
    echo '
        <script>
            alert ("Este usuario no existe, por favor validar los datos");
        window.location = "../iniciar.php";
        </script>
   ';
   exit();
}