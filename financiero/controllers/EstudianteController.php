<?php 


    class EstudianteController
    {
        
        public function index()
        {
            $estudiantes = Estudiante::findEstudianteAll();

            view("estudiante.index", ["estudiantes" => $estudiantes]);
        }

        public function register()
        {
            view("estudiante.register", []);
        }

        public function insert()
        {
            $TipoIdentificacion = Main::limpiar_cadena($_POST["TipoIdentificacion"]);
            $NumeroIdentificacion = Main::limpiar_cadena($_POST["NumeroIdentificacion"]);
            $Nombre1 = Main::limpiar_cadena($_POST["Nombre1"]);
            $Nombre2 = Main::limpiar_cadena($_POST["Nombre2"]);
            $Apellido1 = Main::limpiar_cadena($_POST["Apellido1"]);
            $Apellido2 = Main::limpiar_cadena($_POST["Apellido2"]);
            $Telefono = Main::limpiar_cadena($_POST["Telefono"]);
            $Correo = Main::limpiar_cadena($_POST["Correo"]);

            $param = [
                ":TipoIdentificacion" => $TipoIdentificacion,
                ":NumeroIdentificacion" => $NumeroIdentificacion,
                ":Nombre1" => $Nombre1, 
                ":Nombre2" => $Nombre2, 
                ":Apellido1" => $Apellido1, 
                ":Apellido2" => $Apellido2, 
                ":Telefono" => $Telefono, 
                ":Correo" => $Correo
            ];

            $resp = Estudiante::insert($param);

            echo json_encode($resp);
        }
        
        public function delete()
        {
            $EstudianteID = Main::limpiar_cadena($_POST["EstudianteID"]);
            $EstudianteID = Main::decryption($EstudianteID);

            $param = [":EstudianteID" => $EstudianteID];
            $resp = Estudiante::delete($param);

            echo json_encode($resp);
        }

        public function edit()
        {
            $NumeroIdentificacion = Main::limpiar_cadena($_GET['id']);

            $param = [":NumeroIdentificacion" => $NumeroIdentificacion];
            $estudiante = Estudiante::findEstudianteNumeroIdentificacion($param);

            view('estudiante.edit', ["estudiante" => $estudiante]);
        }

        public function update()
        {
            $EstudianteID = Main::limpiar_cadena($_POST["EstudianteID"]);
            $TipoIdentificacion = Main::limpiar_cadena($_POST["TipoIdentificacion"]);
            $NumeroIdentificacion = Main::limpiar_cadena($_POST["NumeroIdentificacion"]);
            $Nombre1 = Main::limpiar_cadena($_POST["Nombre1"]);
            $Nombre2 = Main::limpiar_cadena($_POST["Nombre2"]);
            $Apellido1 = Main::limpiar_cadena($_POST["Apellido1"]);
            $Apellido2 = Main::limpiar_cadena($_POST["Apellido2"]);
            $Telefono = Main::limpiar_cadena($_POST["Telefono"]);
            $Correo = Main::limpiar_cadena($_POST["Correo"]);

            $EstudianteID = Main::decryption($EstudianteID);

            $param = [
                ":TipoIdentificacion" => $TipoIdentificacion,
                ":NumeroIdentificacion" => $NumeroIdentificacion,
                ":Nombre1" => $Nombre1, 
                ":Nombre2" => $Nombre2, 
                ":Apellido1" => $Apellido1, 
                ":Apellido2" => $Apellido2, 
                ":Telefono" => $Telefono, 
                ":Correo" => $Correo,
                ":EstudianteID" => $EstudianteID
            ];

            $resp = Estudiante::update($param);

            echo json_encode($resp);
        }

        public function matricula()
        {
            $NumeroIdentificacion = Main::limpiar_cadena($_GET['id']);

            $param = [":NumeroIdentificacion" => $NumeroIdentificacion];
            $estudiante = Estudiante::findEstudianteNumeroIdentificacion($param);

            $periodo = Periodo::findPeriodoActivo();

            $maestria = Maestria::findMaestriaAll();

            view('estudiante.matricula', ["periodo" => $periodo, "maestria" => $maestria, "estudiante" => $estudiante]);
        }
        
        public function insertmaestria()
        {
            $PeriodoID = Main::limpiar_cadena($_POST["PeriodoID"]);
            $EstudianteID = Main::limpiar_cadena($_POST["EstudianteID"]);
            $MaestriaID = Main::limpiar_cadena($_POST["MaestriaID"]);
            
            $PeriodoID = Main::decryption($PeriodoID);
            $EstudianteID = Main::decryption($EstudianteID);
            $MaestriaID = Main::decryption($MaestriaID);

            $param = [
                ":PeriodoID" => $PeriodoID,
                ":EstudianteID" => $EstudianteID,
                ":MaestriaID" => $MaestriaID
            ];

            $resp = Matricula::insert($param);

            echo json_encode($resp);
        }
    }