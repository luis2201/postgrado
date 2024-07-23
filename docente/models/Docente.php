<?php

    class Docente extends DB
    {

        public static function login($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Docente WHERE NumeroIdentificacion = :NumeroIdentificacion AND Contrasena = :Contrasena AND Estado = 1");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

    }