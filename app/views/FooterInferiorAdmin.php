</section>
<!-- /.content -->
</div>


<!-- SAlirl-->
<div class="modal fade" id="modal-defaultsalir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Estas Seguro De Salir?:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de cerrar sesion?

                </p>


            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?php print RUTA;?>AdminControlador/salir" type="button" class="btn btn-primary">Si</a>
            </div>

        </div>


    </div>
</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php print RUTA;?>public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php print RUTA;?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="<?php print RUTA;?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php print RUTA;?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php print RUTA;?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php print RUTA;?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php print RUTA;?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php print RUTA;?>/plugins/moment/moment.min.js"></script>
<script src="<?php print RUTA;?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php print RUTA;?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php print RUTA;?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php print RUTA;?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php print RUTA;?>/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<!--<script src="<?php #print RUTA;?>/dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php #print RUTA;?>/dist/js/pages/dashboard.js"></script>-->


<!-- DataTables  & Plugins -->
<script src="<?php print RUTA;?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php print RUTA;?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php print RUTA;?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php print RUTA;?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php print RUTA;?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- validar imagen-->
<script src="<?php print RUTA;?>public/js/ValidarImg.js"></script>
<!-- vista previa imagen-->
<script src="<?php print RUTA;?>public/js/VistaPreviaImagen.js"></script>
<script src="<?php print RUTA;?>public/js/editarImg.js"></script>

<!-- Select2 -->
<script src="<?php print RUTA;?>public/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php print RUTA;?>public/plugins/moment/moment.min.js"></script>
<script src="<?php print RUTA;?>public/plugins/inputmask/jquery.inputmask.min.js"></script>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
});
</script>






<!-- toast de error-->
<script src="<?php print RUTA;?>public/js/toast.js"></script>

<script src="<?php print RUTA;?>public/js/OcultarImputs.js"></script>






<!-- ./wrapper -->


<!-- Summernote -->
<script src="<?php print RUTA;?>public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="<?php print RUTA;?>public/plugins/codemirror/codemirror.js"></script>
<script src="<?php print RUTA;?>public/plugins/codemirror/mode/css/css.js"></script>
<script src="<?php print RUTA;?>public/plugins/codemirror/mode/xml/xml.js"></script>
<script src="<?php print RUTA;?>public/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<!-- Page specific script -->
<script>
$(function() {
    // Inicializar Summernote
    var summernote = $('#summernote');
    summernote.summernote({
        // Restringir la edición
        callbacks: {
            onInit: function() {
                $('.note-editable').attr('contenteditable', false);
            }
        }
    });

    // Deshabilitar CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai",
        readOnly: true // Esto hará que el editor de CodeMirror sea solo de lectura
    });
});
$(function() {
    // Summernote
    $('#summernote2').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
</script>

</body>

</html>