<?php

    class DatosController
    {

        public function index()
        {
            $param = ["EstudianteID" => $_SESSION['EstudianteID']];

            $datosestudiante = Estudiante::findDatosEstudiante($param);
            $datospersonales = Estudiante::findDatosPersonales($param);
            $datosmedicos = Estudiante::findDatosMedicos($param);
            $datoscontacto = Estudiante::findDatosContacto($param);
            $datosfamiliares = Estudiante::findDatosFamiliares($param);

            view('datos.index', ["datosestudiante" => $datosestudiante, "datospersonales" => $datospersonales, "datosmedicos" => $datosmedicos, "datoscontacto" => $datoscontacto, "datosfamiliares" => $datosfamiliares]);
        }

        public function update()
        {
            $EstudianteID = Main::limpiar_cadena($_POST["EstudianteID"]);
            //Datos Personales
            $TipoIdentificacion = Main::limpiar_cadena($_POST["TipoIdentificacion"]);
            $NumeroIdentificacion = Main::limpiar_cadena($_POST["NumeroIdentificacion"]);
            $Nombre1 = Main::limpiar_cadena($_POST["Nombre1"]);
            $Nombre2 = Main::limpiar_cadena($_POST["Nombre2"]);
            $Apellido1 = Main::limpiar_cadena($_POST["Apellido1"]);
            $Apellido2 = Main::limpiar_cadena($_POST["Apellido2"]);
            $Telefono = Main::limpiar_cadena($_POST["Telefono"]);
            $Correo = Main::limpiar_cadena($_POST["Correo"]);
            $FechaNacimiento = Main::limpiar_cadena($_POST["FechaNacimiento"]);
            $Sexo = Main::limpiar_cadena($_POST["Sexo"]);
            $Genero = Main::limpiar_cadena($_POST["Genero"]);
            $EstadoCivil = Main::limpiar_cadena($_POST["EstadoCivil"]);
            $Etnia = Main::limpiar_cadena($_POST["Etnia"]);
            //Datos Médicos
            $TipoSangre = Main::limpiar_cadena($_POST["TipoSangre"]);
            $Discapacidad = Main::limpiar_cadena($_POST["Discapacidad"]);
            $PorcentajeDiscapacidad = Main::limpiar_cadena($_POST["PorcentajeDiscapacidad"]);
            $CarnetConadis = Main::limpiar_cadena($_POST["CarnetConadis"]);
            $NumeroCarnetConadis = Main::limpiar_cadena($_POST["NumeroCarnetConadis"]);
            $TipoDiscapacidad = Main::limpiar_cadena($_POST["TipoDiscapacidad"]);
            //Datos Contacto
            $PaisNacionalidad = Main::limpiar_cadena($_POST["PaisNacionalidad"]);
            $CantonNacimiento = Main::limpiar_cadena($_POST["CantonNacimiento"]);
            $PaisResidencia = Main::limpiar_cadena($_POST["PaisResidencia"]);
            $CantonResidencia = Main::limpiar_cadena($_POST["CantonResidencia"]);
            //Datos de Ocupación y Académico
            $TipoColegio = Main::limpiar_cadena($_POST["TipoColegio"]);
            $Ocupacion = Main::limpiar_cadena($_POST["Ocupacion"]);
            $Ingresos = Main::limpiar_cadena($_POST["Ingresos"]);
            $BonoDesarrollo = Main::limpiar_cadena($_POST["BonoDesarrollo"]);
            $NivelFormacionP = Main::limpiar_cadena($_POST["NivelFormacionP"]);
            $NivelFormacionM = Main::limpiar_cadena($_POST["NivelFormacionM"]);
            $IngresosHogar = Main::limpiar_cadena($_POST["IngresosHogar"]);
            $MiembrosHogar = Main::limpiar_cadena($_POST["MiembrosHogar"]);
            
            //EstudianteID desencriptado
            $EstudianteID = Main::decryption($_POST["EstudianteID"]);
            
            $param = [
                ":EstudianteID"             => $EstudianteID,
                ":TipoIdentificacion"       => $TipoIdentificacion,
                ":NumeroIdentificacion"     => $NumeroIdentificacion,
                ":Nombre1"                  => $Nombre1,
                ":Nombre2"                  => $Nombre2,
                ":Apellido1"                => $Apellido1,
                ":Apellido2"                => $Apellido2,
                ":Telefono"                 => $Telefono,
                ":Correo"                   => $Correo,
                ":FechaNacimiento"          => $FechaNacimiento,
                ":Sexo"                     => $Sexo,
                ":Genero"                   => $Genero,
                ":EstadoCivil"              => $EstadoCivil,
                ":Etnia"                    => $Etnia,
                ":TipoSangre"               => $TipoSangre,
                ":Discapacidad"             => $Discapacidad,
                ":PorcentajeDiscapacidad"   => $PorcentajeDiscapacidad,
                ":CarnetConadis"            => $CarnetConadis,
                ":NumeroCarnetConadis"      => $NumeroCarnetConadis,
                ":TipoDiscapacidad"         => $TipoDiscapacidad,
                ":PaisNacionalidad"         => $PaisNacionalidad,
                ":CantonNacimiento"         => $CantonNacimiento,
                ":PaisResidencia"           => $PaisResidencia,
                ":CantonResidencia"         => $CantonResidencia,
                ":TipoColegio"              => $TipoColegio,
                ":Ocupacion"                => $Ocupacion,
                ":Ingresos"                 => $Ingresos,
                ":BonoDesarrollo"           => $BonoDesarrollo,
                ":NivelFormacionP"          => $NivelFormacionP,
                ":NivelFormacionM"          => $NivelFormacionM,
                ":IngresosHogar"            => $IngresosHogar,
                ":MiembrosHogar"            => $MiembrosHogar
            ];

            $resp = Estudiante::Update($param);
            
            echo json_encode($resp);
        }


    }