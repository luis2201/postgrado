<?php 

    class Docentemodulo extends DB
    {

        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT T.NombreMaestria, P.NombrePeriodo, M.NombreModulo, D.NombreDocente, DM.NumeroHoras
                                    FROM DocenteModulo DM 
                                        INNER JOIN Docente D ON DM.DocenteID = D.DocenteID
                                        INNER JOIN Modulo M ON DM.ModuloID = M.ModuloID
                                        INNER JOIN Maestria T ON M.MaestriaID = T.MaestriaID
                                        INNER JOIN Periodo P ON DM.PeriodoID= P.PeriodoID
                                    ORDER BY DM.PeriodoID DESC");
            
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docentemodulo::class);
        }

        public static function Insert($param)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO DocenteModulo(PeriodoID, ModuloID, DocenteID, NumeroHoras) VALUES(:PeriodoID, :ModuloID, :DocenteID, :NumeroHoras)");
            
            return $prepare->execute($param);
        }

        public static function findDocenteModuloID($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM DocenteModulo WHERE PeriodoID = :PeriodoID AND ModuloID = :ModuloID;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

        public static function findDocenteModuloInfo($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT D.NombreDocente, M.NombreModulo
                                    FROM DocenteModulo DM
                                        INNER JOIN Docente D ON DM.DocenteID = D.DocenteID
                                        INNER JOIN Modulo M ON DM.ModuloID = M.ModuloID
                                    WHERE DM.DocenteModuloID = :DocenteModuloID;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

    }