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
                    <h1 class="m-0">Firmas</h1>
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
                                            <th>ALIAS</th>
                                            <th>TEXTO</th>
                                            <th>TEXTO 2</th>

                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                        <tr class="align-items-center">
                                            <td> <?php print $datos["dataTable"][$i]["IdDirectorioFirmas"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Alias"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Texto1"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Texto2"];?> </td>



                                            <td>
                                                <div class=" btn-image  w-100 d-flex justify-content-center">


                                                    <button type="button" class="btn btn-primary btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>a">
                                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>b">
                                                        <img src="<?php print RUTA;?>public/img/editar2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>">
                                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                                    </button>

                                                </div>
                                                <!-- eliminar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>">
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
                                                                <p>Estas seguro de eliminar?
                                                                </p>


                                                            </div>
                                                            <div class="modal-footer justify-content-end">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="<?php print RUTA;?>AdminControlador/borrarFirma/<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>"
                                                                    type="button" class="btn btn-primary">Si</a>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- ver Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>a">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ver
                                                                    Firma:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                            for="nombreInstitucion3"
                                                                            class="col-form-label">Alias:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Alias']; ?>"
                                                                            disabled class="form-control">
                                                                    </div>


                                                                </div>
                                                                <hr width="98%" size="1"
                                                                    style="border-color: #858796; border-style: dashed;">
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto1:</label>
                                                                        <textarea disabled class="form-control"
                                                                            name="Texto1"
                                                                            rows="8"><?php print $datos['dataTable'][$i]['Texto1']; ?></textarea>


                                                                    </div>

                                                                </div>
                                                                <hr width="98%" size="1"
                                                                    style="border-color: #858796; border-style: dashed;">
                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                            for="textofirmadecano3"
                                                                            class="col-form-label">Texto2:</label>
                                                                        <textarea disabled class="form-control"
                                                                            name="Texto2"
                                                                            rows="8"><?php print $datos['dataTable'][$i]['Texto2']; ?></textarea>


                                                                    </div>

                                                                </div>

                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            class="col-form-label">
                                                                            Firma:<a href="#" id="removeImageLink1"
                                                                                style="display: none;"
                                                                                class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA; ?>public/img/ImgFirmas/<?php  print $datos['dataTable'][$i]['ImagenFirma'];  ?>"
                                                                                alt="Vista previa de la imagen">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            class="col-form-label">
                                                                            Sello:<a href="#" id="removeImageLink1"
                                                                                style="display: none;"
                                                                                class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA; ?>public/img/ImgFirmas/<?php  print $datos['dataTable'][$i]['ImagenSello'];  ?>"
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

                                                <!-- editar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdDirectorioFirmas'];?>b">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="<?php print RUTA;?>AdminControlador/EditarFirma/"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Editar
                                                                        Firma:</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-12 mb-2 mb-sm-0"><label
                                                                                for="decano3"
                                                                                class="col-form-label">Alias:</label>
                                                                            <input type="text" name="Alias" value="<?php print $datos['dataTable'][$i]['Alias'];?>"
                                                                                class="form-control">
                                                                        </div>


                                                                    </div>
                                                                    <hr width="98%" size="1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Texto1:</label>
                                                                            <textarea class="form-control" name="Texto1"
                                                                                rows="8"><?php print $datos['dataTable'][$i]['Texto1'];?></textarea>


                                                                        </div>

                                                                    </div>
                                                                    <hr width="98%" size="1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class=" col-sm-12 mb-3 mb-sm-0"><label
                                                                                for="textofirmadecano3"
                                                                                class="col-form-label">Texto2:</label>
                                                                            <textarea class="form-control" name="Texto2"
                                                                                rows="8"><?php print $datos['dataTable'][$i]['Texto2'];?></textarea>


                                                                        </div>
                                                                        <input invisible type="hidden"
                                                                                value="<?php print $datos['dataTable'][$i]['IdDirectorioFirmas']; ?>"
                                                                                name="IdDirectorioFirmas" class="form-control d-none">

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
                                                                                    name="ImagenFirma"
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
                                                                                    src="<?php print RUTA; ?>public/img/ImgFirmas/<?php print $datos['dataTable'][$i]['ImagenFirma']; ?>"
                                                                                    alt="Vista previa de la imagen">
                                                                            </div>
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
                                                                                    id="newFileInput8" accept="image/*"
                                                                                    name="ImagenSello"
                                                                                    onchange="mostrarVistaPrevia(this, newImagePreview8)">
                                                                                <label class="custom-file-label"
                                                                                    for="newFileInput8">Elegir
                                                                                    archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 mb-2 mb-sm-0">
                                                                            <label for="directorAcademico3"
                                                                                class="col-form-label">Vista previa:
                                                                            </label>
                                                                            <div class="w-100 img-thumbnail">
                                                                                <img id="newImagePreview8"
                                                                                    class="w-100 h-75"
                                                                                    src="<?php print RUTA; ?>public/img/ImgFirmas/<?php print $datos['dataTable'][$i]['ImagenSello']; ?>"
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




                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <tr>
                                            <th>#</th>
                                            <th>ALIAS</th>
                                            <th>TEXTO</th>
                                            <th>TEXTO 2</th>

                                            <th>ACCION</th>
                                        </tr>
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

        <!-- modal agregar-->
        <!-- Agregar Modal-->
        <div class="modal fade" id="modal-defaultagregar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php print RUTA;?>AdminControlador/AgregarFirma" method="POST"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar
                                Firma:</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1 row">
                                <div class=" col-sm-12 mb-2 mb-sm-0"><label for="decano3"
                                        class="col-form-label">Alias:</label>
                                    <input type="text" name="Alias" value="" class="form-control">
                                </div>


                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-12 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Texto1:</label>
                                    <textarea class="form-control" name="Texto1" rows="8"></textarea>


                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-12 mb-3 mb-sm-0"><label for="textofirmadecano3"
                                        class="col-form-label">Texto2:</label>
                                    <textarea class="form-control" name="Texto2" rows="8"></textarea>


                                </div>

                            </div>

                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-2 mb-sm-0">
                                    <label for="imagen">Selecciona una firma:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput2" accept="image/*"
                                            name="ImagenFirma">
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
                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                            alt="Vista previa de la imagen">

                                    </div>
                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-2 mb-sm-0">
                                    <label for="imagen">Selecciona un sello</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput1" accept="image/*"
                                            name="ImagenSello">
                                        <label class="custom-file-label" for="archivo2">Elegir
                                            archivo</label>
                                    </div>

                                </div>
                                <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3"
                                        class="col-form-label">Vista
                                        previa: <a href="#" id="removeImageLink1" style="display: none;"
                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                    <div class="w-100  img-thumbnail ">
                                        <img id="imagePreview1" class="w-100 h-75"
                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
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