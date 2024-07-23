var miDataTable;

if (document.getElementById("tbLista")) {
    miDataTable = new DataTable('#tbLista', {
        layout: {
            topStart: {
                buttons: ['excel', 'pdf', 'print']
            }
        }
    });
}

(function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                if (!form.checkValidity()) {
                    // event.preventDefault()
                    event.stopPropagation()
                } else {

                    let action = form.getAttribute("action");
                    let method = form.getAttribute("method");
                    let dataAction = form.getAttribute("data-action");
                    let formData = new FormData(form);

                    if (dataAction == 'delete') {
                        $.confirm({
                            title: 'Aviso del Sistema',
                            content: 'Realmente desea eliminar el registro seleccionado? Desea continuar?',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                confirm: function () {
                                    fetchAndHandleFormSubmission();
                                },
                                cancel: function () {

                                },
                            }
                        });

                        return;
                    }

                    fetchAndHandleFormSubmission();

                    function fetchAndHandleFormSubmission() {
                        fetch(action, {
                            method: method,
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al enviar el formulario');
                            }
                            return response.json();
                        })
                        .then(data => {
                            let info = data;
                            console.log(info);
                            switch (dataAction) {
                                case 'login':
                                    if (info) {
                                        window.location.href = 'home';
                                    } else {
                                        $.confirm({
                                            title: 'Error de Ingreso',
                                            content: 'Usuario y/o Contraseña incorrectos',
                                            type: 'orange',
                                            typeAnimated: true,
                                            buttons: {
                                                close: function () {
                                                    form.reset();
                                                }
                                            }
                                        });
                                    }

                                    break;

                                case 'insert':
                                    if (info) {
                                        $.confirm({
                                            title: 'Aviso del Sistema',
                                            content: 'Información registrada satisfactoriamente',
                                            type: 'blue',
                                            typeAnimated: true,
                                            buttons: {
                                                close: function () {
                                                    form.reset();
                                                    window.location.reload();
                                                }
                                            }
                                        });
                                    } else {
                                        $.confirm({
                                            title: 'Aviso del Sistema',
                                            content: 'No es posible guardar la información. Vuelva a intentar',
                                            type: 'yellow',
                                            typeAnimated: true,
                                            buttons: {
                                                close: function () {

                                                }
                                            }
                                        });
                                    }

                                    break;

                                case 'update':
                                    if (info) {
                                        $.confirm({
                                            title: 'Aviso del Sistema',
                                            content: 'Información actualizada satisfactoriamente',
                                            type: 'blue',
                                            typeAnimated: true,
                                            buttons: {
                                                close: function () {
                                                    window.location.reload();
                                                }
                                            }
                                        });
                                    } else {
                                        $.confirm({
                                            title: 'Aviso del Sistema',
                                            content: 'No es posible actualizar la información. Vuelva a intentar',
                                            type: 'yellow',
                                            typeAnimated: true,
                                            buttons: {
                                                close: function () {

                                                }
                                            }
                                        });
                                    }

                                    break;

                                case 'delete':
                                    window.location.reload();
                                    break;

                                case 'select':
                                    document.getElementById("tabla").innerHTML = info;

                                    $('#tbNomina').DataTable({
                                        dom: 'Bfrtip',
                                        //buttons: ['excel', 'pdf', 'print']
                                    });

                                    break;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

function soloNumeros(event) {
    if (event.key !== " " && isNaN(event.key) && event.key !== "Backspace") {
        event.preventDefault();
    }
}

function soloLetrasMayusculas(event) {
    const input = event.target;
    const textoIngresado = input.value;
    const textoMayusculas = textoIngresado.toUpperCase();

    const textoSoloLetras = textoMayusculas.replace(/[^A-Z\s]/g, '');

    input.value = textoSoloLetras;
}

var cmbMaestriaID = document.getElementById("MaestriaID");
cmbMaestriaID.addEventListener("change", function(){
    var MaestriaID = this.value;
    var PeriodoID = document.getElementById("PeriodoID").value;

    const data = {
        PeriodoID   : PeriodoID,
        MaestriaID  : MaestriaID
    };
    
    const url = 'https://postgrado2.itsup.edu.ec/secretaria/modulo/findmodulosmaestriaidcombo';

    fetch(url, {
        method: 'POST', 
        headers: {
        'Content-Type': 'application/json',
        },
        body: JSON.stringify(data), 
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("ModuloID").innerHTML = data; 
    })
    .catch(error => {
    console.error('Error:', error); 
    });
  
});
