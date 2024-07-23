<?php

    class Estudiante extends DB
    {

        public static function findEstudianteAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante ORDER BY Apellido1, Apellido2, Nombre1, Nombre2");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findEstudianteID($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante WHERE EstudianteID = :EstudianteID");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findEstudianteNumeroIdentificacion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante WHERE NumeroIdentificacion = :NumeroIdentificacion");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO Estudiante(TipoIdentificacion, NumeroIdentificacion, Nombre1, Nombre2, Apellido1, Apellido2, Telefono, Correo)
                                     VALUES(:TipoIdentificacion, :NumeroIdentificacion, :Nombre1, :Nombre2, :Apellido1, :Apellido2, :Telefono, :Correo)");
            
            return $prepare->execute($params);
        }

        public static function delete($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM Estudiante WHERE EstudianteID = :EstudianteID;");
            
            return $prepare->execute($params);
        }

        public static function update($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Estudiante SET TipoIdentificacion = :TipoIdentificacion, 
                                                           NumeroIdentificacion = :NumeroIdentificacion, 
                                                           Nombre1 = :Nombre1, 
                                                           Nombre2 = :Nombre2, 
                                                           Apellido1 = :Apellido1, 
                                                           Apellido2 = :Apellido2, 
                                                           Telefono = :Telefono, 
                                                           Correo = :Correo
                                    WHERE EstudianteID = :EstudianteID");
            
            return $prepare->execute($params);
        }

    }