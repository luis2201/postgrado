<?php

    class Maestria extends DB
    {

        public static function findMaestriaAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Maestria WHERE EstadoMaestria = 1;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Maestria::class);
        }

    }