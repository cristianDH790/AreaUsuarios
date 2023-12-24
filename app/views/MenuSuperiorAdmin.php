<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php print $datos["titulo"];?></title>
    <!-- jQuery -->
    <script src="<?php print RUTA;?>/plugins/jquery/jquery.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php print RUTA;?>public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php print RUTA;?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php print RUTA;?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/summernote/summernote-bs4.min.css">
    <!-- Bootstrap 4 -->
    <script src="<?php print RUTA;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- DataTables -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php print RUTA;?>/plugins/fontawesome-free/css/all.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php print RUTA;?>public/plugins/toastr/toastr.min.css">

    <!-- SweetAlert2 -->
    <script src="<?php print RUTA;?>public/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php print RUTA;?>public/plugins/toastr/toastr.min.js"></script>


    <!-- Bootstrap 4 -->
    <script src="<?php print RUTA;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php print RUTA;?>dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="80" width="80">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php print RUTA;?>AdminControlador" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link" data-toggle="modal" data-target="#modal-defaultsalir">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php print RUTA;?>AdminControlador" class="brand-link d-flex justify-content-center">

                <span
                    class="brand-text font-weight-light"><?php if ($datos["data"]["IdRol"] == 1) {print "ADMINISTRADOR";} elseif ($datos["data"]["IdRol"] == 2) {print "VENDEDOR";} else {print "VALIDADOR";}?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">

                    <div class="info">
                        <a href="<?php print RUTA;?>AdminControlador" class="d-block" style="font-size: 13px; "><?php print $datos["data"]["ApellidoPaterno"];
print " ";
print $datos["data"]["ApellidoMaterno"];
print " ";
print $datos["data"]["Nombre"];?></a>
                    </div>

                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="<?php print RUTA;?>AdminControlador/UsuariosAdmin" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Registros
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/BancosAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bancos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/ConveniosAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Convenios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/ExpositoresAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expositores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/FirmasAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Firmas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/ProductosAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Servicios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php print RUTA;?>AdminControlador/ServiciosAdmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Servicios</p>
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




        <?php
if(isset($_GET['datos'])) {
    // Acceder a $_GET['datos'] aquí
    
// Recuperar los datos serializados de la URL
$data_serialized = $_GET['datos'];
// Deserializar y obtener el array original
$datos = unserialize(base64_decode(urldecode($data_serialized)));

//var_dump ($datos["color"]);
//print ($datos["errores"][0]);

if (isset($datos["errores"])) {
    if (count($datos["errores"]) > 0) {
        ?>
        <script>
        toastr.<?php print ($datos['color'])?>('<?php
        foreach($datos["errores"] as $key=>$value){
            print "".$value."";         
            }
        ?>')
        </script>
        <?php
}
}



} else {
    ?>
        <?php
if (isset($datos["errores"])) {
    if (count($datos["errores"]) > 0) {
        ?>
        <script>
        toastr.<?php print ($datos['color'])?>('<?php
        foreach($datos["errores"] as $key=>$value){
            print "".$value."";         
            }
        ?>')
        </script>
        <?php
}
}
?>
        <?php
}
?>