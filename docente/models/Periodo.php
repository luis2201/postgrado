<?php

    class Periodo extends DB
    {

        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Periodo");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }

        public static function findPeriodoActivo()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Periodo WHERE EstadoPeriodo = 1;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }

    }