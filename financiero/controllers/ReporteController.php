<?php

    class ReporteController
    {

        public function index()
        {
            $periodo = Periodo::findPeriodoAll();
            $maestria = Maestria::findMaestriaAll();

            view("reporte.index", ["periodo" => $periodo, "maestria" => $maestria]);
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

    }

