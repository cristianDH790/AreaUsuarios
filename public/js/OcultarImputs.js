$(document).ready(function() {
    $('#miSelect').change(function() {
        if ($(this).val() === 'SEMINARIO' || $(this).val() === 'TALLER') {
            $('#divOcultar1, #divOcultar2').hide();
        } else {
            $('#divOcultar1, #divOcultar2').show();
        }
    }).change(); // Esto asegura que la función se ejecute al cargar la página
});
$(document).ready(function() {
    $('#miSelect2').change(function() {
        if ($(this).val() === 'SIN CERTIFICADO') {
            $('#divOcultarCert1, #divOcultarCert2').hide();
        } else {
            $('#divOcultarCert1, #divOcultarCert2').show();
        }
    }).change(); // Esto asegura que la función se ejecute al cargar la página
});