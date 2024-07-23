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

        public static function findEstudiantesMaestriaID($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT E.EstudianteID, E.NumeroIdentificacion, CONCAT(E.Apellido1, ' ', E.Apellido2)AS Apellidos, CONCAT(E.Nombre1, ' ', E.Nombre2)AS Nombres, E.Correo, E.Telefono, E.Contrasena
                                     FROM Matricula M 
                                        INNER JOIN Estudiante E ON M.EstudianteID = E.EstudianteID
                                     WHERE M.PeriodoID = :PeriodoID
                                     AND M.MaestriaID = :MaestriaID
                                     ORDER BY E.Apellido1, E.Apellido2, E.Nombre1, E.Nombre2");

            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Maestria::class);
        }
        

    }