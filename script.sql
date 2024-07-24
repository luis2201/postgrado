BEGIN
    DECLARE sqlQuery TEXT;

    IF NOT EXISTS(SELECT * FROM Calificacion WHERE DocenteModuloID = pDocenteModuloID AND MatriculaID = pMatriculaID) THEN
        SET sqlQuery = CONCAT(
            'INSERT INTO Calificacion (DocenteModuloID, MatriculaID, ', pCampo, ', Total) ',
            'VALUES (?, ?, ?, ?)'
        );
    ELSE
        SET sqlQuery = CONCAT(
            'UPDATE Calificacion SET ', pCampo, ' = ?, Total = ?
             WHERE DocenteModuloID = ?
             AND MatriculaID = ?;'
        );
    END IF;

    PREPARE stmt FROM sqlQuery;

    EXECUTE stmt USING pValor, pTotal, pDocenteModuloID, pMatriculaID;

    DEALLOCATE PREPARE stmt;
END