<?php

    class ModuloController
    {
        
        public function index()
        {
            $periodo = Periodo::findPeriodoActivo();
            $maestria = Maestria::findMaestriaAll();

            view("modulo.index", ["periodo" => $periodo, "maestria" => $maestria]);
        }

        public function findmodulosmaestriaid()
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
                                <th class="text-center">Estado</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';
            $n = 1;
            foreach ($resp as $row) {
                $estado = ($row->Estado == 1)?'<span class="badge text-bg-success fw-bolder">ACTIVADO</span>':'<span class="badge text-bg-danger fw-bolder">DESACTIVADO</span>';
                $tbody .= '<tr>
                            <td class="text-center" style="width:10%">'.$n++.'</td>
                            <td>'.$row->NombreModulo.'</td>
                            <td style="width:10%" class="text-center">'.$estado.'</td>
                            <td  class="text-center" style="width:10%">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-link btn-sm" href="modulo/edit/'.Main::encryption($row->ModuloID).'"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class ="needs-validation" action="'.DIR.'modulo/reset" method="post" data-action="update" enctype="multipart/form-data" autocomplete="off" novalidate>
                                        <input type="hidden" id="ModuloID" name="ModuloID" value="'.Main::encryption($row->ModuloID).'">
                                        <input type="hidden" id="Estado" name="Estado" value="'.Main::encryption($row->Estado).'">
                                        <button type="submit" class="btn btn-link btn-sm"><i class="fa-solid fa-retweet"></i></button>
                                    </form>
                                </button>
                            </td>
                          </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function agregar()
        {
            $periodo = Periodo::findPeriodoActivo();
            $maestria = Maestria::findMaestriaAll();

            view("modulo.agregar", ["periodo" => $periodo, "maestria" => $maestria]);
        }

        public function insert()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $MaestriaID = Main::limpiar_cadena($_POST["MaestriaID"]);
            $NombreModulo = Main::limpiar_cadena($_POST["NombreModulo"]);

            $PeriodoID = Main::decryption($PeriodoID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [":PeriodoID" =>$PeriodoID, ":MaestriaID" => $MaestriaID, ":NombreModulo" => $NombreModulo];
            $resp = Modulo::Insert($param);

            echo json_encode($resp);
        }

        public function edit()
        {
            $ModuloID = Main::limpiar_cadena($_GET["id"]);
            $ModuloID = Main::decryption($ModuloID);

            $param = [":ModuloID" => $ModuloID];

            $modulo = Modulo::findModuloID($param);
            $periodo = Periodo::findPeriodoActivo();
            $maestria = Maestria::findMaestriaAll();

            view("modulo.edit", ["modulo" => $modulo, "periodo" => $periodo, "maestria" => $maestria]);
        }

        public function update()
        {
            $ModuloID = Main::limpiar_cadena($_POST["ModuloID"]); 
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $MaestriaID = Main::limpiar_cadena($_POST["MaestriaID"]);
            $NombreModulo = Main::limpiar_cadena($_POST["NombreModulo"]);

            $ModuloID = Main::decryption($ModuloID);
            $PeriodoID = Main::decryption($PeriodoID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [":ModuloID" =>$ModuloID, ":PeriodoID" =>$PeriodoID, ":MaestriaID" => $MaestriaID, ":NombreModulo" => $NombreModulo];
            $resp = Modulo::Update($param);

            echo json_encode($resp);
        }

        public function reset()
        {
            $ModuloID = Main::limpiar_cadena($_POST["ModuloID"]); 
            $Estado = Main::limpiar_cadena($_POST["Estado"]); 

            $ModuloID = Main::decryption($ModuloID);
            $Estado = Main::decryption($Estado);

            if($Estado){
                $Estado = 0;
            } else{
                $Estado = 1;
            }

            $param = [":ModuloID" =>$ModuloID, ":Estado" =>$Estado];
            $resp = Modulo::Reset($param);

            if($resp){
                $periodo = Periodo::findPeriodoActivo();
                $maestria = Maestria::findMaestriaAll();

                view("modulo.index", ["periodo" => $periodo, "maestria" => $maestria]);
            }
            
        }

        public function findmodulosmaestriaidcombo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $PeriodoID = Main::limpiar_cadena($data->PeriodoID);
            $MaestriaID = Main::limpiar_cadena($data->MaestriaID);

            $PeriodoID = Main::decryption($PeriodoID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [":PeriodoID" =>$PeriodoID, ":MaestriaID" => $MaestriaID];
            $resp = Modulo::findModulosMaestriaID($param);

            $options = '<option value="">-- Seleccione Módulo --</option>';
            foreach($resp as $row){
                $options .= '<option value="'.Main::encryption($row->ModuloID).'">'.$row->NombreModulo.'</option>';
            }

            echo json_encode($options);
        }
    }