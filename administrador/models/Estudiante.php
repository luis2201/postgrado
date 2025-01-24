<?php

    class Estudiante extends DB
    {

        public static function findDatosEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante WHERE EstudianteID = :EstudianteID");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function resetContrasena($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Estudiante SET Contrasena = :Contrasena WHERE EstudianteID = :EstudianteID;");
            
            return $prepare->execute($params);
        }

    }