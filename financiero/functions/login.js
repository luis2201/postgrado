function validate()
{
  var flag = true;
  if (document.getElementById("NombreUsuario").value == "") {
    input = document.getElementById("NombreUsuario");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("NombreUsuario");
    input.classList.remove("is-invalid");
  }
  if (document.getElementById("ContrasenaUsuario").value == "") {
    input = document.getElementById("ContrasenaUsuario");
    input.className += " is-invalid";
    flag = false;
  } else {
    input = document.getElementById("ContrasenaUsuario");
    input.classList.remove("is-invalid");
  }

  return flag;
}