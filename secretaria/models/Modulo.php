<?php 

    class Modulo extends DB 
    {

        public static function findModulosMaestriaID($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Modulo WHERE PeriodoID = :PeriodoID AND MaestriaID = :MaestriaID;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modulo::class);
        }
        
        public static function Insert($param)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO Modulo(PeriodoID, MaestriaID, NombreModulo) VALUES(:PeriodoID, :MaestriaID, :NombreModulo)");
            
            return $prepare->execute($param);
        }

        public static function findModuloID($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Modulo WHERE ModuloID = :ModuloID;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modulo::class);
        }

        public static function Update($param)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Modulo SET PeriodoID = :PeriodoID, MaestriaID = :MaestriaID, NombreModulo = :NombreModulo WHERE ModuloID = :ModuloID;");
            
            return $prepare->execute($param);
        }

        public static function Reset($param)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE Modulo SET Estado = :Estado WHERE ModuloID = :ModuloID;");
            
            return $prepare->execute($param);
        }
    }