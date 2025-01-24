<?php

    class Matricula extends DB
    {

        public static function findMaestriaEstudianteID($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT P.NombrePeriodo, T.NombreMaestria
            FROM Matricula M
                INNER JOIN Periodo P ON M.PeriodoID = P.PeriodoID
                INNER JOIN Maestria T ON M.MaestriaID = T.MaestriaID 
            WHERE M.PeriodoID = :PeriodoID
            AND M.EstudianteID = :EstudianteID;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Maestria::class);
        }

        public static function insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO Matricula(PeriodoID, EstudianteID, MaestriaID)
                                     VALUES(:PeriodoID, :EstudianteID, :MaestriaID)");
            
            return $prepare->execute($params);
        }

    }