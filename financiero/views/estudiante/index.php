<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Lista de Estudiantes</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">
        <a class="btn btn-primary float-end" href="estudiante/register"><i class="fa-solid fa-user-plus"></i> Registrar Estudiante</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <table id="tbLista" class="table table-condensed" style="font-size: 0.9em;">
            <thead>
                <tr>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">No. Identificación</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudiantes as $row): ?>
                <tr>
                    <td class="text-center"><?php echo $row->TipoIdentificacion; ?></td>
                    <td class="text-center"><?php echo $row->NumeroIdentificacion; ?></td>
                    <td><?php echo $row->Apellido1.' '.$row->Apellido2; ?></td>
                    <td><?php echo $row->Nombre1.' '.$row->Nombre2; ?></td>
                    <td class="text-center"><?php echo $row->Telefono; ?></td>
                    <td class="text-center"><?php echo $row->Correo; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form class="needs-validation" action="estudiante/delete" method="post" data-action="delete" enctype="multipart/form-data" novalidate>
                                <input type="hidden" id="EstudianteID" name="EstudianteID" value="<?php echo Main::encryption($row->EstudianteID); ?>">
                                <button class="btn text-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                            <a class="btn text-warning" href="estudiante/edit/<?php echo $row->NumeroIdentificacion; ?>"><i class="fa-solid fa-square-pen"></i></a>
                            <a class="btn text-success" href="estudiante/matricula/<?php echo $row->NumeroIdentificacion; ?>"><i class="fa-solid fa-book-open-reader"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>