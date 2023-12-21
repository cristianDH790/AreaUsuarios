<?php require_once "MenuSuperiorAdmin.php"?>

<style>
.btn-image {
    display: inline-flex;
    align-items: center;
}



.ho:hover {
    color: black;
    cursor: pointer;
    font-weight: bold;
}

.btn-image img {
    width: 20px;
    /* Ajusta el tamaño de la imagen según tus necesidades */
    height: 22px;
    /* Ajusta el tamaño de la imagen según tus necesidades */

}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">

                            <div class="card-header ">
                                <h3 class="card-title">DataTable with default features</h3>
                                <div class="d-flex justify-content-end  btn-image">
                                    <button type="button" class="btn btn-success btn-sm  m-1" data-toggle="modal"
                                        data-target="#modal-defaultagregar">
                                        <img src="<?php print RUTA;?>public/img/agregar.png">
                                    </button>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE PRODUCTO</th>

                                            <th>DOMINIO</th>
                                            <th>DESCRIPCION</th>

                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                        <tr class="align-items-center">
                                            <td> <?php print $datos["dataTable"][$i]["IdProducto"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["NombreProducto"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Dominio"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Descripcion"];?> </td>

                                            
                                            <td>
                                                <div class=" btn-image  w-100 d-flex justify-content-center">


                                                    <button type="button" class="btn btn-primary btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>a">
                                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>b">
                                                        <img src="<?php print RUTA;?>public/img/editar2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>">
                                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                                    </button>

                                                </div>
                                                <!-- eliminar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar
                                                                    Banco:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas seguro de eliminar a:</p>
                                                                <?php print $datos["dataTable"][$i]["NumeroCuenta"];
                                                        print " <br> ";
                                                        print $datos["dataTable"][$i]["NombreTitular"];
                                                        print "<br> ";
                                                        print $datos["dataTable"][$i]["TipoCuenta"];
                                                        ?>

                                                            </div>
                                                            <div class="modal-footer justify-content-end">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="<?php print RUTA;?>AdminControlador/BorrarBanco/<?php print $datos['dataTable'][$i]['IdBanco'];?>"
                                                                    type="button" class="btn btn-primary">Si</a>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- editar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>b">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="<?php print RUTA;?>AdminControlador/EditarBanco/"
                                                                method="POST">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Editar
                                                                        Banco:</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-2 row">
                                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Numero de
                                                                                Cuenta:</label>
                                                                            <input type="number"
                                                                                value="<?php print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                                                                name="numeroCuenta"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                                                            <label for="nombreBanco"
                                                                                class="col-form-label">Nombre de
                                                                                Banco:</label>
                                                                            <input type="text"
                                                                                value="<?php print $datos['dataTable'][$i]['NombreBanco'];?>"
                                                                                name="nombreBanco" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="nombreTitular"
                                                                            class="col-form-label">Nombre
                                                                            de
                                                                            Titular:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['NombreTitular'];?>"
                                                                            name="nombreTitular" class="form-control">
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                                            <label for="tipoCuenta"
                                                                                class="col-form-label">Tipo
                                                                                de
                                                                                Cuenta:</label>
                                                                            <select class="form-control form-control"
                                                                                name="tipoCuenta" id="exampleSelect">
                                                                                <?php
                                                                if ($datos["dataTable"][$i]["TipoCuenta"] == "AHORROS") {
                                                                    ?>


                                                                                <option selected value="AHORROS">AHORROS
                                                                                </option>
                                                                                <option value="CORRIENTE">CORRIENTE
                                                                                </option>

                                                                                <?php
                                                                }
                                                                if ($datos["dataTable"][$i]["TipoCuenta"] == "CORRIENTE") {
                                                                    ?>


                                                                                <option value="AHORROS">AHORROS</option>
                                                                                <option selected value="CORRIENTE">
                                                                                    CORRIENTE
                                                                                </option>
                                                                                <?php
                                                                }

                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                                            <label for="saldo"
                                                                                class="col-form-label">Saldo:</label>
                                                                            <input type="number" step="0.01"
                                                                                value="<?php print $datos['dataTable'][$i]['Saldo'];?>"
                                                                                name="saldo" id="numero_con_coma"
                                                                                class="form-control">
                                                                        </div>
                                                                        <script>
                                                                        // Obtener el campo de entrada
                                                                        var campoNumero = document.getElementById(
                                                                            'numero_con_coma');

                                                                        // Escuchar el evento de entrada para el campo
                                                                        campoNumero.addEventListener('input',
                                                                            function() {
                                                                                // Reemplazar los puntos por comas en el valor del campo
                                                                                this.value = this.value.replace(
                                                                                    /\./g, ',');
                                                                            });
                                                                        </script>
                                                                        <input type="number"
                                                                            value="<?php print $datos['dataTable'][$i]['IdBanco'];?>"
                                                                            name="idBanco" class="form-control d-none">

                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Editar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ver Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdProducto'];?>a">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ver
                                                                    Usuario:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                            for="numeroCuenta2"
                                                                            class="col-form-label">Numero
                                                                            de Cuenta:</label>
                                                                        <input type="number"
                                                                            value="<?php print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                                                            name="numeroCuenta2" class="form-control"
                                                                            disabled>
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="nombreCuenta2"
                                                                            class="col-form-label">Nombre
                                                                            de Banco:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['NombreBanco'];?>"
                                                                            name="nombreCuenta2" class="form-control"
                                                                            disabled>
                                                                    </div>

                                                                </div>
                                                                <div class="mb-2">
                                                                    <label class="col-form-label"
                                                                        for="nombreTitular2">Nombre de
                                                                        Titular:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['NombreTitular'];?>"
                                                                        name="nombreTitular2" class="form-control"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Tipo de Cuenta :</label>
                                                                        <input type="text" disabled
                                                                            value="<?php print $datos['dataTable'][$i]['TipoCuenta'];?>"
                                                                            name="tipoCuenta2" id="numero_con_coma"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0" for="saldo2">
                                                                        <label class="col-form-label">Saldo:</label>
                                                                        <input type="number" step="0.01"
                                                                            value="<?php print $datos['dataTable'][$i]['Saldo'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>


                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE PRODUCTO</th>

                                            <th>DOMINIO</th>
                                            <th>DESCRIPCION</th>

                                            <th>ACCION</th>
                                        </tr>
                                        <p style="color:green"></p>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>


        <!-- Agregar Modal-->
        <div class="modal fade" id="modal-defaultagregar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php print RUTA;?>AdminControlador/AgregarBanco" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar
                                Usuario:</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-2 row">
                                <div class=" col-sm-12 mb-3 mb-sm-0"><label for="numeroCuenta3"
                                        class="col-form-label">Nombre Producto:</label>
                                    <input type="number" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                        name="NombreProducto" class="form-control">
                                </div>
                                

                            </div>
                            <div class="mb-2">
                                <label class="col-form-label" for="nombreTitular3">Dominio:</label>
                                <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                    name="Dominio" class="form-control">
                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-12 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Descripcion:</label>
                                    <textarea class="form-control" name="Descripcion" rows="8"></textarea>


                                </div>

                            </div>
                            



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php require_once "FooterInferiorAdmin.php"?>