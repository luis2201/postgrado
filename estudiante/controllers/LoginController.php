<?php

class LoginController
{

    public function index()
    {
        view('login.index', []);
    }

    public function validate()
    {
        $flag = false;

        $NumeroIdentificacion = Main::limpiar_cadena($_POST["NumeroIdentificacion"]);
        $Contrasena = Main::limpiar_cadena($_POST["Contrasena"]);

        $Contrasena = Main::encryption($_POST["Contrasena"]);

        $param = [":NumeroIdentificacion" => $NumeroIdentificacion, ":Contrasena" => $Contrasena];
        $resp = Estudiante::login($param);


        if(count($resp) > 0){
            foreach ($resp as $row) {
                $_SESSION['EstudianteID'] = $row->EstudianteID;
                $_SESSION['Estudiante'] = $row->EstudianteNombres;
                $_SESSION['NumeroIdentificacion'] = $row->NumeroIdentificacion;
                $_SESSION['MatriculaID'] = Main::encryption($row->MatriculaID);
            }

            $flag = true;
        } 
        
        echo json_encode($flag);
    }

    public function logout()
    {
        session_destroy();
        session_unset();

        header("Location: https://postgrado2.itsup.edu.ec/estudiante/");
    }

}
