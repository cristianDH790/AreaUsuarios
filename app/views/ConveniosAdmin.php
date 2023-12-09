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
    <h1 class="h3 mb-2 text-gray-800">CONVENIOS</h1>
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
                            <th>NOMBRE INSTITUCION</th>
                            <th>DECANO</th>
                            <th>DIRECTOR ACADEMICO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NOMBRE INSTITUCION</th>
                            <th>DECANO</th>
                            <th>DIRECTOR ACADEMICO</th>
                            <th>ACCION</th>
                        </tr>
                        <p style="color:green"></p>
                    </tfoot>
                    <tbody>
                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>
                        <tr class="align-items-center">
                            <td> <?php print $datos["dataTable"][$i]["NombreInstitucion"];?> </td>
                            <td> <?php print $datos["dataTable"][$i]["Decano"];?> </td>
                            <td> <?php print $datos["dataTable"][$i]["DirectorAcademico"];?> </td>
                            <td>
                                <div class="btn-image">
                                    <button class="btn btn-primary btn-sm  m-1  " data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?php print $datos['dataTable'][$i]['IdBanco'];?>a">
                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                    </button>
                                    <button class="btn btn-warning btn-sm  m-1 " data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?php print $datos['dataTable'][$i]['IdBanco'];?>b">
                                        <img src="<?php print RUTA;?>public/img/editar2.png ">
                                    </button>
                                    <button class="btn btn-danger btn-sm  m-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal<?php print $datos['dataTable'][$i]['IdBanco'];?>">
                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                    </button>
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

<!-- Modales -->




<!-- eliminar Modal-->
<div class="modal fade" id="exampleModal<?php print $datos['dataTable'][$i]['IdBanco'];?>" tabindex="-1"
    data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel"> Eliminar Usuario:
                </h5>
                <span href="" data-bs-dismiss="modal" aria-label="Close" class="ho">X</span>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="<?php print RUTA;?>AdminControlador/BorrarBanco/<?php print $datos['dataTable'][$i]['IdBanco'];?>"
                    type="button" class="btn btn-primary">Si</a>
            </div>
        </div>
    </div>
</div>
<!-- editar Modal-->
<div class="modal fade" id="staticBackdrop<?php print $datos['dataTable'][$i]['IdBanco'];?>b" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php print RUTA;?>AdminControlador/EditarBanco/" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="staticBackdropLabel">Editar Banco
                    </h4>
                    <span href="" data-bs-dismiss="modal" aria-label="Close" class="ho">X</span>
                </div>
                <div class="modal-body">






                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ver Modal-->
<div class="modal fade" id="staticBackdrop<?php print $datos['dataTable'][$i]['IdConvenio'];?>a"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="staticBackdropLabel">Ver
                        Banco </h4>
                    <span href="" data-bs-dismiss="modal" aria-label="Close" class="ho">X</span>
                </div>
                <div class="modal-body">

                    <div class="mb-2 row">
                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="numeroCuenta2" class="col-form-label">Numero
                                de Cuenta:</label>
                            <input type="number" value="<?php print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                name="numeroCuenta2" class="form-control" disabled>
                        </div>
                        <div class=" col-sm-6 mb-2 mb-sm-0"><label for="nombreCuenta2" class="col-form-label">Nombre
                                de Banco:</label>
                            <input type="text" value="<?php print $datos['dataTable'][$i]['NombreBanco'];?>"
                                name="nombreCuenta2" class="form-control" disabled>
                        </div>

                    </div>
                    <div class="mb-2">
                        <label class="col-form-label" for="nombreTitular2">Nombre de
                            Titular:</label>
                        <input type="text" value="<?php print $datos['dataTable'][$i]['NombreTitular'];?>"
                            name="nombreTitular2" class="form-control" disabled>
                    </div>
                    <div class="mb-2 row">
                        <div class=" col-sm-6 mb-3 mb-sm-0">
                            <label class="col-form-label" for="tipoCuenta2">
                                Tipo de Cuenta :</label>
                            <input type="text" disabled value="<?php print $datos['dataTable'][$i]['TipoCuenta'];?>"
                                name="tipoCuenta2" id="numero_con_coma" class="form-control">
                        </div>
                        <div class=" col-sm-6 mb-3 mb-sm-0" for="saldo2"><label class="col-form-label">Saldo:</label>
                            <input type="number" step="0.01" value="<?php print $datos['dataTable'][$i]['Saldo'];?>"
                                name="saldo2" class="form-control" disabled>
                        </div>


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Agregar Modal-->
<div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php print RUTA;?>AdminControlador/AgregarConvenio" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="staticBackdropLabel">Agregar Nuevo
                        Convenio </h4>
                    <span href="" data-bs-dismiss="modal" aria-label="Close" class="ho">X</span>
                </div>
                <div class="modal-body">

                    <div class="mb-1 row">
                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="nombreInstitucion3"
                                class="col-form-label">Nombre
                                de institucion:</label>
                            <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="nombreInstitucion3" class="form-control">
                        </div>
                        <div class=" col-sm-6 mb-2 mb-sm-0"><label for="decano3" class="col-form-label">Decano:</label>
                            <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="decano3" class="form-control">
                        </div>

                    </div>
                    <div class="mb-1 row">
                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="textofirmadecano3" class="col-form-label">Texto
                                firma decano:</label>
                            <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="textofirmadecano3" class="form-control">
                        </div>
                        <div class=" col-sm-6 mb-2 mb-sm-0"><label for="directorAcademico3"
                                class="col-form-label">Director
                                academico:</label>
                            <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="directorAcademico3" class="form-control">
                        </div>

                    </div>
                    <div class="mb-1 row">
                        <div class=" col-sm-6 mb-3 mb-sm-0"><label for="textofirmadecano3" class="col-form-label">Texto
                                firma director:</label>
                            <input type="text" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="textofirmadirector3" class="form-control">
                        </div>
                        <div class=" col-sm-6 mb-2 mb-sm-0"><label for="vacio" class="col-form-label"></label>
                            <input invisible type="hidden" value="<?php //print $datos['dataTable'][$i]['Correo']; ?>"
                                name="vacio" class="form-control">
                        </div>

                    </div>
                    <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                    <div class="mb-1 row">
                        <div class=" col-sm-7 mb-3 mb-sm-0">
                            <label>Seleccionar un logo:</label>
                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="fileInput1" accept="image/*"
                                    name="archivo1">
                                <label class="custom-file-label" for="archivo1">Elegir
                                    archivo</label>
                            </div>

                        </div>
                        <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3" class="col-form-label">Vista
                                previa: <a href="#" id="removeImageLink1" style="display: none;"
                                    class="text-decoration-none text-prymari">[QUITAR]</a>
                            </label>
                            <div class="w-100  img-thumbnail ">
                                <img id="imagePreview1" class="w-100 h-75"
                                    src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                    alt="Vista previa de la imagen">


                            </div>

                        </div>

                    </div>
                    <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                    <div class="mb-1 row">
                        <div class=" col-sm-7 mb-3 mb-sm-0">
                            <label for="imagen">Seleccionar firma decano:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileInput2" accept="image/*"
                                    name="archivo2">
                                <label class="custom-file-label" for="archivo2">Elegir
                                    archivo</label>
                            </div>

                        </div>
                        <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3" class="col-form-label">Vista
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
                        <div class=" col-sm-7 mb-3 mb-sm-0">
                            <label for="imagen">Seleccionar firma director:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileInput3" accept="image/*"
                                    name="archivo3">
                                <label class="custom-file-label" for="archivo3">Elegir
                                    archivo</label>
                            </div>

                        </div>
                        <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3" class="col-form-label">Vista
                                previa: <a href="#" id="removeImageLink3" style="display: none;"
                                    class="text-decoration-none text-prymari">[QUITAR]</a></label>
                            <div class="w-100  img-thumbnail ">
                                <img id="imagePreview3" class="w-100 h-75"
                                    src="<?php print RUTA; ?>public/img/fondoblanco.png"
                                    alt="Vista previa de la imagen">

                            </div>
                        </div>

                    </div>
                    <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                    <div class="mb-1 row">
                        <div class=" col-sm-7 mb-3 mb-sm-0">
                            <label for="imagen">Seleccionar un sello:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileInput4" accept="image/*"
                                    name="archivo4">
                                <label class="custom-file-label" for="archivo4">Elegir
                                    archivo</label>
                            </div>

                        </div>
                        <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3" class="col-form-label">Vista
                                previa: <a href="#" id="removeImageLink4" style="display: none;"
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>



            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>

<?php require_once "FooterInferiorAdmin.php"?>