<?php

    class DocentemoduloController
    {

        public function finddocentemodulo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $DocenteID = Main::decryption($_SESSION["DocenteID"]);
            $_SESSION["PSeleccionado"] = $data->PeriodoID;
            $PeriodoID = Main::decryption($data->PeriodoID);
            
            $param = [":PeriodoID" => $PeriodoID, ":DocenteID" => $DocenteID];
            $resp =  Docentemodulo::findDocenteIDModuloID($param);
            
            $thead = '<table class="table table-condensed table-hover w-100">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Módulo</th>
                                <th scope="col">Carrera</th>
                                <th></th>
                            </tr>
                        </thead>';
            $tbody =    '<tbody>';
            $tfoot =    '</tbody>
                    </table>';
            $i = 1;
            
            foreach ($resp as $row){ 
            $tbody .=   '<tr>
                            <td class="text-center w-10">'.$i++.'</td>
                            <td>'.$row->NombreModulo.'</td>
                            <td>'.$row->NombreMaestria.'</td>
                            <td class="text-center w-10">
                                <a href="calificacion/register/'.Main::encryption($row->DocenteModuloID).'"><i class="fa-solid fa-file-pen text-success"></i></a>
                                <a href="calificacion/reporte/'.Main::encryption($row->DocenteModuloID).'" target="_blank"><i class="fa-solid fa-file-pdf text-primary"></i></a>
                            </td>
                        </tr>';
            }
                    
            echo json_encode($thead . $tbody . $tfoot);
        }

    }