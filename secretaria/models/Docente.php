<?php

    class Docente extends DB
    {

        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Docente ORDER BY NombreDocente;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

        public static function Insert($param)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO Docente(TipoIdentificacion, NumeroIdentificacion, NombreDocente, Contrasena) VALUES(:TipoIdentificacion, :NumeroIdentificacion, :NombreDocente, :Contrasena)");

            return $prepare->execute($param);
        }

        public static function findDocenteID($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Docente WHERE DocenteID = :DocenteID;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

        public static function Update($param)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Docente SET TipoIdentificacion = :TipoIdentificacion, NumeroIdentificacion = :NumeroIdentificacion, NombreDocente = :NombreDocente WHERE DocenteID = :DocenteID;");
            
            return $prepare->execute($param);
        }

        public static function Reset($param)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Docente SET Estado = :Estado WHERE DocenteID = :DocenteID;");
            
            return $prepare->execute($param);
        }

    }