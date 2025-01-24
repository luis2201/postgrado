<?php

    class DocentemoduloController
    {

        public function index()
        {
            $periodo = Periodo::findAll();
            $maestria = Maestria::findMaestriaAll();    
            $docente = Docente::findAll();    
            $docentemodulo = Docentemodulo::findAll();

            view("docentemodulo.index", ["periodo" => $periodo, "maestria" => $maestria, "docente" => $docente, "docentemodulo" => $docentemodulo]);
        }

        public function insert()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $ModuloID = Main::limpiar_cadena($_POST["ModuloID"]);
            $DocenteID = Main::limpiar_cadena($_POST["DocenteID"]);
            $NumeroHoras = Main::limpiar_cadena($_POST["NumeroHoras"]);

            $PeriodoID = Main::decryption($PeriodoID);
            $ModuloID = Main::decryption($ModuloID);
            $DocenteID = Main::decryption($DocenteID);

            $param = [":PeriodoID" => $PeriodoID, ":ModuloID" => $ModuloID, ":DocenteID" => $DocenteID, ":NumeroHoras" => $NumeroHoras];
            $resp = Docentemodulo::Insert($param);

            echo json_encode($resp);
        }

    }