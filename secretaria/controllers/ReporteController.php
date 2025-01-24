<?php

    class ReporteController
    {
        
        public function listaporoferta()
        {
            $periodo = Periodo::findAll();
            $maestria = Maestria::findMaestriaAll();

            view('reporte.listaporoferta', ["periodo" => $periodo, "maestria" => $maestria]);
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
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function calificacionesindividuales()
        {
            $periodo = Periodo::findAll();
            $maestria = Maestria::findMaestriaAll();

            view('reporte.calificacionesindividuales', ["periodo" => $periodo, "maestria" => $maestria]);
        }

        public function findestudiantesreporteindividual()
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
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';

            foreach ($resp as $row) {
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$row->NumeroIdentificacion.'</td>
                            <td>'.$row->Apellidos.'</td>
                            <td>'.$row->Nombres.'</td>                            
                            <td  class="text-center" style="width:25%"><button id="'.Main::encryption($row->MatriculaID).'" value="'.$row->Apellidos.' '.$row->Nombres.'" onclick="calIndividual(this.id, this.value)" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></button></td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function calificacionesgrupales()
        {
            $periodo = Periodo::findAll();
            $maestria = Maestria::findMaestriaAll();

            view('reporte.calificacionesgrupales', ["periodo" => $periodo, "maestria" => $maestria]);            
        }

        public function findmaestriaperiodoid()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]); 
            $PeriodoID = Main::decryption($PeriodoID);            

            $param = [":PeriodoID" =>$PeriodoID];
            $resp = Maestria::findMaestriaPeriodoID($param);

            $thead = '<table class="table table-condensed" style="font-size:0.9em; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Módulo</th>                                
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';

            foreach ($resp as $row) {
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$row->NumeroIdentificacion.'</td>
                            <td>'.$row->Apellidos.'</td>
                            <td>'.$row->Nombres.'</td>                            
                            <td  class="text-center" style="width:25%"><button id="'.Main::encryption($row->MatriculaID).'" value="'.$row->Apellidos.' '.$row->Nombres.'" onclick="calIndividual(this.id, this.value)" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></button></td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function findestudiantesreportegrupal()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $MaestriaID = Main::limpiar_cadena($_POST["MaestriaID"]);

            $PeriodoID = Main::decryption($PeriodoID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [":PeriodoID" =>$PeriodoID, ":MaestriaID" => $MaestriaID];
            $resp = Modulo::findModulosMaestriaID($param);

            $thead = '<table id="tbNomina" class="table table-condensed table-hover table-striped" style="font-size:0.9em; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Módulo</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';
            $n = 1;
            foreach($resp as $row) {
                $param = [":PeriodoID" => $PeriodoID, ":ModuloID" => $row->ModuloID];
                $docentemodulo = Docentemodulo::findDocenteModuloID($param);
          
                foreach ($docentemodulo as $id) {
                    $DocenteModuloID = $id->DocenteModuloID;
                }

                $estado = ($row->Estado == 1)?'<span class="badge text-bg-success fw-bolder">ACTIVADO</span>':'<span class="badge text-bg-danger fw-bolder">DESACTIVADO</span>';
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$n++.'</td>
                            <td>'.$row->NombreModulo.'</td>
                            <td  class="text-center" style="width:15%"><button id="'.Main::encryption($DocenteModuloID).'" onclick="calGrupal(this.id)" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></button></td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

           echo json_encode($thead . $tbody . $tfoot);
        }
    }
    