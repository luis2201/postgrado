<h1 class="mt-4">Calificaciones</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Docente y Módulos</a></li>
    <li class="breadcrumb-item active">Lista de Módulos Asignados al Docente</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-end text-white">
        <h5>Lista de Módulos Asignados al Docente</h5>
    </div>
    <div class="card-body p-3">
        <div class="row">
            <div class="col-12 mb-2">
                <select name="PeriodoID" id="PeriodoID" class="form-select" onChange="cargaModulos(this)">
                    <option value="">-- Seleccione Periodo --</option>
                    <?php foreach($periodos as $row):?>
                        <option value="<?php echo Main::encryption($row->PeriodoID); ?>"><?php echo $row->NombrePeriodo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="tabla" class="col-12">
                
            </div>
        </div>
    </div>
</div>