<?php
//cuando la sesion está iniciada lo envia a bienvenida.php/login//
session_start();
if(isset($_SESSION['usuario'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./assets/css/estilos.css">
</head>
<body>  
       
    <main>    
        <div class="contenedor__todo">
            
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>Inicia sesión para entrar a la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrate</button>
                </div>
            </div>
            <!-- FORMULARIO DE LOGIN -->
        <div  class="contenedor__login-register">
            <form action="php/login_usuario.php" class="formulario__login" method= "POST" style="border: 0.5px solid rgb(0, 0, 0, 0.5)">
                <h2>Iniciar sesión</h2>
                <input type="email" placeholder="📧 Correo Electronico" name="correo" required>
                <input type="password" placeholder="🔐 Contraseña" name="contrasena" required>
                <button>Entrar</button>
                <hr>

                <a href="php/olvido_contraseña.php">¿Has olvidado la contraseña?</a>
            </form>
            <!-- FORMULARIO REGISTRO -->
            <form action="php/registro_usuario.php" method= "POST" class="formulario__register" style="border: 0.5px solid rgb(0, 0, 0, 0.2)">
                <h2>Regístrarse</h2>
                <input type="text" placeholder="👤 Nombre Completo" name="nombre_completo" required >
                <input type="email" placeholder="📧 Correo Electronico" name="correo" required>
                <input type="text" placeholder="👤 Usuario" name="usuario" required>
                <input type="password" placeholder="🔐 Contraseña" name="contrasena" required>
                <button>Regístrarse</button>
            </form>


        </div> 
        </div>    
    </main>               

<script src="js/checkout-login.js"></script>
</body>
</html>