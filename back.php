<?php
session_start(); //inicio sesion//
if(!isset($_SESSION['index'])){
        echo '
        <script>
        window.location = "iniciar.php";
        </script>
        ';
        die(); 
        session_destroy(); // cerrar sesion //
    }
        
session_destroy();
?>