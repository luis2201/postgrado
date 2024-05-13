new DataTable('#tbLista', {
    layout: {
        topStart: {
            buttons: ['excel', 'pdf', 'print']
        }
    }
});

var forms = document.querySelectorAll(".form");
forms.forEach(function(form) {
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var action = form.getAttribute("action");
        var method = form.getAttribute("method");
        var dataAction = form.getAttribute("data-action");
        var formData = new FormData(form);

        if (dataAction == 'insert' || dataAction == 'update') {
            if (!validate()) {
                $.confirm({
                    title: 'Aviso del Sistema',
                    content: 'Los campos marcados con rojo son obligatorios',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        close: function () {
    
                        }
                    }
                });
    
                return;
            }
    
            if (form.querySelector("#Correo")) {
                if (!validateCorreo()) {
                    $.confirm({
                        title: 'Aviso del Sistema',
                        content: 'Ingrese un correo electrónico válido',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
    
                            }
                        }
                    });
    
                    return;
                }
            }   
        } else if(dataAction == 'delete') {
            $.confirm({
                title: 'Aviso del Sistema',
                content: 'Realmente desea eliminar el registro seleccionado? Desea continuar?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    confirm: function () {
                        // Aquí se ejecuta la confirmación
                        fetchAndHandleFormSubmission();
                    },
                    cancel: function () {
                        // Aquí se ejecuta la cancelación
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
                console.log('esto es ' + data)
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
    
                                    }
                                }
                            });
                        }

                        break;
    
                    case 'insert':
                        if(info) {
                            $.confirm({
                                title: 'Aviso del Sistema',
                                content: 'Información registrada satisfactoriamente',
                                type: 'blue',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                        form.reset();
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
                    if(info) {
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
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});



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

function validateCorreo() {
    var flag = true;
    var correo = document.getElementById("Correo").value;
    var correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!correoRegex.test(correo)) {
        input = document.getElementById("Correo");
        input.className += " is-invalid";
        flag = false;
    } else {
        input = document.getElementById("Correo");
        input.classList.remove("is-invalid");
    }

    return flag;
}