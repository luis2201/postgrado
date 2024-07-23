var miDataTable;

if(document.getElementById("tbLista")) {
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

let previousValues = {};

function actualizarTotal(MatriculaID) {
    let docencia = parseFloat(document.getElementById(`Docencia-${MatriculaID}`).value) || 0;
    let practicas = parseFloat(document.getElementById(`Practicas-${MatriculaID}`).value) || 0;
    let actividades = parseFloat(document.getElementById(`Actividades-${MatriculaID}`).value) || 0;
    let resultados = parseFloat(document.getElementById(`Resultados-${MatriculaID}`).value) || 0;
    let total = docencia + practicas + actividades + resultados;
    document.getElementById(`Total-${MatriculaID}`).value = total.toFixed(2);
    return total.toFixed(2);
}

function limitarDecimales(event, maxValue) {
    let valor = parseFloat(event.target.value);
    if (valor > maxValue) {
        event.target.value = maxValue.toFixed(2);
    }
}

function formatearDecimales(event, maxValue) {
    let valor = parseFloat(event.target.value) || 0;
    if (valor > maxValue) {
        valor = maxValue;
    }
    if (event.target.value.trim() === '') {
        event.target.value = previousValues[event.target.id] || '';
    } else {
        event.target.value = valor.toFixed(2);
        if (previousValues[event.target.id] !== event.target.value) {
            let DocenteModuloID = document.getElementById("DocenteModuloID").value;
            let MatriculaID = event.target.id.split('-')[1];
            let total = actualizarTotal(MatriculaID);
            mostrarToast();
            enviarDatos(DocenteModuloID, event.target.id, event.target.value, total);
        }
    }
}

function mostrarToast() {
    const toastEl = document.getElementById('liveToast');
    const toast = new bootstrap.Toast(toastEl);
    toast.show();
}

function guardarValorAnterior(event) {
    previousValues[event.target.id] = event.target.value;
}

function enviarDatos(DocenteModuloID, id, valor, total) {
    const URL = document.getElementById("ruta").value;
    const [campo, MatriculaID] = id.split('-');
    const data = {
        DocenteModuloID: DocenteModuloID,
        MatriculaID: MatriculaID,
        Campo: campo,
        Valor: valor,
        Total: total
    };

    fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}