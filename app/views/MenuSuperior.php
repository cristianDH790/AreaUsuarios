<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Inicio Titulo -->
    <title><?php print $datos["titulo"]; ?></title>
    <!--Fin Titulo -->

    <!--Inicio Boostrap-->
    <!-- Custom fonts for this template-->
    <link href="<?php print RUTA;?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php print RUTA;?>public/css/sb-admin-2.min.css" rel="stylesheet">
    <!--Fin Boostrap-->

    <!--cerrar alertas-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- fin cerrar alertas-->


   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php print RUTA;?>public/plugins/toastr/toastr.min.css">
    
    <!-- jQuery -->
    <script src="<?php print RUTA;?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php print RUTA;?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php print RUTA;?>public/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php print RUTA;?>public/plugins/toastr/toastr.min.js"></script>
   
    <!-- fin plugins de adminlte-->
</head>

<body>

<?php
if (isset($datos["errores"])) {
    if (count($datos["errores"]) > 0) {
        ?>
       <script>toastr.<?php print ($datos['color'])?>('<?php
        foreach($datos["errores"] as $key=>$value){
            print "".$value."";         
            }
        ?>')</script>
    <?php
}
}
?>



    


    