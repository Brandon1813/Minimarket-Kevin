 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-6">
    

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <rect x="3" y="12" width="6" height="8" rx="1" />
  <rect x="9" y="8" width="6" height="12" rx="1" />
  <rect x="15" y="4" width="6" height="16" rx="1" />
  <line x1="4" y1="20" x2="18" y2="20" />
</svg>
                         <p>
                             Estadísticas 
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a onclick="CargarContenido('content-wrapper','views/graficos.php')" class="nav-link active" style="cursor: pointer;">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Gráfica de Ventas! </p>
                             </a>
                         </li>
                          <li class="nav-item">
                         <a onclick="CargarContenido('content-wrapper','views/reportes.php')" class="nav-link active" style="cursor: pointer;">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Reporte de ventas!</p>
                             </a>
                         </li> 
                     </ul>
                 </li>
                 
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
