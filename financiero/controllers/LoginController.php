<?php

class LoginController
{

    public function index()
    {
        view('login.index', []);
    }

    public function validate()
    {
        $validate = false;

        $NombreUsuario = Main::limpiar_cadena($_POST["NombreUsuario"]);
        $ContrasenaUsuario = Main::limpiar_cadena($_POST["ContrasenaUsuario"]);

        $ContrasenaUsuario = Main::encryption($_POST["ContrasenaUsuario"]);

        $param = [":NombreUsuario" => $NombreUsuario, ":ContrasenaUsuario" => $ContrasenaUsuario];
        $resp = Usuario::login($param);

        if(count($resp) > 0){
            foreach ($resp as $row) {
                $_SESSION['UsuarioID'] = $row->UsuarioID;
                $_SESSION['TipousuarioID'] = $row->TipoUsuarioID;
                $_SESSION['Nombre'] = $row->Nombre;
                $_SESSION['NombreUsuario'] = $row->NombreUsuario;
            }

            $validate = true;
        } 

        echo json_encode($validate);
    }

    public function logout()
    {
        session_destroy();
        session_unset();

        header("Location: https://postgrado2.itsup.edu.ec/financiero/");
    }

}
