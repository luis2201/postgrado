<?php

    class Estudiante extends DB
    {

        public static function login($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante WHERE NumeroIdentificacion = :NumeroIdentificacion AND Contrasena = :Contrasena");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosEstudiante($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM Estudiante WHERE EstudianteID = :EstudianteID");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosPersonales($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM EstudianteDP WHERE EstudianteID = :EstudianteID");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosMedicos($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM EstudianteDM WHERE EstudianteID = :EstudianteID");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosContacto($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM EstudianteDC WHERE EstudianteID = :EstudianteID");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosFamiliares($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM EstudianteDF WHERE EstudianteID = :EstudianteID");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function Update($param)
        {
            $db = new DB();
            
            $prepare = $db->prepare("CALL sp_estudiante_update(:EstudianteID, :TipoIdentificacion, :NumeroIdentificacion, :Nombre1, :Nombre2, :Apellido1, :Apellido2, :Telefono, :Correo, :FechaNacimiento, :Sexo, :Genero, :EstadoCivil, :Etnia, :TipoSangre, :Discapacidad, :PorcentajeDiscapacidad, :CarnetConadis, :NumeroCarnetConadis, :TipoDiscapacidad, :PaisNacionalidad, :CantonNacimiento, :PaisResidencia, :CantonResidencia, :TipoColegio, :Ocupacion, :Ingresos, :BonoDesarrollo, :NivelFormacionP, :NivelFormacionM, :IngresosHogar, :MiembrosHogar);");
            
            return $prepare->execute($param);
        }

    }

?>

