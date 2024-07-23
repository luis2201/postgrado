<?php

    class Calificacion extends DB
    {

        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_calificacion_save(:DocenteModuloID, :MatriculaID, :Campo, :Valor, :Total)");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacion::class);
        }

    }