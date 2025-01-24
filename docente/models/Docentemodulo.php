<?php 

    class Docentemodulo extends DB
    {

        public static function findDocenteIDModuloID($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT DM.DocenteModuloID, T.NombreMaestria, M.NombreModulo, D.NombreDocente, DM.NumeroHoras
                                    FROM DocenteModulo DM 
                                        INNER JOIN Docente D ON DM.DocenteID = D.DocenteID
                                        INNER JOIN Modulo M ON DM.ModuloID = M.ModuloID
                                        INNER JOIN Maestria T ON M.MaestriaID = T.MaestriaID
                                    WHERE DM.PeriodoID = :PeriodoID
                                    AND DM.DocenteID = :DocenteID");
            
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docentemodulo::class);
        }

        public static function Insert($param)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO DocenteModulo(PeriodoID, ModuloID, DocenteID, NumeroHoras) VALUES(:PeriodoID, :ModuloID, :DocenteID, :NumeroHoras)");
            
            return $prepare->execute($param);
        }

    }