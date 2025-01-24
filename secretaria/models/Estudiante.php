<?php

    class Estudiante extends DB
    {

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

        public static function findCalificacionIndividual($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.NombreModulo, C.Docencia, C.Practicas, C.Actividades, C.Resultados, C.Total, C.Asistencia
                                    FROM Calificacion C 
                                        INNER JOIN DocenteModulo DM ON C.DocenteModuloID = DM.DocenteModuloID
                                        INNER JOIN Modulo M ON DM.ModuloID = M.ModuloID
                                    WHERE C.MatriculaID = :MatriculaID");

            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findCalificacionGrupal($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.MatriculaID, CONCAT(E.Apellido1,' ', E.Apellido2,' ', E.Nombre1,' ', E.Nombre2)AS Estudiante, 
                                            C.Docencia, C.Practicas, C.Actividades, C.Resultados, C.Total, C.Asistencia
                                    FROM Calificacion C
                                        INNER JOIN Matricula M ON C.MatriculaID = M.MatriculaID
                                        INNER JOIN Estudiante E ON M.EstudianteID = E.EstudianteID
                                        INNER JOIN DocenteModulo T ON C.DocenteModuloID = T.DocenteModuloID
                                    WHERE C.DocenteModuloID = :DocenteModuloID
                                    ORDER BY E.Apellido1, E.Apellido2, E.Nombre1, E.Nombre2");

            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

    }

?>

