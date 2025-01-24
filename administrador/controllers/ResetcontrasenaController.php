<?php

    class ResetcontrasenaController
    {

        public function index()
        {
            $periodo = Periodo::findPeriodoActivo();
            $maestria = Maestria::findMaestriaAll();

            view('resetcontrasena.index', ["periodo" => $periodo, "maestria" => $maestria]);
        }

        public function reset()
        {
            $EstudianteID = Main::limpiar_cadena($_POST["EstudianteID"]);
            $EstudianteID = Main::decryption($EstudianteID);

            $param = [":EstudianteID" => $EstudianteID];
            $resp = Estudiante::findDatosEstudiante($param);
            foreach($resp as $row){
                $contrasena = Main::encryption($row->NumeroIdentificacion);
            }

            $param = [":EstudianteID" => $EstudianteID, ":Contrasena" => $contrasena];
            $resp = Estudiante::resetContrasena($param);

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
                                <th class="text-center">Contrasena</th>
                                <th class="text-center">Reset Contraseña</th>
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
                            <td  class="text-center" style="width:15%">'.$row->Correo.'</td>
                            <td  class="text-center" style="width:10%">'.$row->Contrasena.'</td>
                            <td  class="text-center" style="width:10%">
                                <button id="'.Main::encryption($row->EstudianteID).'" class="btn btn-primary btn-md" onclick="resetContrasena(this.id)"><i class="fa-solid fa-rotate"></i></button>
                            </td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

    }