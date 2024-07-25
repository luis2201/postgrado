<?php

    class Calificacion extends DB
    {

        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_calificacion_save(:DocenteModuloID, :MatriculaID, :Campo, :Valor, :Total, :Asistencia)");
            
            return $prepare->execute($params);
        }

        public static function findCalificacionMatriculaModuloID($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Calificacion WHERE DocenteModuloID = :DocenteModuloID AND MatriculaID = :MatriculaID");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacion::class);
        }

    }