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
            <div class="col-12">
                <table class="table table-condensed table-hover w-100">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Módulo</th>
                            <th scope="col">Carrera</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($docentemodulo as $row) : ?>
                            <tr>
                                <td class="text-center w-10"><?php echo $i++; ?></td>
                                <td><?php echo $row->NombreModulo; ?></td>
                                <td><?php echo $row->NombreMaestria; ?></td>
                                <td class="text-center w-10">
                                    <a href="calificacion/register/<?php echo Main::encryption($row->DocenteModuloID)   ; ?>"><i class="fa-solid fa-file-pen text-success"></i></a>
                                    <a href="calificacion/reporte/<?php echo Main::encryption($row->DocenteModuloID)  ; ?>" target="_blank"><i class="fa-solid fa-file-pdf text-primary"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>