<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Actualización de Datos de Estudiantes</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">
        <a class="btn btn-primary float-end" href="<?php echo DIR; ?>estudiante"><i class="fa-solid fa-circle-left"></i> Volver</a>
    </div>
</div>

<div class="card mb-4">
    <form class ="needs-validation" action="<?php echo DIR; ?>estudiante/update" method="post" data-action="update" enctype="multipart/form-data" autocomplete="off" novalidate>
    <?php foreach($estudiante as $row): ?>
        <input type="hidden" id="EstudianteID" name="EstudianteID" value="<?php echo Main::encryption($row->EstudianteID); ?>">
        <div class="card-header">
            Datos Personales del Estudiante
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-6">
                    <label for="TipoIdentificacion">Tipo de Identificación</label>
                    <select id="TipoIdentificacion" name="TipoIdentificacion" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="Cédula" <?php echo ($row->TipoIdentificacion == 'Cédula')?'selected':''; ?>>Cédula</option>
                        <option value="Pasaporte" <?php echo ($row->TipoIdentificacion == 'Pasaporte')?'selected':''; ?>>Pasaporte</option>
                    </select>
                    <div class="invalid-feedback">Ingrese Número de Identificación</div>
                </div>
                <div class="col-6">
                    <label for="NumeroIdentificacion">Número de Identificación (*)</label>
                    <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" onkeypress="soloNumeros(event)" maxlength="25" value="<?php echo $row->NumeroIdentificacion; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Número de Identificación</div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="Nombre1">Primer Nombre (*)</label>
                    <input type="text" id="Nombre1" name="Nombre1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Nombre1; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Nombre</div>
                </div>
                <div class="col-6">
                    <label for="Nombre2">Segundo Nombre</label>
                    <input type="text" id="Nombre2" name="Nombre2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Nombre2; ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="Apellido1">Primer Apellido (*)</label>
                    <input type="text" id="Apellido1" name="Apellido1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Apellido1; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Apellido</div>
                </div>
                <div class="col-6">
                    <label for="Apellido2">Segundo Apellido</label>
                    <input type="text" id="Apellido2" name="Apellido2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Apellido2; ?>">
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-6">
                    <label for="Telefono">Teléfono (*)</label>
                    <input type="text" id="Telefono" name="Telefono" class="form-control" onkeypress="soloNumeros(event)" maxlength="10" value="<?php echo $row->Telefono; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Número de Teléfono</div>
                </div>
                <div class="col-6">
                    <label for="Correo">Correo Electrónico (*)</label>
                    <input type="text" id="Correo" name="Correo" class="form-control" maxlength="255" value="<?php echo $row->Correo; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Correo Electrónico</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    <?php endforeach; ?>        
    </form>
</div>