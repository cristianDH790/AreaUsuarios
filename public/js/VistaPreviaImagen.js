var ruta = "<?php echo RUTA; ?>";

var previousImage = ruta + "/public/img/fondoblanco.png"; // Variable para almacenar la URL de la imagen previa

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("fileInput1").addEventListener("change", function () {
    const file1 = this.files[0];
    const imagePreview1 = document.getElementById("imagePreview1");
    const removeLink1 = document.getElementById("removeImageLink1");
    if (file1) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previousImage = imagePreview1.src; // Almacenar la URL de la imagen previa
        imagePreview1.src = e.target.result;
        removeLink1.style.display = "inline"; // Mostrar el enlace de quitar
      };

      reader.readAsDataURL(file1);
    } else {
      imagePreview1.src = previousImage; // Mostrar la imagen previa al borrar la imagen actual
      removeLink1.style.display = "none"; // Ocultar el enlace de quitar
    }
  });

  document
    .getElementById("removeImageLink1")
    .addEventListener("click", function (e) {
      e.preventDefault(); // Evitar que el enlace recargue la página
      document.getElementById("fileInput1").value = ""; // Limpiar el valor del input de archivo
      document.getElementById("imagePreview1").src = "" + previousImage; // Mostrar la imagen por defecto
      this.style.display = "none"; // Ocultar el enlace de quitar
    });
});

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("fileInput2").addEventListener("change", function () {
    const file = this.files[0];
    const imagePreview = document.getElementById("imagePreview2");
    const removeLink = document.getElementById("removeImageLink2");

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previousImage = imagePreview.src; // Almacenar la URL de la imagen previa
        imagePreview.src = e.target.result;
        removeLink.style.display = "inline"; // Mostrar el enlace de quitar
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.src = previousImage; // Mostrar la imagen previa al borrar la imagen actual
      removeLink.style.display = "none"; // Ocultar el enlace de quitar
    }
  });

  document
    .getElementById("removeImageLink2")
    .addEventListener("click", function (e) {
      e.preventDefault(); // Evitar que el enlace recargue la página
      document.getElementById("fileInput2").value = ""; // Limpiar el valor del input de archivo
      document.getElementById("imagePreview2").src = "" + previousImage; // Mostrar la imagen por defecto
      this.style.display = "none"; // Ocultar el enlace de quitar
    });
});

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("fileInput3").addEventListener("change", function () {
    const file = this.files[0];
    const imagePreview = document.getElementById("imagePreview3");
    const removeLink = document.getElementById("removeImageLink3");

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previousImage = imagePreview.src; // Almacenar la URL de la imagen previa
        imagePreview.src = e.target.result;
        removeLink.style.display = "inline"; // Mostrar el enlace de quitar
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.src = previousImage; // Mostrar la imagen previa al borrar la imagen actual
      removeLink.style.display = "none"; // Ocultar el enlace de quitar
    }
  });

  document
    .getElementById("removeImageLink3")
    .addEventListener("click", function (e) {
      e.preventDefault(); // Evitar que el enlace recargue la página
      document.getElementById("fileInput3").value = ""; // Limpiar el valor del input de archivo
      document.getElementById("imagePreview3").src = "" + previousImage; // Mostrar la imagen por defecto
      this.style.display = "none"; // Ocultar el enlace de quitar
    });
});

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("fileInput4").addEventListener("change", function () {
    const file = this.files[0];
    const imagePreview = document.getElementById("imagePreview4");
    const removeLink = document.getElementById("removeImageLink4");

    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previousImage = imagePreview.src; // Almacenar la URL de la imagen previa
        imagePreview.src = e.target.result;
        removeLink.style.display = "inline"; // Mostrar el enlace de quitar
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.src = previousImage; // Mostrar la imagen previa al borrar la imagen actual
      removeLink.style.display = "none"; // Ocultar el enlace de quitar
    }
  });

  document
    .getElementById("removeImageLink4")
    .addEventListener("click", function (e) {
      e.preventDefault(); // Evitar que el enlace recargue la página
      document.getElementById("fileInput4").value = ""; // Limpiar el valor del input de archivo
      document.getElementById("imagePreview4").src = "" + previousImage; // Mostrar la imagen por defecto
      this.style.display = "none"; // Ocultar el enlace de quitar
    });
});



