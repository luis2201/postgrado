<h1 class="mt-4">Módulo</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Datos de Módulos</a></li>
    <li class="breadcrumb-item active">Lista de Módulos por Oferta Académica</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-end text-white">
        <h5>Criterios de Búsqueda</h5>
    </div>
    <div class="card-body p-3">
        <form class ="needs-validation" action="<?php echo DIR; ?>docentemodulo/insert" method="post" data-action="insert" enctype="multipart/form-data" autocomplete="off" novalidate>
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
                <div class="col-5">
                    <label for="MaestriaID">Oferta Académica</label>
                    <select name="MaestriaID" id="MaestriaID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="">-- Seleccione Oferta Académica --</option>
                        <?php foreach($maestria as $row): ?>
                            <option value="<?php echo Main::encryption($row->MaestriaID); ?>"><?php echo $row->NombreMaestria; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Oferta Académica</div>
                </div>
                <div class="col-5">
                    <label for="ModuloID">Módulo</label>
                    <select name="ModuloID" id="ModuloID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="">-- Seleccione Módulo --</option>
                    </select>
                    <div class="invalid-feedback">Seleccione Módulo</div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="DocenteID">Nombre de Docente</label>
                    <select type="text" id="DocenteID" name="DocenteID" class="form-select" required>
                        <option value="">-- Seleccione Docente --</option>
                        <?php foreach($docente as $row): ?>
                            <option value="<?php echo Main::encryption($row->DocenteID); ?>"><?php echo $row->NombreDocente; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Docente</div>
                </div>
                <div class="col-3">
                    <label for="NumeroHoras">Número de Horas</label>
                    <input type="number" id="NumeroHoras" name="NumeroHoras" min="1" max="100" class="form-control" required>
                    <div class="invalid-feedback">Ingrese Número de Horas</div>
                </div>
                <div class="col-3">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-user-plus"></i> Agregar Docente</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-2 mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista de Docentes por Módulos
    </div>
    <div class="card-body">
        <table id="tbLista" class="table table-hover table-condensed table-striped" style="font-size:0.8vw;">
            <thead>
                <tr>
                    <th>Oferta Académica</th>
                    <th>Periodo</th>
                    <th>Módulo</th>
                    <th>Docente</th>
                    <th>No.Horas</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($docentemodulo as $row): ?>
                <tr>
                    <td><?php echo $row->NombreMaestria; ?></td>
                    <td class="text-center"><?php echo $row->NombrePeriodo; ?></td>
                    <td><?php echo $row->NombreModulo; ?></td>
                    <td><?php echo $row->NombreDocente; ?></td>
                    <td class="text-center"><?php echo $row->NumeroHoras; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>