<?php 

    class CalificacionController
    {

        public function index()
        {
            unset($_SESSION['PSeleccionado']);

            $periodos = Periodo::findAll();

            view("calificacion.index", ["periodos" => $periodos]);
        }

        public function register()
        {
            // $periodo = Periodo::findPeriodoActivo();
            // foreach($periodo as $row){
            //     $PeriodoID = $row->PeriodoID;
            // }

            $PeriodoID = Main::decryption($_SESSION["PSeleccionado"]);

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
            $Asistencia = (Main::limpiar_cadena($data->Asistencia) == '')?0:Main::limpiar_cadena($data->Asistencia);

            $DocenteModuloID = Main::decryption($DocenteModuloID);

            $param = [":DocenteModuloID" => $DocenteModuloID, ":MatriculaID" => $MatriculaID, ":Campo" => $Campo, ":Valor" => $Valor, ":Total" => $Total, ":Asistencia" => $Asistencia];
            $resp = Calificacion::Save($param);
            
            echo json_encode($resp);
        }

        public function reporte()
        {
            // $periodo = Periodo::findPeriodoActivo();
            // foreach($periodo as $row){
            //     $PeriodoID = $row->PeriodoID;
            // }

            $PeriodoID = Main::decryption($_SESSION["PSeleccionado"]);

            $DocenteModuloID = Main::decryption($_GET["id"]);

            $param = [":DocenteModuloID" => $DocenteModuloID];
            $datosmaestriamodulo = Maestria::findDatosMaestriaModulo($param);
            foreach($datosmaestriamodulo as $row){
                $MaestriaID = $row->MaestriaID;
            }

            $param = ["PeriodoID" =>$PeriodoID, "MaestriaID" => $MaestriaID];
            $estudiantes = Maestria::findEstudiantesMaestriaID($param);

            view("calificacion.reporte", ["estudiantes" => $estudiantes]);
        }

    }