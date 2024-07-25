<h1 class="mt-4">Calificaciones</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Registro de Calificaciones</a></li>
    <li class="breadcrumb-item active">Lista de Estudiantes registrados en el Módulo</li>
</ol>

<div class="card">
    <div class="card-header bg-info text-white">
        <a href="<?php echo DIR; ?>calificacion" class="btn btn-secondary float-end"><i class="fa-solid fa-right-to-bracket"></i></a>
    </div>
    <div class="card-body p-3">
        <?php foreach ($datosmaestriamodulo as $row) : ?>
            <div class="row">
                <div class="col-12">
                    <h6><?php echo $row->NombreMaestria; ?> >>> <?php echo $row->NombreModulo; ?></h6>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-12">                    
                <input type="hidden" id="ruta" name="ruta" value="<?php echo DIR.'calificacion/save'; ?>">
                <input type="hidden" id="DocenteModuloID" name="DocenteModuloID" value="<?php echo $_GET['id']; ?>">
                <table class="table table-condensed table-hover table-striped w-100">
                    <thead class="bg-primary text-white text-center" style="font-size:0.6vw">
                        <tr class="align-middle text-uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Nombres</th>
                            <th class="text-wrap">Docencia (30%)</th>
                            <th class="text-wrap">Prácticas de Aplicación (20%)</th>
                            <th class="text-wrap">Actividades de Aprendizaje (20%)</th>
                            <th class="text-wrap">Resultados (30%)</th>
                            <th class="text-wrap">Total</th>
                            <th class="text-wrap">Asistencia 100%</th>
                            <th class="text-wrap">Observación</th>
                        </tr>
                    </thead>
                    <tbody style="font-size:0.8vw">
                        <?php $i = 1; ?>
                        <?php foreach ($estudiantes as $row) : ?>
                            <tr>
                            <?php 
                                $DocenteModuloID = Main::decryption($_GET['id']);
                                $param = [":DocenteModuloID" => $DocenteModuloID, ":MatriculaID" => $row->MatriculaID];
                                $resp = Calificacion::findCalificacionMatriculaModuloID($param);
                                
                                $Docencia = "";
                                $Practicas = "";
                                $Actividades = "";
                                $Resultados = "";
                                $Total = ""; 
                                $Asistencia = ""; 

                                foreach($resp as $calificacion){
                                    $Docencia = $calificacion->Docencia;
                                    $Practicas = $calificacion->Practicas;
                                    $Actividades = $calificacion->Actividades;
                                    $Resultados = $calificacion->Resultados;
                                    $Total = $calificacion->Total; 
                                    $Asistencia = $calificacion->Asistencia; 
                                }
                            ?>
                                <td class="text-center w-10"><?php echo $i++; ?></td>
                                <td><?php echo $row->Nombres; ?></td>
                                <td><?php echo $row->Apellidos; ?></td>
                                <td class="text-center" style="width:90px;">
                                    <input type="number" step="0.01" id="Docencia-<?php echo $row->MatriculaID; ?>" name="Docencia-<?php echo $row->MatriculaID; ?>" class="border-bottom border-dark text-center" style="border-style:none;width:90px;" min="0" max="30" oninput="limitarDecimales(event, 30); actualizarTotal(<?php echo $row->MatriculaID; ?>)" onfocus="guardarValorAnterior(event)" onblur="formatearDecimales(event, 30)" value="<?php echo $Docencia; ?>">
                                </td>
                                <td class="text-center" style="width:90px;">
                                    <input type="number" step="0.01" id="Practicas-<?php echo $row->MatriculaID; ?>" name="Practicas-<?php echo $row->MatriculaID; ?>" class="border-bottom border-dark text-center" style="border-style:none;width:90px;" min="0" max="20" oninput="limitarDecimales(event, 20); actualizarTotal(<?php echo $row->MatriculaID; ?>)" onfocus="guardarValorAnterior(event)" onblur="formatearDecimales(event, 20)" value="<?php echo $Practicas; ?>">
                                </td>
                                <td class="text-center" style="width:90px;">
                                    <input type="number" step="0.01" id="Actividades-<?php echo $row->MatriculaID; ?>" name="Actividades-<?php echo $row->MatriculaID; ?>" class="border-bottom border-dark text-center" style="border-style:none;width:90px;" min="0" max="20" oninput="limitarDecimales(event, 20); actualizarTotal(<?php echo $row->MatriculaID; ?>)" onfocus="guardarValorAnterior(event)" onblur="formatearDecimales(event, 20)" value="<?php echo $Actividades; ?>">
                                </td>
                                <td class="text-center" style="width:90px;">
                                    <input type="number" step="0.01" id="Resultados-<?php echo $row->MatriculaID; ?>" name="Resultados-<?php echo $row->MatriculaID; ?>" class="border-bottom border-dark text-center" style="border-style:none;width:90px;" min="0" max="30" oninput="limitarDecimales(event, 30); actualizarTotal(<?php echo $row->MatriculaID; ?>)" onfocus="guardarValorAnterior(event)" onblur="formatearDecimales(event, 30)" value="<?php echo $Resultados; ?>">
                                </td>
                                <td class="text-center border" style="width:90px;">
                                    <input type="number" step="0.01" id="Total-<?php echo $row->MatriculaID; ?>" name="Total-<?php echo $row->MatriculaID; ?>" class="bg-info bg-opacity-10 border border-info rounded text-center" style="border-style:none;margin:auto;width:80px;" value="<?php echo $Total; ?>" disabled>
                                </td>
                                <td class="text-center border" style="width:90px;">
                                    <input type="number" step="0.01" id="Asistencia-<?php echo $row->MatriculaID; ?>" name="Asistencia-<?php echo $row->MatriculaID; ?>" class="border-bottom border-dark text-center" style="border-style:none;width:90px;" min="0" max="100" oninput="limitarDecimales(event, 100); actualizarTotal(<?php echo $row->MatriculaID; ?>)" onfocus="guardarValorAnterior(event)" onblur="formatearDecimales(event, 100)" value="<?php echo $Asistencia; ?>">
                                </td>
                                <td class="text-center border" style="width:90px;">
                                    <?php
                                        echo ($Total >=70)?'<span class="text-success fw-bold">APROBADO</span>':'<span class="text-danger fw-bold">REPROBADO</span>';
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-light">
            <strong class="me-auto">Postgrado</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Registro actualizado satisfactoriamente
        </div>
    </div>
</div>