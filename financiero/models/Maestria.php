<?php

    class Maestria extends DB
    {

        public static function findMaestriaAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Maestria;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Maestria::class);
        }

        public static function insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO Maestria(PeriodoID, EstudianteID, MaestriaID)
                                     VALUES(:PeriodoID, :EstudianteID, :MaestriaID)");
            
            return $prepare->execute($params);
        }

    }