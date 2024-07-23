<h1 class="mt-4">Docente</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Datos Docente</a></li>
    <li class="breadcrumb-item active">Lista de Docentes registrados en el sistema</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-end text-white">
        <a class="btn btn-success btn-sm float-end" href="docente/agregar"><i class="fa-solid fa-circle-plus"></i> Agregar Docente</a>
    </div>
    <div class="card-body p-3">
        <table id="tbLista" class="table table-condensed table-hover table-striped" style="font-size:0.9em; width:100%">
            <thead>
                <tr>
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">No. Identificación</th>
                    <th class="text-center">Docente</th>
                    <th class="text-center">Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($docente as $row): ?>
                <tr>
                    <td class="text-center" style="width: 10%;"><?php echo $row->TipoIdentificacion; ?></td>
                    <td class="text-center" style="width: 10%;"><?php echo $row->NumeroIdentificacion; ?></td>
                    <td><?php echo $row->NombreDocente; ?></td>
                    <td class="text-center" style="width: 10%;"><?php echo ($row->Estado == 1)?'<span class="badge text-bg-success fw-bolder">ACTIVADO</span>':'<span class="badge text-bg-danger fw-bolder">DESACTIVADO</span>' ?></td>
                    <td class="text-center" style="width: 15%;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-link btn-sm" href="docente/edit/<?php echo Main::encryption($row->DocenteID); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class ="needs-validation" action="<?php echo DIR ?>docente/reset" method="post" data-action="update" enctype="multipart/form-data" autocomplete="off" novalidate>
                                <input type="hidden" id="DocenteID" name="DocenteID" value="<?php echo Main::encryption($row->DocenteID); ?>">
                                <input type="hidden" id="Estado" name="Estado" value="<?php echo Main::encryption($row->Estado); ?>">
                                <button type="submit" class="btn btn-link btn-sm"><i class="fa-solid fa-retweet"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>