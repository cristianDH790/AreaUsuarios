<?php require_once "MenuSuperiorAdmin.php"?>

<style>
.btn-image {
    display: inline-flex;
    align-items: center;
}

label {
    width: 100% !important;
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


<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">USUARIOS ADMINISTRATIVOS</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the .</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between btn-image">
            <h6 class="m-0 font-weight-bold text-primary">Cargando de la base de datos...</h6>
            <button class="btn btn-success btn-sm  m-1  " data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                <img src="<?php print RUTA;?>public/img/agregar.png">
            </button>
        </div>
        <div class="card-body">
            <div class="table">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <tbody>
                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                        <tr class="align-items-center">
                            <td> <?php print $datos["dataTable"][$i]["Dni"];?> </td>
                            <td> <?php print $datos["dataTable"][$i]["ApellidoPaterno"];
    print " ";
    print $datos["dataTable"][$i]["ApellidoMaterno"];
    print " ";
    print $datos["dataTable"][$i]["Nombre"];?> </td>

                            <td> <?php print $datos["dataTable"][$i]["Telefono"];?> </td>
                            <td> <?php if ($datos["dataTable"][$i]["IdRol"] == 1) {print "ADMINISTRADOR";} elseif ($datos["dataTable"][$i]["IdRol"] == 2) {print "VENDEDOR";} else {print "VALIDADOR";}?>
                            </td>
                            <td> <?php if ($datos["dataTable"][$i]["IdEstado"] == 1) {print "<p ><span class='text-success' style='font-size: 1.5em;''>&#8226;</span> ACTIVO</p>";} else {print "<p><span class='text-danger' style='font-size: 1.5em;''>&#8226;</span> INACTIVO</p>";}?>
                            </td>
                            <td>
                                <div class=" btn-image">

                                    <button class="btn btn-primary btn-sm  m-1  " data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?php print $datos['dataTable'][$i]['IdUsuarios'];?>a">
                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                    </button>
                                    <button class="btn btn-warning btn-sm  m-1 " data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?php print $datos['dataTable'][$i]['IdUsuarios'];?>b">
                                        <img src="<?php print RUTA;?>public/img/editar2.png ">
                                    </button>
                                    <button class="btn btn-danger btn-sm  m-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal<?php print $datos['dataTable'][$i]['IdUsuarios'];?>">
                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                    </button>

                                </div>

                                <!-- eliminar Modal-->
                                <div class="modal fade"
                                    id="exampleModal<?php print $datos['dataTable'][$i]['IdUsuarios'];?>" tabindex="-1"
                                    data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel"> Eliminar Usuario:
                                                </h5>
                                                <span href="" data-bs-dismiss="modal" aria-label="Close"
                                                    class="ho">X</span>
                                            </div>
                                            <div class="modal-body">
                                                <p>Estas seguro de eliminar a
                                                    <?php print $datos["dataTable"][$i]["ApellidoPaterno"];
                                                    print " ";
                                                    print $datos["dataTable"][$i]["ApellidoMaterno"];
                                                    print " ";
                                                    print $datos["dataTable"][$i]["Nombre"];
                                                    ?> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <a href="<?php print RUTA;?>AdminControlador/BorrarUsuario/<?php print $datos['dataTable'][$i]['IdUsuarios'];?>"
                                                    type="button" class="btn btn-primary">Si</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- editar Modal-->
                                <div class="modal fade"
                                    id="staticBackdrop<?php print $datos['dataTable'][$i]['IdUsuarios'];?>b"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?php print RUTA;?>AdminControlador/EditarUsuario/" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="staticBackdropLabel">Editar
                                                            Nuevo Usuario </h4>
                                                        <span href="" data-bs-dismiss="modal" aria-label="Close"
                                                            class="ho">X</span>
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
                                                                    for="apellidopaterno" class="col-form-label">Apellido
                                                                    Paterno:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoPaterno"];?> "
                                                                    name="apellidopaterno" class="form-control"
                                                                    >
                                                            </div>

                                                        </div>
                                                        <div class="mb-2 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="apellidomaterno" class="col-form-label">Apellido
                                                                    Materno:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoMaterno"];?>"
                                                                    name="apellidomaterno" class="form-control"
                                                                    
                                                                    >
                                                            </div>
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="nombre"
                                                                    class="col-form-label">Nombre:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos["dataTable"][$i]["Nombre"];?>"
                                                                    name="nombre" class="form-control"
                                                                    
                                                                    >
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
                                                                class="form-control"  >
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="rol"
                                                                    class="col-form-label">Rol:</label>
                                                                <select class="form-control form-control"  name="rol"
                                                                    >
                                                                    <?php
if ($datos["dataTable"][$i]["IdRol"] == "1") {
        ?>
                                                                    <option selected value="1">ADMINISTRADOR</option>
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
                                                                    <option selected value="3">VALIDADOR</option>
                                                                    <?php
}

    ?>


                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="estado"
                                                                    class="col-form-label">Estado:</label>
                                                                <select class="form-control form-control" name="estado"
                                                                    >
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
                                                                    class="form-control" >
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="Contrasena"
                                                                    class="col-form-label">Contraseña:</label>
                                                                <input type="password" name="contrasena"
                                                                    value="<?php print $datos["dataTable"][$i]["Contrasena"];?>"
                                                                    class="form-control"  >
                                                            </div>
                                                        </div>
                                                        <input type="text" name="idusuarios"
                                                            value="<?php print $datos["dataTable"][$i]["IdUsuarios"];?>"
                                                            id="miInput" class="d-none">


                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Editar </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- ver Modal-->
                                <div class="modal fade"
                                    id="staticBackdrop<?php print $datos['dataTable'][$i]['IdUsuarios'];?>a"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?php print RUTA;?>AdministradorControlador/Editar/"
                                            method="POST">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="staticBackdropLabel">Ver
                                                            Usuario </h4>
                                                        <span href="" data-bs-dismiss="modal" aria-label="Close"
                                                            class="ho">X</span>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-2 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="dni2"
                                                                    class="col-form-label">DNI:</label>
                                                                <input type="number" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["Dni"];?>"
                                                                    name="dni2" class="form-control" 
                                                                    oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="apellidopaterno2" class="col-form-label">Apellido
                                                                    Paterno:</label>
                                                                <input type="text" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoPaterno"];?> "
                                                                    name="apellidopaterno2" class="form-control" 
                                                                    >
                                                            </div>

                                                        </div>
                                                        <div class="mb-2 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="apellidomaterno2" class="col-form-label">Apellido
                                                                    Materno:</label>
                                                                <input type="text" disabled 
                                                                    value="<?php print $datos["dataTable"][$i]["ApellidoMaterno"];?>"
                                                                    name="apellidomaterno2" class="form-control"
                                                                    >
                                                            </div>
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="nombre2"
                                                                    class="col-form-label">Nombre:</label>
                                                                <input type="text" disabled
                                                                    value="<?php print $datos["dataTable"][$i]["Nombre"];?>"
                                                                    name="nombre2" class="form-control" 
                                                                    >
                                                            </div>

                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="correo2" class="col-form-label">Correo
                                                                Electronico:</label>
                                                            <input type="email" disabled
                                                                value="<?php print $datos["dataTable"][$i]["Email"];?>"
                                                                name="correo2" class="form-control"  >
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="correoingreso2" class="col-form-label">Correo
                                                                Electronico Ingreso:</label>
                                                            <input type="email" name="correoingreso2" disabled
                                                                value="<?php print $datos["dataTable"][$i]["EmailEnvio"];?>"
                                                                class="form-control"  >
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="rol2"
                                                                    class="col-form-label">Rol:</label>
                                                                <select disabled class="form-control form-control"
                                                                    name="rol2" id="exampleSelect" >
                                                                    <?php
if ($datos["dataTable"][$i]["IdRol"] == "1") {
        ?>
                                                                    <option selected value="1">ADMINISTRADOR</option>
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
                                                                    <option selected value="3">VALIDADOR</option>
                                                                    <?php
}

    ?>


                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="Estado2"
                                                                    class="col-form-label">Estado:</label>
                                                                <select disabled class="form-control form-control"
                                                                    name="estado2" >
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
                                                                    disabled class="form-control" id="Telefono2" >
                                                            </div>
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="contrasena2"
                                                                    class="col-form-label">Contraseña:</label>
                                                                <input type="password" name="contrasena2"
                                                                    value="<?php print $datos["dataTable"][$i]["Contrasena"];?>"
                                                                    disabled class="form-control"  >
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Agregar Modal-->
                                <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?php print RUTA;?>AdminControlador/AgregarUsuario" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fs-5" id="staticBackdropLabel">Agregar Nuevo
                                                        Usuario </h4>
                                                    <span href="" data-bs-dismiss="modal" aria-label="Close"
                                                        class="ho">X</span>
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
                                                        <div class=" col-sm-6 mb-2 mb-sm-0"><label for="apellidopaterno3"
                                                                class="col-form-label">Apellido Paterno:</label>
                                                            <input type="text" 
                                                                value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                name="apellidopaterno3" class="form-control"
                                                                >
                                                        </div>

                                                    </div>
                                                    <div class="mb-2 row">
                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="apellidomaterno3"
                                                                class="col-form-label">Apellido Materno:</label>
                                                            <input type="text" 
                                                                value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                name="apellidomaterno3" class="form-control"
                                                                >
                                                        </div>
                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombre3"
                                                                class="col-form-label">Nombre:</label>
                                                            <input type="text"
                                                                value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                name="nombre3" class="form-control"  >
                                                        </div>

                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="correo3" class="col-form-label">Correo
                                                            Electronico:</label>
                                                        <input type="email"
                                                            value="<?php //print $datos['dataTable'][$i]['Correo'];?>"
                                                            name="correo3"  class="form-control" >
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="correoingreso3" class="col-form-label">Correo
                                                            Electronico Ingreso:</label>
                                                        <input type="correo" name="correoingreso3" class="form-control" 
                                                            >
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="rol3" class="col-form-label">
                                                                Rol:</label>
                                                            <select class="form-control form-control" name="rol3"
                                                                >
                                                                <option value="" disabled="" selected="" hidden="">
                                                                    Seleciona un Rol</option>

                                                                <option value="1">ADMINISTRADOR</option>

                                                                <option value="2">VENTA</option>

                                                                <option value="3">VALIDADOR</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="Estado3"
                                                                class="col-form-label">Estado:</label>
                                                            <select class="form-control form-control" name="estado3"
                                                                >
                                                                <option value="" disabled="" selected="" hidden="">
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
                                                            <input type="number" name="telefono3" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="contrasena3"
                                                                class="col-form-label">Contraseña:</label>
                                                            <input type="password" name="contrasena3"
                                                                class="form-control" >
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>


<?php require_once "FooterInferiorAdmin.php"?>