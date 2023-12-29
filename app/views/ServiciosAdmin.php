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
                    <h1 class="m-0">Servicios</h1>
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
                                            <th>NombreServicio</th>
                                            <th>Año</th>
                                            <th>Precio</th>
                                            <th>FechaInicio</th>
                                            <th>FechaFin</th>
                                            <th>Tipo</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($datos["dataTable"]); $i++) {?>

                                        <tr class="align-items-center">
                                            <td> <?php print $datos["dataTable"][$i]["IdNumeroServicio"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["NombreServicio"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Año"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Precio"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["FechaInicio"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["FechaFin"];?> </td>
                                            <td> <?php print $datos["dataTable"][$i]["Tipo"];?> </td>

                                            <td>
                                                <div class=" btn-image  w-100 d-flex justify-content-center">


                                                    <button type="button" class="btn btn-primary btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>a">
                                                        <img src="<?php print RUTA;?>public/img/search2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>b">
                                                        <img src="<?php print RUTA;?>public/img/editar2.png">
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm  m-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>">
                                                        <img src="<?php print RUTA;?>public/img/borrar.png">
                                                    </button>

                                                </div>
                                                <!-- eliminar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar
                                                                    Servicio:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas seguro de eliminar:</p>
                                                                <?php print $datos["dataTable"][$i]["NombreServicio"];?>

                                                            </div>
                                                            <div class="modal-footer justify-content-end">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="<?php print RUTA;?>AdminControlador/BorrarServicio/<?php print $datos['dataTable'][$i]['IdServicio'];?>/<?php print $datos['dataTable'][$i]['IdExpositoresServicio'];?>"
                                                                    type="button" class="btn btn-primary">Si</a>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- editar Modal-->
                                                <div class="modal fade"
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>b">
                                                    <div class="modal-dialog modal-lg">
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
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-8 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Nombre
                                                                                Servicio:</label>
                                                                            <input type="text"
                                                                                placeholder="Nombre del servicio"
                                                                                name="NombreServicio"
                                                                                class="form-control"
                                                                                value="<?php print $datos['dataTable'][$i]['NombreServicio'];?>">
                                                                        </div>
                                                                        <div class="col-sm-2 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Año:</label>
                                                                            <input type="text"
                                                                                value="<?php print $datos['dataTable'][$i]['Año'];?>"
                                                                                name="Año" placeholder="Año"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class=" col-sm-2 mb-2 mb-sm-0"><label
                                                                                for="saldo3"
                                                                                class="col-form-label">Precio:</label>
                                                                            <input type="number" step="0.01"
                                                                                value="<?php print $datos['dataTable'][$i]['Precio']; ?>"
                                                                                name="Precio" placeholder="Precio"
                                                                                id="numero_con_coma2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-3 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Fecha
                                                                                Inico:</label>
                                                                            <input type="date"
                                                                                value="<?php print $datos['dataTable'][$i]['FechaInicio']; ?>"
                                                                                name="FechaInicio" class="form-control">
                                                                        </div>
                                                                        <div class="col-sm-3 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Fecha
                                                                                Fin:</label>
                                                                            <input type="date"
                                                                                value="<?php print $datos['dataTable'][$i]['FechaFin'];?>"
                                                                                name="FechaFin" class="form-control">
                                                                        </div>
                                                                        <div class="col-sm-3 mb-2 mb-sm-0"><label
                                                                                for="saldo3"
                                                                                class="col-form-label">Tipo:</label>
                                                                            <div class="form-group">
                                                                                <select class="form-control select2"
                                                                                    name="Tipo" style="width: 100%;">

                                                                                    <?php foreach ($datos['datatable3'] as $elemento) {
                                                                                        $selected = ($elemento['Tipo'] === $datos['dataTable'][$i]['Tipo']) ? 'selected' : '';
                                                                                        echo "<option value=" . $elemento['Tipo'] . " $selected>" . $elemento['Tipo'] . "</option>";
                                                                                    }?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3 mb-2 mb-sm-0"><label
                                                                                for="saldo3"
                                                                                class="col-form-label">Certificado:</label>
                                                                            <div class="form-group">

                                                                                <select name="Certificado"
                                                                                    class="form-control select2"
                                                                                    style="width: 100%;">
                                                                                    <?php if($datos['dataTable'][$i]['Certificado']=="CON CERTIFICADO"){
                                                                                        ?>
                                                                                    <option value="SIN CERTIFICADO">SIN
                                                                                        CERTIFICADO</option>
                                                                                    <option selected
                                                                                        value="CON CERTIFICADO">CON
                                                                                        CERTIFICADO</option>
                                                                                    <?php
                                                                                    }else{
                                                                                        ?>
                                                                                    <option selected
                                                                                        value="SIN CERTIFICADO">SIN
                                                                                        CERTIFICADO</option>
                                                                                    <option value="CON CERTIFICADO">CON
                                                                                        CERTIFICADO</option>
                                                                                    <?php
                                                                                    } ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-1 row">

                                                                        <div id="divOcultar1Nuevo"
                                                                            class="col-sm-4 mb-2 mb-sm-0"><label
                                                                                for="saldo3"
                                                                                class="col-form-label">Examen:</label>
                                                                            <div class="form-group">

                                                                                <select name="Examen"
                                                                                    class="form-control select2"
                                                                                    style="width: 100%;">
                                                                                    <?php if($datos['dataTable'][$i]['Certificado']=="CON EXAMEN"){
                                                                                        ?>
                                                                                    <option value="SIN EXAMEN">SIN
                                                                                        EXAMEN</option>
                                                                                    <option selected value="CON EXAMEN">
                                                                                        CON
                                                                                        EXAMEN</option>
                                                                                    <?php
                                                                                    }else{
                                                                                        ?>
                                                                                    <option selected value="SIN EXAMEN">
                                                                                        SIN
                                                                                        EXAMEN</option>
                                                                                    <option value="CON EXAMEN">CON
                                                                                        EXAMEN</option>
                                                                                    <?php
                                                                                    } ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-sm-3 mb-3 mb-sm-0"
                                                                            for="saldo2">
                                                                            <label class="col-form-label">Fecha
                                                                                Examen:</label>
                                                                            <input type="date"
                                                                                value="<?php print $datos['dataTable'][$i]['FechaExamen'];?>"
                                                                                name="saldo2" class="form-control">
                                                                        </div>


                                                                        <div id="divOcultarCert1Nuevo"
                                                                            class="col-sm-2 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">hora:</label>
                                                                            <input type="number " placeholder="Hora"
                                                                                inputmode="numeric"
                                                                                value="<?php print $datos['dataTable'][$i]['Hora'];?>"
                                                                                name="Hora" class="form-control">
                                                                        </div>
                                                                        <div id="divOcultarCert2Nuevo"
                                                                            class=" col-sm-3 mb-2 mb-sm-0"><label
                                                                                for="saldo3" class="col-form-label">tipo
                                                                                Hora:</label>
                                                                            <input type="text" placeholder="Tipo Hora "
                                                                                value="<?php print $datos['dataTable'][$i]['TipoHora']; ?>"
                                                                                name="TipoHora" id="numero_con_coma2"
                                                                                class="form-control">
                                                                        </div>







                                                                        <div class="col-sm-6 mb-2 mb-sm-0"><label
                                                                                for="saldo3"
                                                                                class="col-form-label">Producto:</label>
                                                                            <div class="form-group">

                                                                                <select name="Producto"
                                                                                    class="form-control select2"
                                                                                    style="width: 100%;">

                                                                                    <?php foreach ($datos['datatable4'] as $elemento) {
                                                                                        $selected = ($elemento['NombreProducto'] === $datos['dataTable'][$i]['Producto']) ? 'selected' : '';
                                                                                        echo "<option value=" . $elemento['NombreProducto'] . " $selected>" . $elemento['NombreProducto'] . "</option>";
                                                                                    }?>


                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                                                            <label for="saldo3"
                                                                                class="col-form-label">Expositores:</label>
                                                                            <div class="form-group  ">

                                                                                <select class="select2"
                                                                                    name="Expositores[]"
                                                                                    multiple="multiple"
                                                                                    data-placeholder="Selecciona los expositores"
                                                                                    style="width: 100%;">

                                                                                    <?php 
                                                                                    $arrayFiltrado = [];
                                                                                    // Filtrar los expositores seleccionados con 'IdExpositoresServicio' igual a 1
                                                                                    foreach ($datos['datatable2'] as $elemento) {
                                                                                        if ($elemento["IdExpositoresServicio"] === $datos['dataTable'][$i]['IdNumeroServicio']) {
                                                                                            $arrayFiltrado[] = $elemento;
                                                                                        }
                                                                                    }
                                                                                    
                                                                                    // Generar las opciones del menú desplegable
                                                                                    foreach ($datos['datatable5'] as $elemento) {
                                                                                        $valor = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                                                        $textoVisible = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                                                    
                                                                                        // Verificar si el expositor está en la lista de expositores seleccionados
                                                                                        $encontrado = false;
                                                                                        foreach ($arrayFiltrado as $expositorSeleccionado) {
                                                                                            if ($valor === $expositorSeleccionado['NombreExpositor']) {
                                                                                                $encontrado = true;
                                                                                                break;
                                                                                            }
                                                                                        }
                                                                                    
                                                                                        // Establecer 'selected' si el expositor está en la lista de seleccionados
                                                                                        $selected = $encontrado ? 'selected' : '';
                                                                                    
                                                                                        echo "<option value='" . htmlspecialchars($valor) . "' $selected >" . htmlspecialchars($textoVisible) . "</option>";
                                                                                    }
                                                                                    
                                                                                        //$valor = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                                                        //$textoVisible = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                                                        //echo "<option value='" . htmlspecialchars($valor) . "'>" . htmlspecialchars($textoVisible) . "</option>";
                                                                                    ?>


                                                                                </select>




                                                                            </div>
                                                                        </div>
                                                                        <hr width="98%" size="1" class="mb-1"
                                                                            style="border-color: #858796; border-style: dashed;">
                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Titulo
                                                                                Descripcion:</label>
                                                                            <input type="text"
                                                                                value="<?php print $datos['dataTable'][$i]['TituloDescripcion'];?>"
                                                                                name="TituloDescripcion"
                                                                                placeholder="Titulo Descripcion"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                                                            <label for="saldo3" class="col-form-label">
                                                                                Convenio:</label>
                                                                            <div class="form-group  ">

                                                                                <select class="select2" name="Convenio"
                                                                                    data-placeholder="Selecciona Convenio"
                                                                                    style="width: 100%;">
                                                                                    
                                                                                    <?php /*foreach ($datos['datatable6'] as $elemento) {
                                                                                    echo "<option value=" . $elemento['NombreInstitucion'] . ">" . $elemento['NombreInstitucion'] . " </option>";
                                                                                    }*/?>
                                                                                    <?php foreach ($datos['datatable6'] as $elemento) {
                                                                                        $selected = ($elemento['NombreInstitucion'] === $datos['dataTable'][$i]['Convenio']) ? 'selected' : '';
                                                                                        echo "<option value=" . $elemento['NombreInstitucion'] . " $selected>" . $elemento['NombreInstitucion'] . "</option>";
                                                                                    }?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Inversion:</label>
                                                                            <input type="number"
                                                                                value="<?php print $datos['dataTable'][$i]['Inversion'];?>"
                                                                                name="Inversion" placeholder="Inversion"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <hr width="98%" size="1" class="mb-1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-12 mb-2 mb-sm-0">
                                                                            <label for="numeroCuenta"
                                                                                class="col-form-label">Cuerpo
                                                                                Descripcion:</label>
                                                                            <textarea class="summernote2"
                                                                                name="descripcion" id="summernote2">
                                                                                <?php print $datos['dataTable'][$i]['CuerpoDescripcion'];?>
                                                                            </textarea>
                                                                            <?php //TEXBOX2 ?>
                                                                            <script>

                                                                            </script>

                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-7 mb-3 mb-sm-0">
                                                                            <label>Seleccionar Certificado Frontal
                                                                                :</label>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="newFileInput7" accept="image/*"
                                                                                    name="CertificadoFrontal"
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
                                                                                    src="<?php print RUTA; ?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['CertificadoFrontal']; ?>"
                                                                                    alt="Vista previa de la imagen">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr width="98%" size="1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-7 mb-3 mb-sm-0">
                                                                            <label>Seleccionar Certificado
                                                                                Reverso::</label>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="newFileInput8" accept="image/*"
                                                                                    name="CertificadoReverso"
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
                                                                                    src="<?php print RUTA; ?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['CertificadoReverso']; ?>"
                                                                                    alt="Vista previa de la imagen">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr width="98%" size="1"
                                                                        style="border-color: #858796; border-style: dashed;">
                                                                    <div class="mb-1 row">
                                                                        <div class="col-sm-7 mb-3 mb-sm-0">
                                                                            <label>Seleccionar Banner
                                                                                :</label>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="newFileInput9" accept="image/*"
                                                                                    name="Banner"
                                                                                    onchange="mostrarVistaPrevia(this, newImagePreview9)">
                                                                                <label class="custom-file-label"
                                                                                    for="newFileInput9">Elegir
                                                                                    archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 mb-2 mb-sm-0">
                                                                            <label for="directorAcademico3"
                                                                                class="col-form-label">Vista previa:
                                                                            </label>
                                                                            <div class="w-100 img-thumbnail">
                                                                                <img id="newImagePreview9"
                                                                                    class="w-100 h-75"
                                                                                    src="<?php print RUTA; ?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['Banner']; ?>"
                                                                                    alt="Vista previa de la imagen">
                                                                            </div>
                                                                        </div>
                                                                    </div>








                                                                    <script>
                                                                    // Obtener el campo de entrada
                                                                    var campoNumero = document.getElementById(
                                                                        'numero_con_coma2');

                                                                    // Escuchar el evento de entrada para el campo
                                                                    campoNumero.addEventListener('input', function() {
                                                                        // Reemplazar los puntos por comas en el valor del campo
                                                                        this.value = this.value.replace(/\./g,
                                                                            ',');
                                                                    });
                                                                    </script>




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
                                                    id="modal-default<?php print $datos['dataTable'][$i]['IdServicio'];?>a">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ver
                                                                    Servicio:</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-1 mb-3 mb-sm-0"><label
                                                                            for="numeroCuenta2"
                                                                            class="col-form-label">#:</label>
                                                                        <input type="number"
                                                                            value="<?php print $datos['dataTable'][$i]['IdNumeroServicio'];?>"
                                                                            name="numeroCuenta2" class="form-control"
                                                                            disabled>
                                                                    </div>
                                                                    <div class=" col-sm-9 mb-2 mb-sm-0"><label
                                                                            for="nombreCuenta2"
                                                                            class="col-form-label">Nombre
                                                                            de Servicio:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['NombreServicio'];?>"
                                                                            name="nombreCuenta2" class="form-control"
                                                                            disabled>
                                                                    </div>
                                                                    <div class=" col-sm-2 mb-3 mb-sm-0"><label
                                                                            for="numeroCuenta2" class="col-form-label">
                                                                            Año:</label>
                                                                        <input type="number"
                                                                            value="<?php print $datos['dataTable'][$i]['Año'];?>"
                                                                            disabled name="numeroCuenta2"
                                                                            class="form-control">
                                                                    </div>


                                                                </div>

                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-3 mb-2 mb-sm-0"><label
                                                                            for="nombreCuenta2"
                                                                            class="col-form-label">Precio
                                                                            :</label>
                                                                        <input type="number" step="0.01"
                                                                            value="<?php print $datos['dataTable'][$i]['Precio'];?>"
                                                                            name="nombreCuenta2" class="form-control"
                                                                            disabled>
                                                                    </div>
                                                                    <div class=" col-sm-3 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Fecha Inicio:</label>
                                                                        <input type="date" disabled
                                                                            value="<?php print $datos['dataTable'][$i]['FechaInicio'];?>"
                                                                            name="tipoCuenta2" class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-3 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Fecha Fin:</label>
                                                                        <input type="date" disabled
                                                                            value="<?php print $datos['dataTable'][$i]['FechaFin'];?>"
                                                                            name="tipoCuenta2" class="form-control">
                                                                    </div>

                                                                    <div class=" col-sm-3 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Tipo :</label>
                                                                        <input type="text" disabled
                                                                            value="<?php print $datos['dataTable'][$i]['Tipo'];?>"
                                                                            name="tipoCuenta2" class="form-control">
                                                                    </div>



                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-3 mb-3 mb-sm-0" for="saldo2">
                                                                        <label class="col-form-label">Examen:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Examen'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>
                                                                    <div class=" col-sm-3 mb-3 mb-sm-0" for="saldo2">
                                                                        <label class="col-form-label">Fecha
                                                                            Examen:</label>
                                                                        <input type="date"
                                                                            value="<?php print $datos['dataTable'][$i]['FechaExamen'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>
                                                                    <div class=" col-sm-3 mb-3 mb-sm-0" for="saldo2">
                                                                        <label
                                                                            class="col-form-label">Certificado:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Certificado'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>

                                                                    <div class=" col-sm-3 mb-3 mb-sm-0" for="saldo2">
                                                                        <label class="col-form-label">Horas y
                                                                            Tipo:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Hora'];?> HORAS <?php print $datos['dataTable'][$i]['TipoHora'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>

                                                                </div>
                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0" for="saldo2">
                                                                        <label class="col-form-label">Producto:</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['Producto'];?>"
                                                                            name="saldo2" class="form-control" disabled>
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0" for="saldo2">
                                                                        <!-- /.card-header -->
                                                                        <label
                                                                            class="col-form-label">Expositores:</label>

                                                                        <?php

                                                                        echo "<ol class='border  rounded pt-1 pb-1' style='background-color: #E2E7EA;
                                                                        border-color: #D1D1D1 !important;'>";
                                                                        foreach ($datos['datatable2'] as $elemento) {
                                                                            if ($elemento['IdExpositoresServicio'] === $datos['dataTable'][$i]['IdNumeroServicio']) {
                                                                                echo "<li>" . $elemento['NombreExpositor'] . "</li>";

                                                                            }
                                                                        }
                                                                        echo "</ol>";
                                                                        ?>


                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                </div>

                                                                <hr width="98%" size="1"
                                                                    style="border-color: #858796; border-style: dashed;">
                                                                <div class="mb-2 row">
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="nombreCuenta2"
                                                                            class="col-form-label">Titulo Descripcion
                                                                            :</label>
                                                                        <input type="text"
                                                                            value="<?php print $datos['dataTable'][$i]['TituloDescripcion'];?>"
                                                                            name="saldo2" class="form-control" disabled>

                                                                    </div>
                                                                    <div class=" col-sm-6 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Inversion:</label>
                                                                        <input type="number" disabled
                                                                            value="<?php print $datos['dataTable'][$i]['Inversion'];?>"
                                                                            name="tipoCuenta2" class="form-control">
                                                                    </div>
                                                                    <div class=" col-sm-12 mb-3 mb-sm-0">
                                                                        <label class="col-form-label" for="tipoCuenta2">
                                                                            Cuerpo Descripcion:</label>
                                                                        <div class='border  p-2 rounded pt-1 pb-1'
                                                                            style='background-color: #E2E7EA;
                                                                        border-color: #D1D1D1 !important;'>
                                                                            <?php print $datos['dataTable'][$i]['CuerpoDescripcion'];?>
                                                                        </div>





                                                                        <?php //textobox2 ?>
                                                                    </div>


                                                                </div>

                                                                <hr width="98%" size="1"
                                                                    style="border-color: #858796; border-style: dashed;">

                                                                <div class="mb-1 row">
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="directorAcademico3"
                                                                            class="col-form-label">
                                                                            Certificado Frontal:
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA;?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['CertificadoFrontal'];?>"
                                                                                alt="Vista previa de la imagen">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="directorAcademico3"
                                                                            class="col-form-label">Certificado
                                                                            Reverso
                                                                            :
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA;?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['CertificadoReverso'];?>"
                                                                                alt="Vista previa de la imagen">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="mb-1 row">

                                                                    <div class=" col-sm-6 mb-2 mb-sm-0"><label
                                                                            for="directorAcademico3"
                                                                            class="col-form-label">
                                                                            Banner
                                                                            :
                                                                        </label>
                                                                        <div class="w-100  img-thumbnail ">
                                                                            <img class="w-100 h-75"
                                                                                src="<?php print RUTA;?>public/img/ImgServicios/<?php print $datos['dataTable'][$i]['Banner'];?>"
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
                                            <th>NombreServicio</th>
                                            <th>Año</th>
                                            <th>Precio</th>
                                            <th>FechaInicio</th>
                                            <th>FechaFin</th>
                                            <th>Tipo</th>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="<?php print RUTA;?>AdminControlador/AgregarServicios" method="POST"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar
                                Servicio:</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1 row">
                                <div class="col-sm-8 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Nombre Servicio:</label>
                                    <input type="text" placeholder="Nombre del servicio" name="NombreServicio"
                                        class="form-control">
                                </div>
                                <div class="col-sm-2 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Año:</label>
                                    <input type="text" value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                        name="Año" placeholder="Año" class="form-control">
                                </div>
                                <div class=" col-sm-2 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">Precio:</label>
                                    <input type="number" step="0.01"
                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>" name="Precio"
                                        placeholder="Precio" id="numero_con_coma2" class="form-control">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-3 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Fecha Inico:</label>
                                    <input type="date" name="FechaInicio" class="form-control">
                                </div>
                                <div class="col-sm-3 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Fecha Fin:</label>
                                    <input type="date" value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                        name="FechaFin" class="form-control">
                                </div>
                                <div class="col-sm-3 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">Tipo:</label>
                                    <div class="form-group">

                                        <select id="miSelect" class="form-control select2" name="Tipo"
                                            style="width: 100%;">
                                            <option selected="selected">Selecciona</option>

                                            <?php foreach ($datos['datatable3'] as $elemento) {
                                                echo "<option value=" . $elemento['Tipo'] . ">" . $elemento['Tipo'] . "</option>";
                                            }?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">Certificado:</label>
                                    <div class="form-group">

                                        <select id="miSelect2" name="Certificado" class="form-control select2"
                                            style="width: 100%;">
                                            <option selected="selected">Selecciona</option>
                                            <option value="SIN CERTIFICADO">SIN CERTIFICADO</option>
                                            <option value="CON CERTIFICADO">CON CERTIFICADO</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-1 row">

                                <div id="divOcultar1" class="col-sm-4 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">Examen:</label>
                                    <div class="form-group">

                                        <select id="miSelect3" name="Examen" class="form-control select2"
                                            style="width: 100%;">
                                            <option selected="selected">Selecciona</option>
                                            <option value="SIN EXAMEN">SIN EXAMEN</option>
                                            <option value="CON EXAMEN">CON EXAMEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="divOcultar2" class="col-sm-3 mb-2 mb-sm-0  ocult">
                                    <label for="numeroCuenta" class="col-form-label">Fecha Examen:</label>
                                    <input type="date" value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                        name="FechaExamen" class="form-control">
                                </div>


                                <div id="divOcultarCert1" class="col-sm-2 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">hora:</label>
                                    <input type="number " placeholder="Hora" inputmode="numeric"
                                        value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>" name="Hora"
                                        class="form-control">
                                </div>
                                <div id="divOcultarCert2" class=" col-sm-3 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">tipo Hora:</label>
                                    <input type="text" placeholder="Tipo Hora "
                                        value="<?php //print $datos['dataTable'][$i]['Correo']; ?>" name="TipoHora"
                                        id="numero_con_coma2" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-2 mb-sm-0"><label for="saldo3"
                                        class="col-form-label">Producto:</label>
                                    <div class="form-group">

                                        <select name="Producto" class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Selecciona</option>

                                            <?php foreach ($datos['datatable4'] as $elemento) {
                                                
                                                echo "<option value=" . $elemento['NombreProducto'] . ">" . $elemento['NombreProducto'] . "</option>";
                                            }?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2 mb-sm-0">
                                    <label for="saldo3" class="col-form-label">Expositores:</label>
                                    <div class="form-group  ">

                                        <select class="select2" name="Expositores[]" multiple="multiple"
                                            data-placeholder="Selecciona los expositores" style="width: 100%;">
                                            <?php foreach ($datos['datatable5'] as $elemento) {
                                                $valor = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                $textoVisible = $elemento['Prefijo'] . " " . $elemento['ApellidoPaterno'] . " " . $elemento['ApellidoMaterno'] . " " . $elemento['Nombre'];
                                                echo "<option value='" . htmlspecialchars($valor) . "'>" . htmlspecialchars($textoVisible) . "</option>";
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <hr width="98%" size="1" class="mb-1"
                                    style="border-color: #858796; border-style: dashed;">
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Titulo Descripcion:</label>
                                    <input type="text" value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                        name="TituloDescripcion" placeholder="Titulo Descripcion" class="form-control">
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label for="saldo3" class="col-form-label">
                                        Convenio:</label>
                                    <div class="form-group  ">

                                        <select class="select2" name="Convenio" data-placeholder="Selecciona Convenio"
                                            style="width: 100%;">
                                            <option selected="selected">Selecciona</option>
                                            <?php foreach ($datos['datatable6'] as $elemento) {
                                            echo "<option value=" . $elemento['NombreInstitucion'] . ">" . $elemento['NombreInstitucion'] . " </option>";
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Inversion:</label>
                                    <input type="number"
                                        value="<?php //print $datos['dataTable'][$i]['NumeroCuenta'];?>"
                                        name="Inversion" placeholder="Inversion" class="form-control">
                                </div>
                            </div>
                            <hr width="98%" size="1" class="mb-1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class="col-sm-12 mb-2 mb-sm-0">
                                    <label for="numeroCuenta" class="col-form-label">Cuerpo Descripcion:</label>
                                    <textarea name="descripcion" id="summernote">
                                        Escribe <em>tu</em> <u>descripcion</u> <strong>aqui</strong>
                                    </textarea>
                                    <?php //TEXBOX2 ?>
                                    <script>

                                    </script>

                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                    <label for="imagen">Certificado Frontal:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput3" accept="image/*"
                                            name="CertificadoFrontal">
                                        <label class="custom-file-label" for="archivo3">Elegir
                                            archivo</label>
                                    </div>

                                </div>
                                <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3"
                                        class="col-form-label">Vista
                                        previa: <a href="#" id="removeImageLink3" style="display: none;"
                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                    <div class="w-100  img-thumbnail ">
                                        <img id="imagePreview3" class="w-100 h-75"
                                            src="<?php print RUTA;?>public/img/fondoblanco.png"
                                            alt="Vista previa de la imagen">

                                    </div>
                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                    <label for="imagen">CertificadoReverso:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput4" accept="image/*"
                                            name="CertificadoReverso">
                                        <label class="custom-file-label" for="archivo4">Elegir
                                            archivo</label>
                                    </div>

                                </div>
                                <div class=" col-sm-5 mb-2 mb-sm-0"><label for="directorAcademico3"
                                        class="col-form-label">Vista
                                        previa: <a href="#" id="removeImageLink4" style="display: none;"
                                            class="text-decoration-none text-prymari">[QUITAR]</a></label>
                                    <div class="w-100  img-thumbnail ">
                                        <img id="imagePreview4" class="w-100 h-75"
                                            src="<?php print RUTA;?>public/img/fondoblanco.png"
                                            alt="Vista previa de la imagen">

                                    </div>
                                </div>

                            </div>
                            <hr width="98%" size="1" style="border-color: #858796; border-style: dashed;">
                            <div class="mb-1 row">
                                <div class=" col-sm-7 mb-3 mb-sm-0">
                                    <label for="imagen">Banner:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput2" accept="image/*"
                                            name="Banner">
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








                            <script>
                            // Obtener el campo de entrada
                            var campoNumero = document.getElementById(
                                'numero_con_coma2');

                            // Escuchar el evento de entrada para el campo
                            campoNumero.addEventListener('input', function() {
                                // Reemplazar los puntos por comas en el valor del campo
                                this.value = this.value.replace(/\./g, ',');
                            });
                            </script>


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