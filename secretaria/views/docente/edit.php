<h1 class="mt-4">Docente</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Editar Datos del Docente</a></li>
    <li class="breadcrumb-item active">Datos del Docente</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-white">
        <a href="<?php echo DIR; ?>docente" class="btn btn-primary btn-sm float-end"><i class="fa-regular fa-circle-left"></i> Volver</a>
    </div>
    <div class="card-body p-3">
        <?php foreach($docente as $row): ?>
        <form class ="needs-validation" action="<?php echo DIR; ?>docente/update" method="post" data-action="insert" enctype="multipart/form-data" autocomplete="off" novalidate>
            <input type="hidden" name="DocenteID" id="DocenteID" value="<?php echo Main::encryption($row->DocenteID) ?>">
            <div class="row">
                <div class="col-3">
                    <label for="TipoIdentificacion">Tipo de Identificación (*)</label>
                    <select name="TipoIdentificacion" id="TipoIdentificacion" class="form-select" aria-describedby="inputGroupPrepend" required>                        
                        <option value="Cédula" <?php echo ($row->TipoIdentificacion == 'Cédula')?'selected':'' ?>>Cédula</option>                        
                        <option value="Pasaporte" <?php echo ($row->TipoIdentificacion == 'Pasaporte')?'selected':'' ?>>Pasaporte</option>    
                    </select>                    
                </div>
                <div class="col-9">
                    <label for="MaestriaID">Número de Identificación (*)</label>
                    <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" maxlength="25" aria-describedby="inputGroupPrepend" value="<?php echo $row->NumeroIdentificacion ?>" required>
                    <div class="invalid-feedback">Ingrese Número de Identificación</div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="MaestriaID">Nombre del Docente (*)</label>
                    <input type="text" name="NombreDocente" id="NombreDocente" class="form-control" maxlength="255" aria-describedby="inputGroupPrepend" value="<?php echo $row->NombreDocente; ?>" required>
                    <div class="invalid-feedback">Ingrese nombre del Docente</div>
                </div>
                <div class="col-2">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>
