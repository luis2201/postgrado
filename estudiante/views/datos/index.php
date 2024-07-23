<h1 class="mt-4">Estudiantes</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Estudiante</a></li>
    <li class="breadcrumb-item active">Actualización de Datos del Estudiante</li>
</ol>
<div class="card mb-4 p-2 bg-info">
    <div class="col">

    </div>
</div>

<div class="card mb-4">
    <form class="needs-validation" action="<?php echo DIR; ?>datos/update" method="post" data-action="update" enctype="multipart/form-data" autocomplete="off" novalidate>
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
                                    <select id="TipoIdentificacion" name="TipoIdentificacion" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Cédula" <?php echo ($row->TipoIdentificacion == 'Cédula') ? 'selected' : ''; ?>>Cédula</option>
                                        <option value="Pasaporte" <?php echo ($row->TipoIdentificacion == 'Pasaporte') ? 'selected' : ''; ?>>Pasaporte</option>
                                    </select>
                                    <div class="invalid-feedback">Ingrese Número de Identificación</div>
                                </div>
                                <div class="col-6">
                                    <label for="NumeroIdentificacion">Número de Identificación (*)</label>
                                    <input type="text" id="NumeroIdentificacion" name="NumeroIdentificacion" class="form-control" onkeypress="soloNumeros(event)" maxlength="25" value="<?php echo $row->NumeroIdentificacion; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Ingrese Número de Identificación</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="Nombre1">Primer Nombre (*)</label>
                                    <input type="text" id="Nombre1" name="Nombre1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Nombre1; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Ingrese Nombre</div>
                                </div>
                                <div class="col-6">
                                    <label for="Nombre2">Segundo Nombre</label>
                                    <input type="text" id="Nombre2" name="Nombre2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Nombre2; ?>">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="Apellido1">Primer Apellido (*)</label>
                                    <input type="text" id="Apellido1" name="Apellido1" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Apellido1; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Ingrese Apellido</div>
                                </div>
                                <div class="col-6">
                                    <label for="Apellido2">Segundo Apellido</label>
                                    <input type="text" id="Apellido2" name="Apellido2" class="form-control" oninput="soloLetrasMayusculas(event)" maxlength="25" value="<?php echo $row->Apellido2; ?>">
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-6">
                                    <label for="Telefono">Teléfono (*)</label>
                                    <input type="text" id="Telefono" name="Telefono" class="form-control" onkeypress="soloNumeros(event)" maxlength="10" value="<?php echo $row->Telefono; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Ingrese Número de Teléfono</div>
                                </div>
                                <div class="col-6">
                                    <label for="Correo">Correo Electrónico (*)</label>
                                    <input type="text" id="Correo" name="Correo" class="form-control" maxlength="255" value="<?php echo $row->Correo; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Ingrese Correo Electrónico</div>
                                </div>
                            </div>
            <?php endforeach; ?>
            <?php foreach ($datospersonales as $row) : ?>
                            <div class="row mt-2 mb-2">
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label for="FechaNacimiento">Fecha Nacimiento (*)</label>
                                    <input type="date" id="FechaNacimiento" name="FechaNacimiento" class="form-control" value="<?php echo $row->FechaNacimiento; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Seleccione una Fecha</div>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label for="Sexo">Sexo (*)</label>
                                    <select id="Sexo" name="Sexo" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="">-- Seleccione Sexo --</option>
                                        <option value="Hombre" <?php echo ($row->Sexo == 'Hombre')?'selected':''; ?>>Hombre</option>
                                        <option value="Mujer" <?php echo ($row->Sexo == 'Mujer')?'selected':''; ?>>Mujer</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Sexo</div>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label for="Genero">Genero (*)</label>
                                    <select id="Genero" name="Genero" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="">-- Seleccione Género --</option>
                                        <option value="Masculino" <?php echo ($row->Genero == 'Masculino')?'selected':''; ?>>Masculino</option>
                                        <option value="Femenino" <?php echo ($row->Genero == 'Femenino')?'selected':''; ?>>Femenino</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Género</div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label for="EstadoCivil">Estado Civil (*)</label>
                                    <select id="EstadoCivil" name="EstadoCivil" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="">-- Seleccione Estado Civil --</option>
                                        <option value="Soltero/a" <?php echo ($row->EstadoCivil == 'Soltero/a')?'selected':''; ?>>Soltero/a</option>
                                        <option value="Casado/a" <?php echo ($row->EstadoCivil == 'Casado/a')?'selected':''; ?>>Casado/a</option>
                                        <option value="Viudo/a" <?php echo ($row->EstadoCivil == 'Viudo/a')?'selected':''; ?>>Viudo/a</option>
                                        <option value="Divorciado/a" <?php echo ($row->EstadoCivil == 'Divorciado/a')?'selected':''; ?>>Divorciado/a</option>
                                        <option value="Unión de Hecho" <?php echo ($row->EstadoCivil == 'Unión de Hecho')?'selected':''; ?>>Unión de Hecho</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Estado Civil</div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <label for="Etnia">Etnia (*)</label>
                                    <select id="Etnia" name="Etnia" class="form-select" value="<?php echo $row->Etnia; ?>" aria-describedby="inputGroupPrepend" required>
                                        <option value="">-- Seleccione Etnia --</option>
                                        <option value="Mestizo" <?php echo ($row->Etnia == 'Mestizo')?'selected':''; ?>>Mestizo</option>
                                        <option value="Afroecuatoriano" <?php echo ($row->Etnia == 'Afroecuatoriano')?'selected':''; ?>>Afroecuatoriano</option>
                                        <option value="Indígena" <?php echo ($row->Etnia == 'Indígena')?'selected':''; ?>>Indígena</option>
                                        <option value="Montubio" <?php echo ($row->Etnia == 'Montubio')?'selected':''; ?>>Montubio</option>
                                        <option value="Blanco" <?php echo ($row->Etnia == 'Blanco')?'selected':''; ?>>Blanco</option>
                                        <option value="Otros" <?php echo ($row->Etnia == 'Otros')?'selected':''; ?>>Otros</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Etnia</div>
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
                                    <select id="TipoSangre" name="TipoSangre" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="">-- Seleccione Tipo Sangre --</option>
                                        <option value="AB+" <?php echo ($row->TipoSangre == 'AB+')?'selected':''; ?>>AB+</option>
                                        <option value="AB-" <?php echo ($row->TipoSangre == 'AB-')?'selected':''; ?>>AB-</option>
                                        <option value="A+" <?php echo ($row->TipoSangre == 'A+')?'selected':''; ?>>A+</option>
                                        <option value="A-" <?php echo ($row->TipoSangre == 'A-')?'selected':''; ?>>A-</option>
                                        <option value="B+" <?php echo ($row->TipoSangre == 'B+')?'selected':''; ?>>B+</option>
                                        <option value="B-" <?php echo ($row->TipoSangre == 'B-')?'selected':''; ?>>B-</option>
                                        <option value="O+" <?php echo ($row->TipoSangre == 'O+')?'selected':''; ?>>O+</option>
                                        <option value="O-" <?php echo ($row->TipoSangre == 'O-')?'selected':''; ?>>O-</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Tipo Sangra</div>
                                </div>
                                <div class="col-4">
                                    <label for="Discapacidad">Discapacidad (*)</label>
                                    <select id="Discapacidad" name="Discapacidad" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="No" <?php echo ($row->Discapacidad == 'No')?'selected':''; ?>>No</option>
                                        <option value="Si" <?php echo ($row->Discapacidad == 'Si')?'selected':''; ?>>Si</option>
                                    </select>
                                    <div class="invalid-feedback">Discapacidad ?</div>
                                </div>
                                <div class="col-4">
                                    <label for="PorcentajeDiscapacidad">% Discapacidad</label>
                                    <input type="number" id="PorcentajeDiscapacidad" name="PorcentajeDiscapacidad" class="form-control" min="0" max="100" value="<?php echo ($row->PorcentajeDiscapacidad > 0)?$row->PorcentajeDiscapacidad:0; ?>" aria-describedby="inputGroupPrepend" value="0" required>
                                    <div class="invalid-feedback">De 0 a 100</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label for="CarnetConadis">Carnet CONADIS (*)</label>
                                    <select id="CarnetConadis" name="CarnetConadis" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Si" <?php echo ($row->CarnetConadis == 'Si')?'selected':''; ?>>No</option>
                                        <option value="No" <?php echo ($row->CarnetConadis == 'No')?'selected':''; ?>>Si</option>
                                    </select>
                                    <div class="invalid-feedback">Carnet Conadis ?</div>
                                </div>
                                <div class="col-4">
                                    <label for="NumeroCarnetConadis">No. Carnet CONADIS</label>
                                    <input type="text" id="NumeroCarnetConadis" name="NumeroCarnetConadis" class="form-control" aria-describedby="inputGroupPrepend" value="<?php echo ($row->PorcentajeDiscapacidad > 0)?$row->CarnetConadis:0; ?>" required>
                                    <div class="invalid-feedback">Número de Carnet</div>
                                </div>
                                <div class="col-4">
                                    <label for="TipoDiscapacidad">Tipo de Discapacidad (*)</label>
                                    <select id="TipoDiscapacidad" name="TipoDiscapacidad" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Ninguna" <?php echo ($row->TipoDiscapacidad == 'Ninguna')?'selected':''; ?>>Ninguna</option>
                                        <option value="Auditiva" <?php echo ($row->TipoDiscapacidad == 'Auditiva')?'selected':''; ?>>Auditiva</option>
                                        <option value="Física" <?php echo ($row->TipoDiscapacidad == 'Física')?'selected':''; ?>>Física</option>
                                        <option value="Intelectual" <?php echo ($row->TipoDiscapacidad == 'Intelectual')?'selected':''; ?>>Intelectual</option>
                                        <option value="Lenguaje" <?php echo ($row->TipoDiscapacidad == 'Lenguaje')?'selected':'Lenguaje'; ?>>Lenguaje</option>
                                        <option value="Psicosocial" <?php echo ($row->TipoDiscapacidad == 'Psicosocial')?'selected':'Psicosocial'; ?>>Psicosocial</option>
                                        <option value="Visual" <?php echo ($row->TipoDiscapacidad == 'Visual')?'selected':'Visual'; ?>>Visual</option>
                                        <option value="Múltiple" <?php echo ($row->TipoDiscapacidad == 'Múltiple')?'selected':'Múltiple'; ?>>Múltiple</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Discapacidad</div>
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
                                    <select id="PaisNacionalidad" name="PaisNacionalidad" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Ecuador" <?php echo ($row->PaisNacionalidad == 'Ecuador')?'selected':''; ?>>Ecuador</option>
                                        <option value="Argentina" <?php echo ($row->PaisNacionalidad == 'Argentina')?'selected':''; ?>>Argentina</option>
                                        <option value="Brasil" <?php echo ($row->PaisNacionalidad == 'Brasil')?'selected':''; ?>>Brasil</option>
                                        <option value="Colombia" <?php echo ($row->PaisNacionalidad == 'Colombia')?'selected':''; ?>>Colombia</option>
                                        <option value="Estados Unidos" <?php echo ($row->PaisNacionalidad == 'Estados Unidos')?'selected':''; ?>>Estados Unidos</option>
                                        <option value="Venezuela" <?php echo ($row->PaisNacionalidad == 'Venezuela')?'selected':''; ?>>Venezuela</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione País de Nacionalidad</div>
                                </div>
                                <div class="col-6">
                                    <label for="CantonNacimiento">Cantón de Nacimiento (*)</label>
                                    <select id="CantonNacimiento" name="CantonNacimiento" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Portoviejo" <?php echo ($row->CantonNacimiento == 'Portoviejo')?'selected':''; ?>>Portoviejo</option>
                                        <option value="Ambato" <?php echo ($row->CantonNacimiento == 'Ambato')?'selected':''; ?>>Ambato</option>
                                        <option value="Cuenca" <?php echo ($row->CantonNacimiento == 'Cuenca')?'selected':''; ?>>Cuenca</option>
                                        <option value="Manta" <?php echo ($row->CantonNacimiento == 'Manta')?'selected':''; ?>>Manta</option>
                                        <option value="Guayaquil" <?php echo ($row->CantonNacimiento == 'Guayaquil')?'selected':''; ?>>Guayaquil</option>
                                        <option value="Quito" <?php echo ($row->CantonNacimiento == 'Quito')?'selected':''; ?>>Quito</option>
                                        <option value="Otro" <?php echo ($row->CantonNacimiento == 'Otro')?'selected':''; ?>>Otro</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Cantón de Nacimiento</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="PaisResidencia">País de Residencia (*)</label>
                                    <select id="PaisResidencia" name="PaisResidencia" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Ecuador" <?php echo ($row->PaisResidencia == 'Ecuador')?'selected':''; ?>>Ecuador</option>
                                        <option value="Argentina" <?php echo ($row->PaisResidencia == 'Argentina')?'selected':''; ?>>Argentina</option>
                                        <option value="Brasil" <?php echo ($row->PaisResidencia == 'Brasil')?'selected':''; ?>>Brasil</option>
                                        <option value="Colombia" <?php echo ($row->PaisResidencia == 'Colombia')?'selected':''; ?>>Colombia</option>
                                        <option value="Estados Unidos" <?php echo ($row->PaisResidencia == 'Estados Unidos')?'selected':''; ?>>Estados Unidos</option>
                                        <option value="Venezuela" <?php echo ($row->PaisResidencia == 'Venezuela')?'selected':'Venezuela'; ?>>Venezuela</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione País de Residencia</div>
                                </div>
                                <div class="col-6">
                                    <label for="CantonResidencia">Cantón de Residencia (*)</label>
                                    <select id="CantonResidencia" name="CantonResidencia" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Portoviejo" <?php echo ($row->CantonResidencia == 'Portoviejo')?'selected':''; ?>>Portoviejo</option>
                                        <option value="Ambato" <?php echo ($row->CantonResidencia == 'Ambato')?'selected':''; ?>>Ambato</option>
                                        <option value="Cuenca" <?php echo ($row->CantonResidencia == 'Cuenca')?'selected':''; ?>>Cuenca</option>
                                        <option value="Manta" <?php echo ($row->CantonResidencia == 'Manta')?'selected':''; ?>>Manta</option>
                                        <option value="Guayaquil" <?php echo ($row->CantonResidencia == 'Guayaquil')?'selected':''; ?>>Guayaquil</option>
                                        <option value="Quito" <?php echo ($row->CantonResidencia == 'Quito')?'selected':''; ?>>Quito</option>
                                        <option value="Otro" <?php echo ($row->CantonResidencia == 'Otro')?'selected':''; ?>>Otro</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Cantón de Residencia</div>
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
                                    <select id="TipoColegio" name="TipoColegio" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Fiscal" <?php echo ($row->TipoColegio == 'Fiscal')?'selected':''; ?>>Fiscal</option>
                                        <option value="Particular" <?php echo ($row->TipoColegio == 'Particular')?'selected':''; ?>>Particular</option>
                                        <option value="Fiscomisional" <?php echo ($row->TipoColegio == 'Fiscomisional')?'selected':''; ?>>Fiscomisional</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Tipo Colegio</div>
                                </div>
                                <div class="col-3">
                                    <label for="Ocupacion">Ocupación (*)</label>
                                    <select id="Ocupacion" name="Ocupacion" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Trabaja" <?php echo ($row->TipoColegio == 'Trabaja')?'selected':''; ?>>Trabaja</option>
                                        <option value="No Trabaja" <?php echo ($row->TipoColegio == 'No Trabaja')?'selected':''; ?>>No Trabaja</option>
                                        <option value="Estudiante" <?php echo ($row->TipoColegio == 'Estudiante')?'selected':''; ?>>Estudiante</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Ocupación</div>
                                </div>
                                <div class="col-3">
                                    <label for="Ingresos">Ingresos (*)</label>
                                    <input type="number" id="Ingresos" name="Ingresos" class="form-control" min="0" value="<?php echo ($row->Ingresos > 0)?$row->Ingresos:0; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Especifique nivel de Ingresos</div>
                                </div>
                                <div class="col-2">
                                    <label for="BonoDesarrollo">Bono de Desarrollo (*)</label>
                                    <select id="BonoDesarrollo" name="BonoDesarrollo" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="No" <?php echo ($row->BonoDesarrollo == 'No')?'selected':''; ?>>No</option>
                                        <option value="Si" <?php echo ($row->BonoDesarrollo == 'Si')?'selected':''; ?>>Si</option>
                                    </select>
                                    <div class="invalid-feedback">Recibe Bono de Desarrollo ?</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="NivelFormacionP">Nivel Formación del Padre (*)</label>
                                    <select id="NivelFormacionP" name="NivelFormacionP" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Primaria" <?php echo ($row->NivelFormacionP == 'Primaria')?'selected':''; ?>>Primaria</option>
                                        <option value="Secundaria" <?php echo ($row->NivelFormacionP == 'Secundaria')?'selected':''; ?>>Secundaria</option>
                                        <option value="Estudio Superior" <?php echo ($row->NivelFormacionP == 'Estudio Superior')?'selected':''; ?>>Estudio Superior</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Nivel de estudios del Padre</div>
                                </div>
                                <div class="col-6">
                                    <label for="NivelFormacionM">Nivel Formación de la Madre (*)</label>
                                    <select id="NivelFormacionM" name="NivelFormacionM" class="form-select" aria-describedby="inputGroupPrepend" required>
                                        <option value="Primaria" <?php echo ($row->NivelFormacionM == 'Primaria')?'selected':''; ?>>Primaria</option>
                                        <option value="Secundaria" <?php echo ($row->NivelFormacionM == 'Secundaria')?'selected':''; ?>>Secundaria</option>
                                        <option value="Estudio Superior" <?php echo ($row->NivelFormacionM == 'Estudio Superior')?'selected':''; ?>>Estudio Superior</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione Nivel de estudios de la Madre</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="IngresosHogar">Ingresos del Hogar (*)</label>
                                    <input type="number" id="IngresosHogar" name="IngresosHogar" class="form-control" min="0" value="<?php echo ($row->IngresosHogar > 0)?$row->IngresosHogar:0; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Especifique Ingresos del Hogar</div>
                                </div>
                                <div class="col-6">
                                    <label for="MiembrosHogar">Miembros del Hogar (*)</label>
                                    <input type="number" id="MiembrosHogar" name="MiembrosHogar" class="form-control" min="0" value="<?php echo ($row->IngresosHogar > 0)?$row->MiembrosHogar:0; ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">Seleccione Cantón de Residencia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary m-3">Guardar todos los Datos</button>
    </form>
</div>