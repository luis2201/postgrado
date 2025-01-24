<h1 class="mt-4">Módulo</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Registro de Módulo</a></li>
    <li class="breadcrumb-item active">Datos de Módulo</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-white">
        <a href="<?php echo DIR; ?>modulo" class="btn btn-primary btn-sm float-end"><i class="fa-regular fa-circle-left"></i> Volver</a>
    </div>
    <div class="card-body p-3">
        <form class ="needs-validation" action="<?php echo DIR; ?>modulo/insert" method="post" data-action="insert" enctype="multipart/form-data" autocomplete="off" novalidate>
            <div class="row">
                <div class="col-2">
                    <label for="PeriodoID">Periodo Académico</label>
                    <select name="PeriodoID" id="PeriodoID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <?php foreach($periodo as $row): ?>
                            <option value="<?php echo Main::encryption($row->PeriodoID); ?>"><?php echo $row->NombrePeriodo; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Periodo Académico</div>
                </div>
                <div class="col-10">
                    <label for="MaestriaID">Oferta Académica</label>
                    <select name="MaestriaID" id="MaestriaID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="">-- Seleccione Oferta Académica --</option>
                        <?php foreach($maestria as $row): ?>
                            <option value="<?php echo Main::encryption($row->MaestriaID); ?>"><?php echo $row->NombreMaestria; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Oferta Académica</div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="MaestriaID">Nombre de Módulo</label>
                    <input type="text" name="NombreModulo" id="NombreModulo" class="form-control" maxlength="150" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese nombre del Módulo a registrar</div>
                </div>
                <div class="col-2">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
