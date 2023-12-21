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

                                    <th>NOMBRE INSTITUCION</th>
                                    <th>NOMBRE DECANO</th>
                                    <th>TEXTO FIRMA DECANO</th>
                                    <th>DIRECTOR ACADEMICO</th>

                                    <th>TEXTO FIRMA DIRECTOR</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                <tr class="align-items-center">
                                    <td> <?php print $datos["dataTable"][$i]["IdConvenio"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["NombreInstitucion"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["Decano"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["TextoFirmaDecano"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["DirectorAcademico"];?> </td>
                                    <td> <?php print $datos["dataTable"][$i]["TextoFirmaDirector"];?> </td>
                                    <td>
                                        <div class=" btn-image  w-100 d-flex justify-content-center">


                                            <button type="button" class="btn btn-primary btn-sm  m-1"
                                                data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>a">
                                                <img src="<?php print RUTA;?>public/img/search2.png">
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm  m-1"
                                                data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>b">
                                                <img src="<?php print RUTA;?>public/img/editar2.png">
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm  m-1" data-toggle="modal"
                                                data-target="#modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>">
                                                <img src="<?php print RUTA;?>public/img/borrar.png">
                                            </button>

                                        </div>
                                        <!-- eliminar Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar
                                                            Convenio:</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Estas seguro de eliminar?</p>


                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="<?php print RUTA;?>AdminControlador/BorrarConvenio/<?php print $datos['dataTable'][$i]['IdBanco'];?>"
                                                            type="button" class="btn btn-primary">Si</a>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <!-- ver Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>a">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ver
                                                            Convenio:</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-1 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="nombreInstitucion3"
                                                                    class="col-form-label">Nombre
                                                                    de institucion:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos['dataTable'][$i]['NombreInstitucion']; ?>"
                                                                    name="nombreInstitucion3" class="form-control">
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label for="decano3"
                                                                    class="col-form-label">Decano:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos['dataTable'][$i]['Decano']; ?>"
                                                                    name="decano3" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="mb-1 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="textofirmadecano3" class="col-form-label">Texto
                                                                    firma decano:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos['dataTable'][$i]['TextoFirmaDecano']; ?>"
                                                                    name="textofirmadecano3" class="form-control">
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="directorAcademico3"
                                                                    class="col-form-label">Director
                                                                    academico:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos['dataTable'][$i]['DirectorAcademico']; ?>"
                                                                    name="directorAcademico3" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="mb-1 row">
                                                            <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                    for="textofirmadecano3" class="col-form-label">Texto
                                                                    firma director:</label>
                                                                <input type="text"
                                                                    value="<?php print $datos['dataTable'][$i]['TextoFirmaDirector']; ?>"
                                                                    name="textofirmadirector3" class="form-control">
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label for="vacio"
                                                                    class="col-form-label"></label>
                                                                <input invisible type="hidden" value="" name="vacio"
                                                                    class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="mb-1 row">
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="directorAcademico3" class="col-form-label">
                                                                    Logo:<a href="#" id="removeImageLink1"
                                                                        style="display: none;"
                                                                        class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                </label>
                                                                <div class="w-100  img-thumbnail ">
                                                                    <img class="w-100 h-75"
                                                                        src="<?php print RUTA; ?>public/img/ImgConvenio/<?php  print $datos['dataTable'][$i]['Logo'];  ?>"
                                                                        alt="Vista previa de la imagen">
                                                                </div>
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="directorAcademico3"
                                                                    class="col-form-label">Firma
                                                                    Decano: <a href="#" id="removeImageLink1"
                                                                        style="display: none;"
                                                                        class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                </label>
                                                                <div class="w-100  img-thumbnail ">
                                                                    <img class="w-100 h-75"
                                                                        src="<?php print RUTA; ?>public/img/ImgConvenio/<?php  print $datos['dataTable'][$i]['FirmaDecano'];  ?>"
                                                                        alt="Vista previa de la imagen">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="mb-1 row">
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="directorAcademico3" class="col-form-label">
                                                                    Firma
                                                                    Director:
                                                                </label>
                                                                <div class="w-100  img-thumbnail ">
                                                                    <img class="w-100 h-75"
                                                                        src="<?php print RUTA; ?>public/img/ImgConvenio/<?php  print $datos['dataTable'][$i]['FirmaDirector'];  ?>"
                                                                        alt="Vista previa de la imagen">
                                                                </div>
                                                            </div>
                                                            <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                    for="directorAcademico3"
                                                                    class="col-form-label">Sello
                                                                    :
                                                                </label>
                                                                <div class="w-100  img-thumbnail ">
                                                                    <img class="w-100 h-75"
                                                                        src="<?php print RUTA; ?>public/img/ImgConvenio/<?php  print $datos['dataTable'][$i]['Sello'];  ?>"
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
                                        <!-- Agregar Modal-->
                                        <div class="modal fade" id="modal-defaultagregar">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?php print RUTA;?>AdminControlador/AgregarConvenio"
                                                        method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Agregar
                                                                Convenio:</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="nombreInstitucion3"
                                                                        class="col-form-label">Nombre
                                                                        de institucion:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="nombreInstitucion3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="decano3"
                                                                        class="col-form-label">Decano:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="decano3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="textofirmadecano3"
                                                                        class="col-form-label">Texto
                                                                        firma decano:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="textofirmadecano3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Director
                                                                        academico:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="directorAcademico3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="textofirmadecano3"
                                                                        class="col-form-label">Texto
                                                                        firma director:</label>
                                                                    <input type="text"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="textofirmadirector3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="vacio"
                                                                        class="col-form-label"></label>
                                                                    <input invisible type="hidden"
                                                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                                                        name="vacio" class="form-control">
                                                                </div>

                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                                                    <label>Seleccionar un logo:</label>
                                                                    <div class="custom-file">

                                                                        <input type="file" class="custom-file-input"
                                                                            id="fileInput1" accept="image/*"
                                                                            name="archivo1">
                                                                        <label class="custom-file-label"
                                                                            for="archivo1">Elegir
                                                                            archivo</label>
                                                                    </div>

                                                                </div>
                                                                <div class=" col-sm-5 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Vista
                                                                        previa: <a href="#" id="removeImageLink1"
                                                                            style="display: none;"
                                                                            class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                    </label>
                                                                    <div class="w-100  img-thumbnail ">
                                                                        <img id="imagePreview1" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                                                            alt="Vista previa de la imagen">


                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                                                    <label for="imagen">Seleccionar firma
                                                                        decano:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="fileInput2" accept="image/*"
                                                                            name="archivo2">
                                                                        <label class="custom-file-label"
                                                                            for="archivo2">Elegir
                                                                            archivo</label>
                                                                    </div>

                                                                </div>
                                                                <div class=" col-sm-5 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Vista
                                                                        previa: <a href="#" id="removeImageLink2"
                                                                            style="display: none;"
                                                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                                                    <div class="w-100  img-thumbnail ">
                                                                        <img id="imagePreview2" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                                                            alt="Vista previa de la imagen">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                                                    <label for="imagen">Seleccionar firma
                                                                        director:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="fileInput3" accept="image/*"
                                                                            name="archivo3">
                                                                        <label class="custom-file-label"
                                                                            for="archivo3">Elegir
                                                                            archivo</label>
                                                                    </div>

                                                                </div>
                                                                <div class=" col-sm-5 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Vista
                                                                        previa: <a href="#" id="removeImageLink3"
                                                                            style="display: none;"
                                                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                                                    <div class="w-100  img-thumbnail ">
                                                                        <img id="imagePreview3" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                                                            alt="Vista previa de la imagen">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                                                    <label for="imagen">Seleccionar un sello:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="fileInput4" accept="image/*"
                                                                            name="archivo4">
                                                                        <label class="custom-file-label"
                                                                            for="archivo4">Elegir
                                                                            archivo</label>
                                                                    </div>

                                                                </div>
                                                                <div class=" col-sm-5 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Vista
                                                                        previa: <a href="#" id="removeImageLink4"
                                                                            style="display: none;"
                                                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                                                    <div class="w-100  img-thumbnail ">
                                                                        <img id="imagePreview4" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                                                            alt="Vista previa de la imagen">

                                                                    </div>
                                                                </div>

                                                            </div>





                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- editar Modal-->
                                        <div class="modal fade"
                                            id="modal-default<?php print $datos['dataTable'][$i]['IdConvenio'];?>b">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?php print RUTA;?>AdminControlador/EditarConvenio/"
                                                        method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar
                                                                Convenio:</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="nombreInstitucion3"
                                                                        class="col-form-label">Nombre
                                                                        de institucion:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['NombreInstitucion']; ?>"
                                                                        name="nombreInstitucion3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="decano3"
                                                                        class="col-form-label">Decano:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['Decano']; ?>"
                                                                        name="decano3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="textofirmadecano3"
                                                                        class="col-form-label">Texto
                                                                        firma decano:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['TextoFirmaDecano']; ?>"
                                                                        name="textofirmadecano3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                        for="directorAcademico3"
                                                                        class="col-form-label">Director
                                                                        academico:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['DirectorAcademico']; ?>"
                                                                        name="directorAcademico3" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="mb-1 row">
                                                                <div class=" col-sm-6 mb-3 mb-sm-0"><label
                                                                        for="textofirmadecano3"
                                                                        class="col-form-label">Texto
                                                                        firma director:</label>
                                                                    <input type="text"
                                                                        value="<?php print $datos['dataTable'][$i]['TextoFirmaDirector']; ?>"
                                                                        name="textofirmadirector3" class="form-control">
                                                                </div>
                                                                <div class=" col-sm-6 mb-2 mb-sm-0"><label for="vacio"
                                                                        class="col-form-label"></label>
                                                                    <input invisible type="hidden"
                                                                        value="<?php print $datos['dataTable'][$i]['IdConvenio']; ?>"
                                                                        name="IdConvenio" class="form-control">
                                                                </div>

                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                                    <label>Seleccionar un logo:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="newFileInput5" accept="image/*"
                                                                            name="archivo1"
                                                                            onchange="mostrarVistaPrevia(this, newImagePreview5)">
                                                                        <label class="custom-file-label"
                                                                            for="newFileInput5">Elegir archivo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 mb-2 mb-sm-0">
                                                                    <label for="directorAcademico3"
                                                                        class="col-form-label">Vista previa: </label>
                                                                    <div class="w-100 img-thumbnail">
                                                                        <img id="newImagePreview5" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>/img/ImgConvenio/<?php print $datos['dataTable'][$i]['Logo']; ?>"
                                                                            alt="Vista previa de la imagen">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                                    <label>Seleccionar una firma decano:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="newFileInput6" accept="image/*"
                                                                            name="archivo2"
                                                                            onchange="mostrarVistaPrevia(this, newImagePreview6)">
                                                                        <label class="custom-file-label"
                                                                            for="newFileInput6">Elegir archivo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 mb-2 mb-sm-0">
                                                                    <label for="directorAcademico3"
                                                                        class="col-form-label">Vista previa: </label>
                                                                    <div class="w-100 img-thumbnail">
                                                                        <img id="newImagePreview6" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/ImgConvenio/<?php print $datos['dataTable'][$i]['FirmaDecano']; ?>"
                                                                            alt="Vista previa de la imagen">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                                    <label>Seleccionar una firma director:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="newFileInput7" accept="image/*"
                                                                            name="archivo3"
                                                                            onchange="mostrarVistaPrevia(this, newImagePreview7)">
                                                                        <label class="custom-file-label"
                                                                            for="newFileInput7">Elegir archivo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 mb-2 mb-sm-0">
                                                                    <label for="directorAcademico3"
                                                                        class="col-form-label">Vista previa: </label>
                                                                    <div class="w-100 img-thumbnail">
                                                                        <img id="newImagePreview7" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/ImgConvenio/<?php print $datos['dataTable'][$i]['FirmaDirector']; ?>"
                                                                            alt="Vista previa de la imagen">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr width="98%" size="1"
                                                                style="border-color: #858796; border-style: dashed;">
                                                            <div class="mb-1 row">
                                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                                    <label>Seleccionar un sello:</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="newFileInput8" accept="image/*"
                                                                            name="archivo4"
                                                                            onchange="mostrarVistaPrevia(this, newImagePreview8)">
                                                                        <label class="custom-file-label"
                                                                            for="newFileInput8">Elegir archivo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 mb-2 mb-sm-0">
                                                                    <label for="directorAcademico3"
                                                                        class="col-form-label">Vista previa: <a href="#"
                                                                            id="newRemoveImageLink8"
                                                                            onclick="quitarImagen(newFileInput8, newImagePreview8)"
                                                                            class="text-decoration-none text-prymari">[QUITAR]</a>
                                                                    </label>
                                                                    <div class="w-100 img-thumbnail">
                                                                        <img id="newImagePreview8" class="w-100 h-75"
                                                                            src="<?php print RUTA; ?>public/img/ImgConvenio/<?php print $datos['dataTable'][$i]['Sello']; ?>"
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
                                    <th>#</th>
                                    <th>NOMBRE INSTITUCION</th>

                                    <th>NOMBRE DECANO</th>
                                    <th>TEXTO FIRMA DECANO</th>
                                    <th>DIRECTOR ACADEMICO</th>

                                    <th>TEXTO FIRMA DIRECTOR</th>
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

<!-- modal agregar-->




<?php require_once "FooterInferiorAdmin.php"?>