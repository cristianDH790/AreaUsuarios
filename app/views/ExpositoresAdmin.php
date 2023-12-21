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
                    <h1 class="m-0">Expositores</h1>
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
                                            <th>DNI</th>
                                            <th>PREFIJO</th>
                                            <th>APELLIDO P</th>
                                            <th>APELLIDO M</th>
                                            <th>NOMBRES</th>
                                            <th>TELEFONO</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                        <tr class="align-items-center">
                                            <td> <?php print $datos["dataTable"][$i]["IdExpositores"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Dni"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Prefijo"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["ApellidoPaterno"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["ApellidoMaterno"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Nombre"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Telefono"];?> </td>
                                            <td>
                                                <div class=" btn-image  w-100 d-flex justify-content-center">


                                                    <button type="button" class="btn btn-primary btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>a">
                                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>b">
                                                        <img src="<?php print RUTA;?>public/img/editar2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>">
                                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                                    </button>

                                                </div>
                                                <!-- eliminar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar
                                                                    Expositor:</h4>
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
                                                                <a href="<?php print RUTA;?>AdminControlador/borrarExpositor/<?php print $datos['dataTable'][$i]['IdExpositores'];?>"
                                                                    type="button" class="btn btn-primary">Si</a>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- editar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>b">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="<?php print RUTA;?>AdminControlador/EditarExpositor/"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Editar
                                                                        Expositor:</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                                for="nombreInstitucion3"
                                                                                class="col-form-label">DNI:</label>
                                                                            <input type="number"
                                                                                value="<?php print $datos['dataTable'][$i]['Dni'];?>"
                                                                                name="dni" class="form-control"
                                                                                oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                                                        </div>
                                                                        <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                                for="decano3"
                                                                                class="col-form-label">Prefijo:</label>
                                                                            <input type="text" name="prefijo"
                                                                                value="<?php print $datos['dataTable'][$i]['Prefijo'];?>"
                                                                                class="form-control">
                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Apellido
                                                                                Paterno:</label>
                                                                            <input type="text" name="apellidoPaterno"
                                                                                value="<?php print $datos['dataTable'][$i]['ApellidoPaterno'];?>"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                                for="directorAcademico3"
                                                                                class="col-form-label">Apellido
                                                                                Materno:</label>
                                                                            <input type="text" name="apellidoMaterno"
                                                                                value="<?php print $datos['dataTable'][$i]['ApellidoMaterno'];?>"
                                                                                class="form-control">
                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Nombre:</label>
                                                                            <input type="text" name="nombre"
                                                                                value="<?php print $datos['dataTable'][$i]['Nombre'];?>"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Telefono:</label>
                                                                            <input type="text"
                                                                                value="<?php print $datos['dataTable'][$i]['Telefono'];?>"
                                                                                name="telefono" class="form-control">
                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Reseña:</label>
                                                                            <textarea class="form-control" name="reseña"
                                                                                rows="8"> <?php print $datos['dataTable'][$i]['Reseña'];?></textarea>


                                                                        </div>
                                                                        <div class=" col-sm-6 mb-3 mb-sm-0">
                                                                            <input type="text"
                                                                                value="<?php print $datos['dataTable'][$i]['IdExpositores'];?>"
                                                                                name="IdExpositores"
                                                                                class="form-control d-none">
                                                                        </div>

                                                                    </div>
                                                                    <hr width="98%" size="1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-7 mb-3 mb-sm-0">
                                                                            <label>Seleccionar foto
                                                                                del expositor:</label>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="newFileInput7" accept="image/*"
                                                                                    name="archivo1"
                                                                                    onchange="mostrarVistaPrevia(this, newImagePreview7)">
                                                                                <label class="custom-file-label"
                                                                                    for="newFileInput7">Elegir
                                                                                    archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 mb-2 mb-sm-0">
                                                                            <label for="directorAcademico3"
                                                                                class="col-form-label">Vista previa:
                                                                            </label>
                                                                            <div class="w-100 img-thumbnail">
                                                                                <img id="newImagePreview7"
                                                                                    class="w-100 h-75"
                                                                                    src="<?php print RUTA;?>public/img/ImgExpositores/<?php print $datos['dataTable'][$i]['FotoPerfil'];?>"
                                                                                    alt="Vista previa de la imagen">
                                                                            </div>
                                                                        </div>
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
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdExpositores'];?>a">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ver
                                                                    Expositor:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                            for="nombreInstitucion3"
                                                                            class="col-form-label">DNI:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Dni'];?>"
                                                                            disabled class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="decano3"
                                                                            class="col-form-label">Decano:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Prefijo'];?>"
                                                                            disabled class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto
                                                                            firma decano:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['ApellidoPaterno'];?>"
                                                                            disabled class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="directorAcademico3"
                                                                            class="col-form-label">Director
                                                                            academico:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['ApellidoMaterno'];?>"
                                                                            disabled class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto
                                                                            firma director:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Nombre'];?>"
                                                                            disabled class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto
                                                                            firma director:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Telefono'];?>"
                                                                            disabled class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto
                                                                            firma director:</label>
                                                                        <textarea class="form-control" disabled
                                                                            name="archivo1"
                                                                            rows="8"><?php print $datos['dataTable'][$i]['Reseña'];?></textarea>


                                                                    </div>

                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            class="col-form-label">
                                                                            Logo:<a href="#" id="removeImageLink1"
                                                                                style="display: none;"
                                                                                class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA;?>public/img/ImgExpositores/<?php print $datos['dataTable'][$i]['FotoPerfil'];?>"
                                                                                alt="Vista previa de la imagen">
                                                                        </div>
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
                                            <th>DNI</th>
                                            <th>PREFIJO</th>
                                            <th>APELLIDO P</th>
                                            <th>APELLIDO M</th>
                                            <th>NOMBRES</th>
                                            <th>TELEFONO</th>
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
                    <form action="<?php print RUTA;?>AdminControlador/AgregarExpositor" method="POST"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar
                                Expositor:</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1 row">
                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombreInstitucion3"
                                        class="col-form-label">DNI:</label>
                                    <input type="number" value="" name="dni" class="form-control"
                                        oninput="javascript: if (this.value.length > 8) this.value = this.value.slice(0, 8);">
                                </div>
                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="decano3"
                                        class="col-form-label">Prefijo:</label>
                                    <input type="text" name="prefijo" value="" class="form-control">
                                </div>

                            </div>
                            <div class="mb-1 row">
                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Apellido
                                        Paterno:</label>
                                    <input type="text" name="apellidoPaterno" value="" class="form-control">
                                </div>
                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="directorAcademico3"
                                        class="col-form-label">Apellido
                                        Materno:</label>
                                    <input type="text" name="apellidoMaterno" value="" class="form-control">
                                </div>

                            </div>
                            <div class="mb-1 row">
                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Nombre:</label>
                                    <input type="text" name="nombre" value="" class="form-control">
                                </div>
                                <div class=" col-sm-6 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Telefono:</label>
                                    <input type="text" name="telefono" value="" name="telefono" class="form-control">
                                </div>

                            </div>
                            <div class="mb-1 row">
                                <div class=" col-sm-12 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Reseña:</label>
                                    <textarea class="form-control" name="reseña" rows="8"></textarea>


                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-2 mb-sm-0">
                                    <label for="imagen">Seleccionar foto
                                        del expositor:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput2" accept="image/*"
                                            name="archivo1">
                                        <label class="custom-file-label" for="archivo2">Elegir
                                            archivo</label>
                                    </div>

                                </div>
                                <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3"
                                        class="col-form-label">Vista
                                        previa: <a href="#" id="removeImageLink2" style="display: none;"
                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                    <div class="w-100  img-thumbnail ">
                                        <img id="imagePreview2" class="w-100 h-75"
                                            src="<?php print RUTA;?>public/img/fondoblanco.png"
                                            alt="Vista previa de la imagen">

                                    </div>
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