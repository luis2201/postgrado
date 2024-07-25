DELIMITER $$
CREATE DEFINER=`postgrado`@`localhost` PROCEDURE `sp_calificacion_save`(IN `pDocenteModuloID` INT, IN `pMatriculaID` INT, IN `pCampo` VARCHAR(15), IN `pValor` DECIMAL(10,2), IN `pTotal` DECIMAL(10,2), IN `pAsistencia` DECIMAL(10,2) DEFAULT NULL)
BEGIN
    DECLARE sqlQuery TEXT;

    IF NOT EXISTS(SELECT * FROM Calificacion WHERE DocenteModuloID = pDocenteModuloID AND MatriculaID = pMatriculaID) THEN
        SET sqlQuery = CONCAT(
            'INSERT INTO Calificacion (DocenteModuloID, MatriculaID, ', pCampo, ', Total, Asistencia) VALUES (?, ?, ?, ?, ?);'
        );

            PREPARE stmt FROM sqlQuery;

            EXECUTE stmt USING pDocenteModuloID, pMatriculaID, pValor, pTotal, pAsistencia;
    ELSE
        SET sqlQuery = CONCAT(
            'UPDATE Calificacion SET ', pCampo, ' = ?, Total = ?, Asistencia = ? WHERE DocenteModuloID = ? AND MatriculaID = ?;'
        );

        PREPARE stmt FROM sqlQuery;

        EXECUTE stmt USING pValor, pTotal, pAsistencia, pDocenteModuloID, pMatriculaID;
    END IF;

    DEALLOCATE PREPARE stmt;
END$$
DELIMITER ;