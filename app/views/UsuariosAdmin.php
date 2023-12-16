<?php  require_once("MenuSuperiorAdmin.php")  ?>

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
                                    <th>DNI</th>
                                    <th>NOMBRE COMPLETO</th>

                                    <th>TELEFONO</th>
                                    <th>ROL</th>
                                    <th>ESTADO</th>

                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                <tr class="align-items-center">
                                    <td> <?php print $datos["dataTable"][$i]["Dni"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["ApellidoPaterno"];
                                    print " ";
                                    print $datos["dataTable"][$i]["ApellidoMaterno"];
                                    print " ";
                                    print $datos["dataTable"][$i]["Nombre"];?>
                                    </td>

                                    <td> <?php print $datos["dataTable"][$i]["Telefono"];?> </td>
                                    <td> <?php if ($datos["dataTable"][$i]["IdRol"] == 1) {print "ADMINISTRADOR";} elseif ($datos["dataTable"][$i]["IdRol"] == 2) {print "VENDEDOR";} else {print "VALIDADOR";}?>
                                    </td>
                                    <td> <?php if ($datos["dataTable"][$i]["IdEstado"] == 1) {print "<p ><span class='text-success' style='font-size: 1.5em;''>&#8226;</span> ACTIVO</p>";} else {print "<p><span class='text-danger' style='font-size: 1.5em;''>&#8226;</span> INACTIVO</p>";}?>
                                    </td>
                                    <td>
                                        <div class=" btn-image  w-100 d-flex justify-content-center">

                                            <button type="button" class="btn btn-primary btn-sm  m-1"
                                                data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>a">
                                                <img src="<?php print RUTA;?>public/img/search2.png">
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm  m-1"
                                                data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>b">
                                                <img src="<?php print RUTA;?>public/img/editar2.png">
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm  m-1" data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>">
                                                <img src="<?php print RUTA;?>public/img/borrar.png">
                                            </button>

                                        </div>
                                        <!-- eliminar Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar
                                                            Usuario:</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Estas seguro de eliminar a
                                                            <?php print $datos["dataTable"][$i]["ApellidoPaterno"];
                                                            print " ";
                                                            print $datos["dataTable"][$i]["ApellidoMaterno"];
                                                            print " ";
                                                            print $datos["dataTable"][$i]["Nombre"];?>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="<?php print RUTA;?>AdminControlador/BorrarUsuario/<?php print $datos['dataTable'][$i]['IdUsuarios'];?>"
                                                            type="button" class="btn btn-primary">Si</a>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <!-- editar Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>b">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?php print RUTA;?>AdminControlador/EditarUsuario/"
                                                        method="POST">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar
                                                                Usuario:</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="mb-2 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="recipient-name"
                                                                        class="col-form-label">DNI:</label>
                                                                    <input type="number"
                                                                        value="<?php print $datos["dataTable"][$i]["Dni"];?>"
                                                                        name="dni" class="form-control"
                                                                        oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                        for="apellidopaterno"
                                                                        class="col-form-label">Apellido
                                                                        Paterno:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos["dataTable"][$i]["ApellidoPaterno"];?> "
                                                                        name="apellidopaterno" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-2 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="apellidomaterno"
                                                                        class="col-form-label">Apellido
                                                                        Materno:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos["dataTable"][$i]["ApellidoMaterno"];?>"
                                                                        name="apellidomaterno" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombre"
                                                                        class="col-form-label">Nombre:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos["dataTable"][$i]["Nombre"];?>"
                                                                        name="nombre" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="correo" class="col-form-label">Correo
                                                                    Electronico:</label>
                                                                <input type="email"
                                                                    value="<?php print $datos["dataTable"][$i]["Email"];?>"
                                                                    name="correo" class="form-control">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="correoingreso" class="col-form-label">Correo
                                                                    Electronico Ingreso:</label>
                                                                <input type="email" name="correoingreso"
                                                                    value="<?php print $datos["dataTable"][$i]["EmailEnvio"];?>"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="rol" class="col-form-label">Rol:</label>
                                                                    <select class="form-control form-control"
                                                                        name="rol">
                                                                        <?php
                                                                        if ($datos["dataTable"][$i]["IdRol"] == "1") {
                                                                            ?>

                                                                        <option selected value="1">ADMINISTRADOR
                                                                        </option>
                                                                        <option value="2">VENTA</option>
                                                                        <option value="3">VALIDADOR</option>
                                                                        <?php
                                                                        }
                                                                        if ($datos["dataTable"][$i]["IdRol"] == "2") {
                                                                            ?>

                                                                        <option value="1">ADMINISTRADOR</option>
                                                                        <option selected value="2">VENTA</option>
                                                                        <option value="3">VALIDADOR</option>
                                                                        <?php
                                                                        }if ($datos["dataTable"][$i]["IdRol"] == "3") {
                                                                            ?>

                                                                        <option value="1">ADMINISTRADOR</option>
                                                                        <option value="2">VENTA</option>
                                                                        <option selected value="3">VALIDADOR
                                                                        </option>
                                                                        <?php
                                                                        }

                                                                        ?>



                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="estado"
                                                                        class="col-form-label">Estado:</label>
                                                                    <select class="form-control form-control"
                                                                        name="estado">
                                                                        <?php
                                                                        if ($datos["dataTable"][$i]["IdEstado"] == "1") {
                                                                            ?>

                                                                        <option selected value="1">ACTIVO</option>
                                                                        <option value="2">INACTIVO</option>

                                                                        <?php
                                                                        }
                                                                        if ($datos["dataTable"][$i]["IdEstado"] == "2") {
                                                                            ?>

                                                                        <option value="1">ACTIVO</option>
                                                                        <option selected value="2">INACTIVO</option>
                                                                        <?php
                                                                         }

                                                                         ?>




                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <div class="mb-2 row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="telefono"
                                                                        class="col-form-label">Telefono:</label>
                                                                    <input type="number" name="telefono"
                                                                        value="<?php print $datos["dataTable"][$i]["Telefono"];?>"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="Contrasena"
                                                                        class="col-form-label">Contraseña:</label>
                                                                    <input type="password" name="contrasena"
                                                                        value="<?php print $datos["dataTable"][$i]["Contrasena"];?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <input type="text" name="idusuarios"
                                                                value="<?php print $datos["dataTable"][$i]["IdUsuarios"];?>"
                                                                id="miInput" class="d-none">


                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Editar
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ver Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdUsuarios'];?>a">
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
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label for="dni2"
                                                                    class="col-form-label">DNI:</label>
                                                                <input type="number" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["Dni"];?>"
                                                                    name="dni2" class="form-control"
                                                                    oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="apellidopaterno2"
                                                                    class="col-form-label">Apellido
                                                                    Paterno:</label>
                                                                <input type="text" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoPaterno"];?> "
                                                                    name="apellidopaterno2" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="mb-2 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="apellidomaterno2"
                                                                    class="col-form-label">Apellido
                                                                    Materno:</label>
                                                                <input type="text" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoMaterno"];?>"
                                                                    name="apellidomaterno2" class="form-control">
                                                            </div>
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombre2"
                                                                    class="col-form-label">Nombre:</label>
                                                                <input type="text" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["Nombre"];?>"
                                                                    name="nombre2" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="correo2" class="col-form-label">Correo
                                                                Electronico:</label>
                                                            <input type="email" disabled
                                                                value="<?php print $datos["dataTable"][$i]["Email"];?>"
                                                                name="correo2" class="form-control">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="correoingreso2" class="col-form-label">Correo
                                                                Electronico Ingreso:</label>
                                                            <input type="email" name="correoingreso2" disabled
                                                                value="<?php print $datos["dataTable"][$i]["EmailEnvio"];?>"
                                                                class="form-control">
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="rol2" class="col-form-label">Rol:</label>
                                                                <select disabled class="form-control form-control"
                                                                    name="rol2" id="exampleSelect">
                                                                    <?php
                                                                    if ($datos["dataTable"][$i]["IdRol"] == "1") {
                                                                        ?>

                                                                    <option selected value="1">ADMINISTRADOR
                                                                    </option>
                                                                    <option value="2">VENTA</option>
                                                                    <option value="3">VALIDADOR</option>
                                                                    <?php
                                                                    }
                                                                    if ($datos["dataTable"][$i]["IdRol"] == "2") {
                                                                        ?>

                                                                    <option value="1">ADMINISTRADOR</option>
                                                                    <option selected value="2">VENTA</option>
                                                                    <option value="3">VALIDADOR</option>
                                                                    <?php
                                                                    }if ($datos["dataTable"][$i]["IdRol"] == "3") {
                                                                        ?>

                                                                    <option value="1">ADMINISTRADOR</option>
                                                                    <option value="2">VENTA</option>
                                                                    <option selected value="3">VALIDADOR
                                                                    </option>
                                                                    <?php
                                                                    }

                                                                    ?>



                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="Estado2"
                                                                    class="col-form-label">Estado:</label>
                                                                <select disabled class="form-control form-control"
                                                                    name="estado2">
                                                                    <?php
                                                                    if ($datos["dataTable"][$i]["IdEstado"] == "1") {
                                                                        ?>

                                                                    <option selected value="1">ACTIVO</option>
                                                                    <option value="2">INACTIVO</option>

                                                                    <?php
                                                                    }
                                                                    if ($datos["dataTable"][$i]["IdEstado"] == "2") {
                                                                        ?>

                                                                    <option value="1">Activo</option>
                                                                    <option selected value="2">INACTIVO</option>
                                                                    <?php
                                                                    }

                                                                    ?>




                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="mb-2 row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="Telefono2"
                                                                    class="col-form-label">Telefono:</label>
                                                                <input type="number" name="telefono2"
                                                                    value="<?php print $datos["dataTable"][$i]["Telefono"];?>"
                                                                    disabled class="form-control" id="Telefono2">
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="contrasena2"
                                                                    class="col-form-label">Contraseña:</label>
                                                                <input type="password" name="contrasena2"
                                                                    value="<?php print $datos["dataTable"][$i]["Contrasena"];?>"
                                                                    disabled class="form-control">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <!-- Agregar Modal-->
                                        <div class="modal fade" id="modal-defaultagregar">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?php print RUTA;?>AdminControlador/AgregarUsuario"
                                                        method="POST">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Agregar
                                                                Usuario:</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="mb-2 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="dni3"
                                                                        class="col-form-label">DNI:</label>
                                                                    <input type="number"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="dni3" class="form-control"
                                                                        oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                        for="apellidopaterno3"
                                                                        class="col-form-label">Apellido Paterno:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="apellidopaterno3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-2 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="apellidomaterno3"
                                                                        class="col-form-label">Apellido Materno:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="apellidomaterno3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombre3"
                                                                        class="col-form-label">Nombre:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="nombre3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="correo3" class="col-form-label">Correo
                                                                    Electronico:</label>
                                                                <input type="email"
                                                                    value="<?php //print $datos['dataTable'][$i]['Correo'];?>"
                                                                    name="correo3" class="form-control">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="correoingreso3"
                                                                    class="col-form-label">Correo
                                                                    Electronico Ingreso:</label>
                                                                <input type="correo" name="correoingreso3"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="rol3" class="col-form-label">
                                                                        Rol:</label>
                                                                    <select class="form-control form-control"
                                                                        name="rol3">
                                                                        <option value="" disabled="" selected=""
                                                                            hidden="">
                                                                            Seleciona un Rol</option>

                                                                        <option value="1">ADMINISTRADOR</option>

                                                                        <option value="2">VENTA</option>

                                                                        <option value="3">VALIDADOR</option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="Estado3"
                                                                        class="col-form-label">Estado:</label>
                                                                    <select class="form-control form-control"
                                                                        name="estado3">
                                                                        <option value="" disabled="" selected=""
                                                                            hidden="">
                                                                            Seleciona un Estado</option>

                                                                        <option value="1">ACTIVO</option>

                                                                        <option value="2">INACTIVO</option>

                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <div class="mb-2 row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="telefono3"
                                                                        class="col-form-label">Telefono:</label>
                                                                    <input type="number" name="telefono3"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <label for="contrasena3"
                                                                        class="col-form-label">Contraseña:</label>
                                                                    <input type="password" name="contrasena3"
                                                                        class="form-control">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>DNI</th>
                                    <th>NOMBRE COMPLETO</th>

                                    <th>TELEFONO</th>
                                    <th>ROL</th>
                                    <th>ESTADO</th>

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





<?php  require_once("FooterInferiorAdmin.php")  ?>