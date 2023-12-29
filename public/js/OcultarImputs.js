///AGREGAR
$(document).ready(function () {
  $("#miSelect")
    .change(function () {
      if ($(this).val() === "SEMINARIO" || $(this).val() === "TALLER") {
        $("#divOcultar1, #divOcultar2").hide();
      } else {
        $("#divOcultar1, #divOcultar2").show();
      }
    })
    .change(); // Esto asegura que la función se ejecute al cargar la página
});
$(document).ready(function () {
    $("#miSelect2").change(function () {
      if ($(this).val() === "SIN CERTIFICADO") {
        $("#divOcultarCert1, #divOcultarCert2").hide();
      } else {
        $("#divOcultarCert1, #divOcultarCert2").show();
      }
    }).change(); // Ejecutar al cargar la página
  
    $("#miSelect3").change(function () {
      if ($(this).val() === "SIN EXAMEN") {
        $('.ocult').hide(); // Oculta elementos con la clase "ocult"
      } else {
        $('.ocult').show(); // Muestra elementos con la clase "ocult"
      }
    }).change(); // Ejecutar al cargar la página
  });
  ///EDITAR
  
  $(document).ready(function () {
    $("#miSelectNuevo")
      .change(function () {
        if ($(this).val() === "SEMINARIO" || $(this).val() === "TALLER") {
          $("#divOcultarNuevo1, #divOcultarNuevo2").hide();
        } else {
          $("#divOcultarNuevo1, #divOcultarNuevo2").show();
        }
      })
      .change(); // Ejecutar al cargar la página
  
    $("#miSelect2Nuevo").change(function () {
      if ($(this).val() === "SIN CERTIFICADO") {
        $("#divOcultarCertNuevo1, #divOcultarCertNuevo2").hide();
      } else {
        $("#divOcultarCertNuevo1, #divOcultarCertNuevo2").show();
      }
    }).change(); // Ejecutar al cargar la página
    
    $("#miSelect3Nuevo").change(function () {
      if ($(this).val() === "SIN EXAMEN") {
        $('.ocultNuevo').hide(); // Oculta elementos con la clase "ocultNuevo"
      } else {
        $('.ocultNuevo').show(); // Muestra elementos con la clase "ocultNuevo"
      }
    }).change(); // Ejecutar al cargar la página
  });
  

    
    
