<?php 

    class CalificacionController
    {

        public function index()
        {
            $periodo = Periodo::findPeriodoActivo();
            foreach($periodo as $row){
                $PeriodoID = $row->PeriodoID;
            }

            $DocenteID = Main::decryption($_SESSION["DocenteID"]);

            $param = [":PeriodoID" => $PeriodoID, ":DocenteID" => $DocenteID];
            $docentemodulo =  Docentemodulo::findDocenteIDModuloID($param);

            view("calificacion.index", ["docentemodulo" => $docentemodulo]);
        }

        public function register()
        {
            $periodo = Periodo::findPeriodoActivo();
            foreach($periodo as $row){
                $PeriodoID = $row->PeriodoID;
            }

            $DocenteModuloID = Main::decryption($_GET["id"]);

            $param = [":DocenteModuloID" => $DocenteModuloID];
            $datosmaestriamodulo = Maestria::findDatosMaestriaModulo($param);
            foreach($datosmaestriamodulo as $row){
                $MaestriaID = $row->MaestriaID;
            }

            $param = ["PeriodoID" =>$PeriodoID, "MaestriaID" => $MaestriaID];
            $estudiantes = Maestria::findEstudiantesMaestriaID($param);
     
            view("calificacion.register", ["datosmaestriamodulo" => $datosmaestriamodulo, "estudiantes" => $estudiantes]);
        }

        public function save()
        {
            $data = json_decode(file_get_contents('php://input'));

            $DocenteModuloID = Main::limpiar_cadena($data->DocenteModuloID);
            $MatriculaID = Main::limpiar_cadena($data->MatriculaID);
            $Campo = Main::limpiar_cadena($data->Campo);
            $Valor = Main::limpiar_cadena($data->Valor);
            $Total = Main::limpiar_cadena($data->Total);

            $DocenteModuloID = Main::decryption($DocenteModuloID);

            $param = [":DocenteModuloID" => $DocenteModuloID, ":MatriculaID" => $MatriculaID, ":Campo" => $Campo, ":Valor" => $Valor, ":Total" => $Total];
            $resp = Calificacion::Save($param);
            
            echo json_encode($resp);
        }

    }