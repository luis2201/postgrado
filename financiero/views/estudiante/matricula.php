<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Matrícula Estudiantes</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">
        <a class="btn btn-primary float-end" href="<?php echo DIR; ?>estudiante"><i class="fa-solid fa-circle-left"></i> Volver</a>
    </div>
</div>

<div class="card mb-4">
    <form class ="needs-validation" action="<?php echo DIR; ?>estudiante/insertmaestria" method="post" data-action="insert" enctype="multipart/form-data" autocomplete="off" novalidate>
    <?php 
        foreach($estudiante as $row):
            $EstudianteID = $row->EstudianteID; 
    ?>
        <input type="hidden" id="EstudianteID" name="EstudianteID" value="<?php echo Main::encryption($row->EstudianteID); ?>">
        <div class="card-header">
            Datos Personales del Estudiante
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-2">
                    <label for="TipoIdentificacion">Tipo de Identificación</label>
                    <input type="text" id="TipoIdentificacion" name="TipoIdentificacion" class="form-control" value="<?php echo $row->TipoIdentificacion; ?>" disabled  aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Tipo de Identificación</div>
                </div>
                <div class="col-4">
                    <label for="NumeroIdentificacion">Número de Identificación</label>
                    <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" value="<?php echo $row->NumeroIdentificacion; ?>" disabled aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Número de Identificación</div>
                </div>
                <div class="col-6">
                    <label for="Nombres">Nombres</label>
                    <input type="text" id="Nombres" name="Nombres" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Apellido1.' '.$row->Apellido2.' '.$row->Nombre1.' '.$row->Nombre2; ?>" disabled aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">Ingrese Nombres y Apellidos</div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <label for="PeriodoID">Periodo Académico</label>
                    <select id="PeriodoID" name="PeriodoID" class="form-select"  aria-describedby="inputGroupPrepend" required>
                        <?php 
                            foreach($periodo as $periodos):
                                $PeriodoID = $periodos->PeriodoID; 
                        ?>
                            <option value="<?php echo Main::encryption($periodos->PeriodoID); ?>"><?php echo $periodos->NombrePeriodo; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Periodo</div>
                </div>
                <div class="col-6">
                    <label for="MaestriaID">Oferta Académica</label>
                    <select name="MaestriaID" id="MaestriaID" class="form-select" aria-describedby="inputGroupPrepend" required>
                        <option value="">-- Seleccione Oferta Académica --</option>
                        <?php foreach($maestria as $maestrias): ?>
                            <option value="<?php echo Main::encryption($maestrias->MaestriaID); ?>"><?php echo $maestrias->NombreMaestria; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Seleccione Oferta Académica</div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success w-100" style="margin-top:9%;">Registrar Maestría</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>        
    </form>

    <div class="card-body">
        <table class="table table-condensed">
            <thead class="bg-secondary text-white">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Periodo Académico</th>
                    <th class="text-center">Maestría</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $param = [":PeriodoID" => $PeriodoID, ":EstudianteID" => $EstudianteID];
                $resp = Matricula::findMaestriaEstudianteID($param);
                
                $i = 1;

                foreach($resp as $row):
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->NombrePeriodo; ?></td>
                    <td><?php echo $row->NombreMaestria; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>