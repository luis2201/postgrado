BEGIN
    DECLARE sqlQuery TEXT;

    IF NOT EXISTS(SELECT * FROM Calificacion WHERE DocenteModuloID = pDocenteModuloID AND MatriculaID = pMatriculaID) THEN
        SET sqlQuery = CONCAT(
            'INSERT INTO Calificacion (DocenteModuloID, MatriculaID, ', pCampo, ', Total) ',
            'VALUES (?, ?, ?, ?)'
        );

            PREPARE stmt FROM sqlQuery;

            EXECUTE stmt USING pDocenteModuloID, pMatriculaID, pValor, pTotal;
    ELSE
        SET sqlQuery = CONCAT(
            'UPDATE Calificacion SET ', pCampo, ' = ?, Total = ?\r\n             WHERE DocenteModuloID = ?\r\n             AND MatriculaID = ?;'
        );

        PREPARE stmt FROM sqlQuery;

        EXECUTE stmt USING pValor, pTotal, pDocenteModuloID, pMatriculaID;
    END IF;

    DEALLOCATE PREPARE stmt;
END