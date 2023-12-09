<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php print $datos["titulo"];?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php print RUTA;?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/202a211a84.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="<?php print RUTA;?>public/css/sb-admin-2.min.css" rel="stylesheet">

    <!--cerrar alertas-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- fin cerrar alertas-->




    <!-- Toastr -->
    <link rel="stylesheet" href="<?php print RUTA;?>public/plugins/toastr/toastr.min.css">

    <!-- jQuery -->
    <script src="<?php print RUTA;?>public/plugins/jquery/jquery.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?php print RUTA;?>public/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php print RUTA;?>public/plugins/toastr/toastr.min.js"></script>

    <!-- fin plugins de adminlte-->

    



</head>


<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?php print RUTA;?>AdminControlador">
                <div class="sidebar-brand-text mx-3">
                    <?php if ($datos["data"]["IdRol"] == 1) {print "ADMINISTRADOR";} elseif ($datos["data"]["IdRol"] == 2) {print "VENDEDOR";} else {print "VALIDADOR";}?>
                    <sup></sup>
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php print RUTA;?>AdminControlador">
                    <i class="fas fa-fw fa-home"></i>
                    <span>INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?php print RUTA;?>AdminControlador/UsuariosAdmin">
                    <i class="fas fa-user"></i>
                    <span>Usuarios</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Registros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registros :</h6>
                        <a class="collapse-item" href="<?php print RUTA;?>AdminControlador/BancosAdmin">Bancos</a>

                        <a class="collapse-item" href="<?php print RUTA;?>AdminControlador/ConveniosAdmin">Convenios</a>
                        <a class="collapse-item" href="">Expositores</a>
                        <a class="collapse-item" href="#">Firmas</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pacientes General</span>
                </a>
                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pacientes :</h6>
                        <a class="collapse-item"
                            href="<?php print RUTA;?>AdministradorControlador/PacientesGeneral">Pacientes General</a>
                        <a class="collapse-item" href="cards.html">Mis Pacientes</a>
                        <a class="collapse-item"
                            href="<?php print RUTA;?>AdministradorControlador/AgregarPacientes">Agregar Paciente</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Eventos General</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Eventos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Eventos General</a>
                        <a class="collapse-item" href="utilities-border.html">Mis Eventos</a>
                        <a class="collapse-item" href="utilities-animation.html">Agregar Evento</a>
                        <a class="collapse-item" target="_blank" href="https://my.leadpages.com/#/dashboard">Crear
                            Pagina Evento</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">








        </ul>
        <!-- End of Sidebar -->
        <!-- Page Wrapper -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print $datos["data"]["ApellidoPaterno"];
print " ";
print $datos["data"]["ApellidoMaterno"];
print " ";
print $datos["data"]["Nombre"];?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?php print RUTA;?>public/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


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