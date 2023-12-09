document.getElementById("fileInput1").addEventListener("change", function () {
  const file = this.files[0];
  const fileType = file.type;

  // Validar si el archivo seleccionado es de tipo imagen
  if (!fileType.startsWith("image/")) {
    alert("Por favor, selecciona un archivo de imagen válido.");
    this.value = ""; // Limpiar el campo de archivo seleccionado
  }
});

document.getElementById("fileInput2").addEventListener("change", function () {
  const file = this.files[0];
  const fileType = file.type;

  // Validar si el archivo seleccionado es de tipo imagen
  if (!fileType.startsWith("image/")) {
    alert("Por favor, selecciona un archivo de imagen válido.");
    this.value = ""; // Limpiar el campo de archivo seleccionado
  }
});

document.getElementById("fileInput3").addEventListener("change", function () {
  const file = this.files[0];
  const fileType = file.type;

  // Validar si el archivo seleccionado es de tipo imagen
  if (!fileType.startsWith("image/")) {
    alert("Por favor, selecciona un archivo de imagen válido.");
    this.value = ""; // Limpiar el campo de archivo seleccionado
  }
});

document.getElementById("fileInput4").addEventListener("change", function () {
  const file = this.files[0];
  const fileType = file.type;

  // Validar si el archivo seleccionado es de tipo imagen
  if (!fileType.startsWith("image/")) {
    alert("Por favor, selecciona un archivo de imagen válido.");
    this.value = ""; // Limpiar el campo de archivo seleccionado
  }
});
