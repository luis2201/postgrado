<?php

    class EstudianteController
    {

        public function index()
        {
            $periodo = Periodo::findAll();
            $maestria = Maestria::findMaestriaAll();

            view('estudiante.index', ["periodo" => $periodo, "maestria" => $maestria]);
        }

        public function findestudiantesmaestriaid()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $MaestriaID = Main::limpiar_cadena($_POST["MaestriaID"]);

            $PeriodoID = Main::decryption($PeriodoID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [":PeriodoID" =>$PeriodoID, ":MaestriaID" => $MaestriaID];
            $resp = Maestria::findEstudiantesMaestriaID($param);

            $thead = '<table id="tbNomina" class="table table-condensed" style="font-size:0.9em; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No. Identificación</th>
                                <th class="text-center">Apellidos</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Datos</th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';

            foreach ($resp as $row) {
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$row->NumeroIdentificacion.'</td>
                            <td>'.$row->Apellidos.'</td>
                            <td>'.$row->Nombres.'</td>
                            <td  class="text-center" style="width:10%">'.$row->Telefono.'</td>
                            <td  class="text-center" style="width:25%">'.$row->Correo.'</td>
                            <td  class="text-center" style="width:25%">
                                <a href="estudiante/datospersonales/'.Main::encryption($row->EstudianteID).'" target="_blank">VER DATOS</a>
                            </td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }
        
        public function datospersonales() 
        {
            $param = ["EstudianteID" => Main::decryption($_GET['id'])];

            $datosestudiante = Estudiante::findDatosEstudiante($param);
            $datospersonales = Estudiante::findDatosPersonales($param);
            $datosmedicos = Estudiante::findDatosMedicos($param);
            $datoscontacto = Estudiante::findDatosContacto($param);
            $datosfamiliares = Estudiante::findDatosFamiliares($param);

            view("estudiante.datospersonales", ["datosestudiante" => $datosestudiante, "datospersonales" => $datospersonales, "datosmedicos" => $datosmedicos, "datoscontacto" => $datoscontacto, "datosfamiliares" => $datosfamiliares]);
        }

        public function findcalificacionindividual()
        {
            $data = json_decode(file_get_contents('php://input'));

            $MatriculaID = Main::limpiar_cadena($data->MatriculaID);
            $MatriculaID = Main::decryption($MatriculaID);

            $param = [":MatriculaID" => $MatriculaID];
            $resp = Estudiante::findCalificacionIndividual($param); 

            $i = 1;
            $thead = '<table class="table table-condensed" style="font-size:0.9em; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Módulo</th>
                                <th class="text-center">Docencia</th>                                
                                <th class="text-center">Prácticas</th>
                                <th class="text-center">Actividades</th>
                                <th class="text-center">Resultados</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';

            foreach ($resp as $row) {
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$i++.'</td>
                            <td>'.$row->NombreModulo.'</td>
                            <td class="text-center">'.$row->Docencia.'</td>
                            <td class="text-center">'.$row->Practicas.'</td>
                            <td class="text-center">'.$row->Actividades.'</td>
                            <td class="text-center">'.$row->Resultados.'</td>
                            <td class="text-center">'.$row->Total.'</td>
                            <td class="text-center">'.$row->Asistencia.'</td>
                           </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function findcalificaciongrupal()
        {
            $data = json_decode(file_get_contents('php://input'));

            $DocenteModuloID = Main::limpiar_cadena($data->DocenteModuloID);
            $DocenteModuloID = Main::decryption($DocenteModuloID);

            $param = [":DocenteModuloID" => $DocenteModuloID];
            
            $resp = Docentemodulo::findDocenteModuloInfo($param);
            foreach($resp as $row){
                $Docente = $row->NombreDocente;
                $Modulo = $row->NombreModulo;
            }

            $resp = Estudiante::findCalificacionGrupal($param); 
            $i = 1;
            $thead = '<div class="row" style="background-color:#ccc; border-top:solid black; border-bottom:solid black">
                        <div class="col"><strong>Módulo:</strong> '.$Modulo.'</div>
                        <div class="col"><strong>Docente:</strong> '.$Docente.'</div>
                      </div>
                      <table class="table table-condensed" style="font-size:0.8em; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">MatrículaID</th>
                                <th class="text-center">Estudiante</th>
                                <th class="text-center">Docencia</th>                                
                                <th class="text-center">Prácticas</th>
                                <th class="text-center">Actividades</th>
                                <th class="text-center">Resultados</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';

            foreach ($resp as $row) {
                $Total = ($row->Total >= 70)?'<span class="text-dark">'.$row->Total.'</span>':'<span class="text-danger">'.$row->Total.'</span>';
                $Asistencia = ($row->Asistencia >= 75)?'<span class="text-dark">'.$row->Asistencia.'</span>':'<span class="text-danger">'.$row->Asistencia.'</span>';
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$i++.'</td>
                            <td class="text-center" style="width:10%">'.$row->MatriculaID.'</td>
                            <td>'.$row->Estudiante.'</td>
                            <td class="text-center">'.$row->Docencia.'</td>
                            <td class="text-center">'.$row->Practicas.'</td>
                            <td class="text-center">'.$row->Actividades.'</td>
                            <td class="text-center">'.$row->Resultados.'</td>
                            <td class="text-center">'.$Total.'</td>
                            <td class="text-center">'.$Asistencia.'</td>
                           </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

    }