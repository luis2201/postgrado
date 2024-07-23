<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Datos Personales del Estudiante</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">

    </div>
</div>

<div class="card mb-4">
    <div class="accordion" id="accordionExample">
        <!-- Datos Personales -->
        <?php foreach ($datosestudiante as $row) : ?>
            <input type="hidden" id="EstudianteID" name="EstudianteID" value="<?php echo Main::encryption($row->EstudianteID); ?>">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Datos Personales del Estudiante
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="TipoIdentificacion">Tipo de Identificación</label>
                                <input id="TipoIdentificacion" name="TipoIdentificacion" class="form-control" value="<?php echo $row->TipoIdentificacion; ?>"  disabled>
                            </div>
                            <div class="col-6">
                                <label for="NumeroIdentificacion">Número de Identificación (*)</label>
                                <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" value="<?php echo $row->NumeroIdentificacion; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="Nombre1">Primer Nombre (*)</label>
                                <input type="text" id="Nombre1" name="Nombre1" class="form-control" value="<?php echo $row->Nombre1; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="Nombre2">Segundo Nombre</label>
                                <input type="text" id="Nombre2" name="Nombre2" class="form-control" value="<?php echo $row->Nombre2; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="Apellido1">Primer Apellido (*)</label>
                                <input type="text" id="Apellido1" name="Apellido1" class="form-control" value="<?php echo $row->Apellido1; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="Apellido2">Segundo Apellido</label>
                                <input type="text" id="Apellido2" name="Apellido2" class="form-control" value="<?php echo $row->Apellido2; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-6">
                                <label for="Telefono">Teléfono (*)</label>
                                <input type="text" id="Telefono" name="Telefono" class="form-control" value="<?php echo $row->Telefono; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="Correo">Correo Electrónico (*)</label>
                                <input type="text" id="Correo" name="Correo" class="form-control" value="<?php echo $row->Correo; ?>" disabled>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach ($datospersonales as $row) : ?>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label for="FechaNacimiento">Fecha Nacimiento (*)</label>
                                <input type="date" id="FechaNacimiento" name="FechaNacimiento" class="form-control" value="<?php echo $row->FechaNacimiento; ?>" disabled>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label for="Sexo">Sexo (*)</label>
                                <input id="Sexo" name="Sexo" class="form-control" value="<?php echo $row->Sexo; ?>" disabled>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label for="Genero">Genero (*)</label>
                                <input id="Genero" name="Genero" class="form-control" value="<?php echo $row->Genero; ?>" disabled>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label for="EstadoCivil">Estado Civil (*)</label>
                                <input id="EstadoCivil" name="EstadoCivil" class="form-control" value="<?php echo $row->Genero; ?>" disabled>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label for="Etnia">Etnia (*)</label>
                                <input id="Etnia" name="Etnia" class="form-control" value="<?php echo $row->Etnia; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($datosmedicos as $row) : ?>
            <!-- Datos Médicos -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Datos Médicos
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for="Sexo">Tipo Sangre (*)</label>
                                <input id="TipoSangre" name="TipoSangre" class="form-control" value="<?php echo $row->TipoSangre; ?>" disabled>
                            </div>
                            <div class="col-4">
                                <label for="Discapacidad">Discapacidad (*)</label>
                                <input id="Discapacidad" name="Discapacidad" class="form-control" value="<?php echo $row->Discapacidad; ?>" disabled>
                            </div>
                            <div class="col-4">
                                <label for="PorcentajeDiscapacidad">% Discapacidad</label>
                                <input type="text" id="PorcentajeDiscapacidad" name="PorcentajeDiscapacidad" class="form-control" value="<?php echo $row->PorcentajeDiscapacidad; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for="CarnetConadis">Carnet CONADIS (*)</label>
                                <input id="CarnetConadis" name="CarnetConadis" class="form-control" value="<?php echo $row->CarnetConadis; ?>" disabled>
                            </div>
                            <div class="col-4">
                                <label for="NumeroCarnetConadis">No. Carnet CONADIS</label>
                                <input type="text" id="NumeroCarnetConadis" name="NumeroCarnetConadis" class="form-control" value="<?php echo $row->PorcentajeDiscapacidad; ?>" disabled>
                            </div>
                            <div class="col-4">
                                <label for="TipoDiscapacidad">Tipo de Discapacidad (*)</label>
                                <input id="TipoDiscapacidad" name="TipoDiscapacidad" class="form-control" value="<?php echo $row->TipoDiscapacidad; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($datoscontacto as $row) : ?>
            <!-- Datos de Contacto -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Datos de Localización
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="PaisNacionalidad">País de Nacionalidad (*)</label>
                                <input id="PaisNacionalidad" name="PaisNacionalidad" class="form-control" value="<?php echo $row->PaisNacionalidad; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="CantonNacimiento">Cantón de Nacimiento (*)</label>
                                <input id="CantonNacimiento" name="CantonNacimiento" class="form-control" value="<?php echo $row->CantonNacimiento; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="PaisResidencia">País de Residencia (*)</label>
                                <input id="PaisResidencia" name="PaisResidencia" class="form-control" value="<?php echo $row->PaisResidencia; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="CantonResidencia">Cantón de Residencia (*)</label>
                                <input id="CantonResidencia" name="CantonResidencia" class="form-control" value="<?php echo $row->CantonResidencia; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($datosfamiliares as $row) : ?>
            <!-- Datos de Ocupación y Académica -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Datos Laborales y Académica
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mt-2">
                            <div class="col-4">
                                <label for="TipoColegio">Tipo Colegio Procedencia (*)</label>
                                <input id="TipoColegio" name="TipoColegio" class="form-control" value="<?php echo $row->TipoColegio; ?>" disabled>
                            </div>
                            <div class="col-3">
                                <label for="Ocupacion">Ocupación (*)</label>
                                <input id="Ocupacion" name="Ocupacion" class="form-control" value="<?php echo $row->Ocupacion; ?>" disabled>
                            </div>
                            <div class="col-3">
                                <label for="Ingresos">Ingresos (*)</label>
                                <input type="number" id="Ingresos" name="Ingresos" class="form-control" value="<?php echo $row->Ingresos; ?>" disabled>
                            </div>
                            <div class="col-2">
                                <label for="BonoDesarrollo">Bono de Desarrollo (*)</label>
                                <input id="BonoDesarrollo" name="BonoDesarrollo" class="form-control" value="<?php echo $row->BonoDesarrollo; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="NivelFormacionP">Nivel Formación del Padre (*)</label>
                                <input id="NivelFormacionP" name="NivelFormacionP" class="form-control" value="<?php echo $row->NivelFormacionP; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="NivelFormacionM">Nivel Formación de la Madre (*)</label>
                                <input id="NivelFormacionM" name="NivelFormacionM" class="form-control" value="<?php echo $row->NivelFormacionM; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="IngresosHogar">Ingresos del Hogar (*)</label>
                                <input type="number" id="IngresosHogar" name="IngresosHogar" class="form-control" min="0" value="<?php echo $row->IngresosHogar; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="MiembrosHogar">Miembros del Hogar (*)</label>
                                <input type="number" id="MiembrosHogar" name="MiembrosHogar" class="form-control" min="0" value="<?php echo $row->IngresosHogar; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach; ?>
</div>