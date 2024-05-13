<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Registro de Estudiantes</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">
        <a class="btn btn-primary float-end" href="<?php echo DIR; ?>estudiante"><i class="fa-solid fa-circle-left"></i> Volver</a>
    </div>
</div>

<div class="card mb-4">
    <form class ="form" action="<?php echo DIR; ?>estudiante/insert" method="post" data-action="insert" enctype="multipart/form-data" autocomplete="off">
        <div class="card-header">
            Datos Personales del Estudiante
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-6">
                    <label for="TipoIdentificacion">Tipo de Identificación</label>
                    <select id="TipoIdentificacion" name="TipoIdentificacion" class="form-select">
                        <option value="Cédula">Cédula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="NumeroIdentificacion">Número de Identificación (*)</label>
                    <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" onkeypress="soloNumeros(event)" maxlength="25">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="Nombre1">Primer Nombre (*)</label>
                    <input type="text" id="Nombre1" name="Nombre1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25">
                </div>
                <div class="col-6">
                    <label for="Nombre2">Segundo Nombre</label>
                    <input type="text" id="Nombre2" name="Nombre2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="Apellido1">Primer Apellido (*)</label>
                    <input type="text" id="Apellido1" name="Apellido1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25">
                </div>
                <div class="col-6">
                    <label for="Apellido2">Segundo Apellido</label>
                    <input type="text" id="Apellido2" name="Apellido2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25">
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-6">
                    <label for="Telefono">Teléfono (*)</label>
                    <input type="text" id="Telefono" name="Telefono" class="form-control" onkeypress="soloNumeros(event)" maxlength="10">
                </div>
                <div class="col-6">
                    <label for="Correo">Correo Electrónico (*)</label>
                    <input type="text" id="Correo" name="Correo" class="form-control" maxlength="255">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>        
    </form>
</div>