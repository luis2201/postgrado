<?php

    class Usuario extends DB
    {

        public static function login($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Usuario WHERE NombreUsuario = :NombreUsuario AND ContrasenaUsuario = :ContrasenaUsuario AND TipoUsuarioID = 2");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Usuario::class);
        }

    }

?>