<?php

session_start();
include 'conexion_login.php';

$db = mysqli_connect("localhost", "root", "", "login_register_db");

$correo = $_POST['correo'];
$contrasena= $_POST['contrasena'];
/* $password = md5($contrasena, ); */



$validar_login = mysqli_query($db, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario']= $correo;
    header("location: bienvenida.php"); /* pendiente*/
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