<?php
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/estadisticas.png" type="image/x-icon">
    <title>Estadísticas </title>
    
    

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="views/dist/css/adminlte.css">
    
   
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        
        
        <?php
            include 'views/moduls/navbar.php';
            include 'views/moduls/aside.php';
            ?>
            
          
            
            

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="col-sm-6">
                            
                            </div><!-- /.col -->
                            
                            
                        </div><!-- /.row -->
                        <section class="container-fondo"> 
                        <img src="assets/img/fondoEs.png" alt="">   
                        <h2>Bienvenido </h2>
                            <h3>Para nosotros es muy importante que mantengas <br>un control de tus ventas</h3> 
                            
                        </section>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            We can!
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022 <a href="https://github.com/Brandon1813/Minimarket-Kevin">GitHub-Repository</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
 
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="views/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<script>
    function CargarContenido(contenedor, contenido){
        $("."+contenedor).load(contenido);
    }
</script>
</body>
</html>


           
           
        

      



