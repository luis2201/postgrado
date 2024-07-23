DELIMITER $$
CREATE PROCEDURE sp_estudiante_update(
    IN pEstudianteID INT,
    IN pTipoIdentificacion VARCHAR(10),
    IN pNumeroIdentificacion VARCHAR(25),
    IN pNombre1 VARCHAR(25),
    IN pNombre2 VARCHAR(25),
    IN pApellido1 VARCHAR(25),
    IN pApellido2 VARCHAR(25),
    IN pTelefono VARCHAR(10),
    IN pCorreo VARCHAR(255),
    IN pFechaNacimiento DATE,
    IN pSexo VARCHAR(10),
    IN pGenero VARCHAR(25),
    IN pEstadoCivil VARCHAR(25),
    IN pEtnia VARCHAR(25),
    IN pTipoSangre VARCHAR(10),
    IN pDiscapacidad VARCHAR(2),
    IN pPorcentajeDiscapacidad INT,
    IN pCarnetConadis VARCHAR(2),
    IN pNumeroCarnetConadis VARCHAR(25),
    IN pTipoDiscapacidad VARCHAR(100),
    IN pPaisNacionalidad VARCHAR(25),
    IN pCantonNacimiento VARCHAR(25),
    IN pPaisResidencia VARCHAR(25),
    IN pCantonResidencia VARCHAR(25),
    IN pTipoColegio VARCHAR(25),
    IN pOcupacion VARCHAR(25),
    IN pIngresos DECIMAL(10,2),
    IN pBonoDesarrollo VARCHAR(2),
    IN pNivelFormacionP VARCHAR(25),
    IN pNivelFormacionM VARCHAR(25),
    IN pIngresosHogar DECIMAL(10,2),
    IN pMiembrosHogar INT,
)
BEGIN
	UPDATE Estudiante SET   TipoIdentificacion   =  pTipoIdentificacion,
                            NumeroIdentificacion =  pNumeroIdentificacion,
                            Nombre1              =  pNombre1,
                            Nombre2              =  pNombre2,
                            Apellido1            =  pApellido1,
                            Apellido2            =  pApellido2,
                            Telefono             =  pTelefono,
                            Correo               =  pCorreo
    WHERE EstudianteID = pEstudianteID;

    IF NOT EXISTS(SELECT * FROM EstudianteDP WHERE EstudianteID = pEstudianteID) THEN
        INSERT INTO EstudianteDP(EstudianteID, FechaNacimiento, Sexo, Genero, EstadoCivil, Etnia)
        VALUES(pEstudianteID, pFechaNacimiento, pSexo, pGenero, pEstadoCivil, pEtnia);
    ELSE
        UPDATE EstudianteDP SET FechaNacimiento =  pFechaNacimiento,
                                Sexo            =  pSexo,
                                Genero          =  pGenero,
                                EstadoCivil     =  pEstadoCivil,
                                Etnia           =  pEtnia
        WHERE EstudianteID = pEstudianteID;
    END IF;

    IF NOT EXISTS(SELECT * FROM EstudianteDM WHERE EstudianteID = pEstudianteID) THEN
        INSERT INTO EstudianteDM(EstudianteID, TipoSangre, Discapacidad, PorcentajeDiscapacidad, CarnetConadis, NumeroCarnetConadis, TipoDiscapacidad)
        VALUES(pEstudianteID, pTipoSangre, pDiscapacidad, pPorcentajeDiscapacidad, pCarnetConadis, pNumeroCarnetConadis, pTipoDiscapacidad);
    ELSE
        UPDATE EstudianteDM SET TipoSangre             =  pTipoSangre,
                                Discapacidad           =  pDiscapacidad,
                                PorcentajeDiscapacidad =  pPorcentajeDiscapacidad,
                                CarnetConadis          =  pCarnetConadis,
                                NumeroCarnetConadis    =  pNumeroCarnetConadis,
                                TipoDiscapacidad       =  pTipoDiscapacidad
        WHERE EstudianteID = pEstudianteID;
    END IF;

    IF NOT EXISTS(SELECT * FROM EstudianteDC WHERE EstudianteID = pEstudianteID) THEN
        INSERT INTO EstudianteDC(EstudianteID, PaisNacionalidad, CantonNacimiento, PaisResidencia, CantonResidencia)
        VALUES(pEstudianteID, pPaisNacionalidad, pCantonNacimiento, pPaisResidencia, pCantonResidencia);
    ELSE
        UPDATE EstudianteDC SET PaisNacionalidad  =  pPaisNacionalidad,
                                CantonNacimiento         =  pCantonNacimiento,
                                PaisResidencia           =  pPaisResidencia,
                                CantonResidencia         =  pCantonResidencia
        WHERE EstudianteID = pEstudianteID;
    END IF;

    IF NOT EXISTS(SELECT * FROM EstudianteDF WHERE EstudianteID = pEstudianteID) THEN
        INSERT INTO EstudianteDF(EstudianteID, TipoColegio, Ocupacion, Ingresos, BonoDesarrollo, NivelFormacionP, NivelFormacionM, IngresosHogar, MiembrosHogar)
        VALUES(pEstudianteID, pTipoColegio, pOcupacion, pIngresos, pBonoDesarrollo, pNivelFormacionP, pNivelFormacionM, pIngresosHogar, pMiembrosHogar);
    ELSE
        UPDATE EstudianteDF SET TipoColegio      =  pTipoColegio,
                                Ocupacion        =  pOcupacion,
                                Ingresos         =  pIngresos,
                                BonoDesarrollo   =  pBonoDesarrollo,
                                NivelFormacionP  =  pNivelFormacionP,
                                NivelFormacionM  =  pNivelFormacionM,
                                IngresosHogar    =  pIngresosHogar,
                                MiembrosHogar    =  pMiembrosHogar
            WHERE EstudianteID = pEstudianteID;
    END IF;
END$$
DELIMITER ;