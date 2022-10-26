<?php

$db = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$db) {
    echo "Error al conectar la base de datos";
}

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
/* $password = md5($contrasena); */

$query=("INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena)VALUE ('" . $nombre_completo . "', '" . $correo . "', '" . $usuario . "', '" . $contrasena . "')");

/*Verificar Correo no Repeat bd*/

$verificar_correo= mysqli_query($db, "SELECT * FROM usuarios WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
  echo '
        <script>
          alert ("Este correo ya se encuentra registrado, intenta con otro diferente");
          window.location = "../iniciar.php";
        </script>
       ';
       exit();
      }

/*Verificar Usuario no Repeat bd*/

$verificar_usuario= mysqli_query($db, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
  echo '
        <script>
          alert ("Este usuario ya se encuentra registrado, intenta con otro diferente");
          window.location = "../iniciar.php";
        </script>
       ';
       exit();
      }      


$ejecutar=mysqli_query($db, $query);
if($ejecutar){
      echo '
      <script>
        alert ("Usuario almacenado");
        window.location = "../iniciar.php";
      </script>
    ';
    }else{
      echo '
      <script>
        alert ("Intentelo nuevamente, usuario no almacenado");
        window.location = "../iniciar.php";
      </script>
    ';
    }
    mysqli_close($db);