function validate()
{
  var flag = true;
  if (document.getElementById("TipoIdentificacion").value == "") {
    input = document.getElementById("TipoIdentificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("TipoIdentificacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("NumeroIdentificacion").value == "") {
    input = document.getElementById("NumeroIdentificacion");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("NumeroIdentificacion");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("Nombre1").value == "") {
    input = document.getElementById("Nombre1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("Nombre1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("Apellido1").value == "") {
    input = document.getElementById("Apellido1");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("Apellido1");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("Telefono").value == "") {
    input = document.getElementById("Telefono");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("Telefono");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("Correo").value == "") {
    input = document.getElementById("Correo");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("Correo");
    input.classList.remove("is-invalid");
  }

  return flag;
}