<?php
//cuando la sesion está iniciada lo envia a index.php/login//
session_start();
if(isset($_SESSION['usuario'])){
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniMarket</title>
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/estilos.css">
    <link rel=" icon" href="assets/img/logo.png">
    <script src="https://kit.fontawesome.com/acaed10690.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Lora:ital@1&family=Open+Sans:wght@300;400;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
     <!-- ENCABEZADO -->
 
     <input type="checkbox" id="check">
    <nav id="nav-container">
        <div class="icon"><img src="./assets/img/logo.png" alt="">MiniMarket <br> "KEVIN"</BR></div>
        <!-- <div class="search-box">
            <input type="search" placeholder="Buscar">
            <span class="fa fa-search"></span>
        </div> -->
        <ol>
            <li><a href="./php/cerrar_sesion.php">👤Cerrar sesión</a></li>
        </ol>
        <label for="check" class="bar">
            <span class="fa fa-bars" id="bars"></span>
            <span class="fa fa-times" id="times"></span>
        </label>
    </nav>
      <!-- CONTENIDO -->
      <div class="container-card">
        <div class="card">
            <img src="./assets/img/estadisticas.png" alt="">
            <h3>Estadísticas</h3>  
            <p>MIRAR <br>las estadísticas mensuales</p>
            <a href="./indexEs.php">Ver</a>
        </div>
     
        <div class="card">
            <img src="./assets/img/categorias.png" alt="">
            <h3>Productos</h3>  
            <p>SELECCIONE <br>La categoría</p>
            <a href="./products.php">Ir a categorías</a>
        </div>
     
        <div class="card">
            <img src="./assets/img/inventario.webp" alt="">
            <h3>Inventario</h3>  
            <p>GESTIÓNE <br>los productos</p>
            <a href="./gestion-de-inventario/index.php">Ir a inventario</a>
        </div>
         </div>     
         <!-- /CONTENIDO -->
     
         <!-- FOOTER -->
         <footer class="main-footer">
             <strong>Copyright &copy; 2022 <a href="https://github.com/Brandon1813/Minimarket-Kevin">GitHub-Repository</a>.</strong> All rights reserved.
            </footer>
            <!-- /FOOTER -->
            <script>
                 function CargarContenido(contenido){
        $(load(contenido));
    }
            </script>

     </body>
     </html>

      
            
            
            
            
<?php
    

}else{
    header("location: iniciar.php");
}

?>
