<h1 class="mt-4">Estudiante</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Datos de Estudiante</a></li>
    <li class="breadcrumb-item active">Lista de Estudiantes por Oferta Académica</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-end text-white">
        <h5>Criterios de Búsqueda</h5>
    </div>
    <div class="card-body p-3">
        <form class ="needs-validation" action="<?php echo DIR; ?>estudiante/findestudiantesmaestriaid" method="post" data-action="select" enctype="multipart/form-data" autocomplete="off" novalidate>
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
                <div class="col-9">
                    <label for="MaestriaID">Oferta Académica</label>
                    <select name="MaestriaID" id="MaestriaID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="">-- Seleccione Oferta Académica --</option>
                        <?php foreach($maestria as $row): ?>
                            <option value="<?php echo Main::encryption($row->MaestriaID); ?>"><?php echo $row->NombreMaestria; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Oferta Académica</div>
                </div>
                <div class="col-1">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="card mt-2 mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista de Estudiantes por Oferta Académica
    </div>
    <div id="tabla" class="card-body">
        
    </div>
</div>